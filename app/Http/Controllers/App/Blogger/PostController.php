<?php

namespace App\Http\Controllers\App\Blogger;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tag;
use App\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Notifications\NewBlogPost;

class PostController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new Post();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('enfold.backend.blogger.posts.index')->with('posts', Auth::user()->posts()->listposts()->latest()->get());
    }

    public function published($post)
    {

        $post = $this->model->findOrfail($post);
        if ($post->user_id != Auth::id()) {

            \Toastr::error('Action non autorisée');

            return redirect()->back();
        }

        $post->update(['status' => true]);

        $users = User::where('role_id', 3)->get();
        foreach ($users as $key => $user) {
            $user->notify(new NewBlogPost($post));
        }

        \Toastr::success('Article publié');

        return redirect()->back();
    }

    public function notified($post)
    {

        $post = $this->model->findOrfail($post);
        if ($post->user_id != Auth::id()) {

            \Toastr::error('Action non autorisée');

            return redirect()->back();
        }

        $users = User::where('role_id', 3)->get();
        foreach ($users as $key => $user) {
            $user->notify(new NewBlogPost($post));
        }

        \Toastr::success('Notification envoyée');

        return redirect()->back();
    }

    public function pending()
    {
        return view('enfold.backend.blogger.posts.pending')->with('posts', Auth::user()->posts()->pendingposts()->latest()->get());
    }

    public function unpublished()
    {
        return view('enfold.backend.blogger.posts.unpublished')->with('posts', Auth::user()->posts()->notPublished()->latest()->get());
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('enfold.backend.blogger.posts.create')->with([
            "categories" => Category::latest()->get(),
            "tags" => Tag::latest()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {

            $this->validate($request, [
                'title' => 'required',
                'sub_title' => 'required',
                'description' => 'required',
                'categories' => 'required',
                'tags' => 'sometimes',
            ]);


            $approved = false;

            $status = false;

            if ($request->is_approved) {
                $approved = true;
            }

            if ($request->status) {
                $status = true;
            }

            $currentDate = Carbon::now()->toDateString();

            $slug = strtolower(str_replace(" ", "-", $request->title));

            foreach ($request->images as $key => $img) {

                $this->validate(new Request(['image' => $img]), [
                    'image' => 'image|mimes:png,jpg,jpeg',
                ]);

                $imageName[$key]   = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $img->getClientOriginalExtension();
            }

            $post = $this->model->create([
                'title' => $request->title,
                'slug' => $slug,
                'sub_title' => $request->sub_title,
                'description' => $request->description,
                'is_approved' => $approved,
                'status' => $status,
                'user_id' => Auth::id(),
            ]);

            $post->categories()->attach($request->categories);

            $post->tags()->attach($request->tags);

            foreach ($imageName as $key => $image) {
                $post->images()->create([
                    'name' => $slug,
                    'url' => 'storage/post/' . $slug . '/' . $image
                ]);
            }
            DB::commit();

            foreach ($request->images as $key => $image) {

                if (!Storage::disk('public')->exists('post')) {
                    Storage::disk('public')->makeDirectory('post');
                }

                $img = Image::make($image)->resize(700, 450)->save();

                Storage::disk('public')->put('post/' . $slug . '/' . $imageName[$key], $img);
            }

            if ($status) {
                $users = User::where('role_id', 3)->get();
                foreach ($users as $key => $user) {
                    $user->notify(new NewBlogPost($post));
                }
            }

            \Toastr::success('Enregistrement effectué');
            return redirect()->route('enfold.backend.blogger.posts.index');
        } catch (Exception $e) {
            DB::rollback();
            return response()->json($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $post
     * @return \Illuminate\Http\Response
     */
    public function show($post)
    {

        $post = $this->model->findOrfail($post);
        if ($post->user_id != Auth::id()) {

            \Toastr::error('Action non autorisée');

            return redirect()->back();
        }
        return view('enfold.backend.blogger.posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $post
     * @return \Illuminate\Http\Response
     */
    public function edit($post)
    {

        $post = $this->model->findOrfail($post);
        if ($post->user_id != Auth::id()) {

            \Toastr::error('Action non autorisée');

            return redirect()->back();
        }
        return view('enfold.backend.blogger.posts.edit')->with([
            'post' =>  $post,
            "categories" => Category::latest()->get(),
            "tags" => Tag::latest()->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $post)
    {

        $post = $this->model->findOrfail($post);
        if ($post->user_id != Auth::id()) {

            \Toastr::error('Action non autorisée');

            return redirect()->back();
        }

        DB::beginTransaction();
        try {

            $this->validate($request, [
                'title' => 'required',
                'sub_title' => 'required',
                'description' => 'required',
                'categories' => 'required',
                'tags' => 'sometimes',
            ]);

            $approved = false;

            $status = false;

            if ($request->is_approved) {
                $approved = true;
            }
            if ($request->status) {
                $status = true;
            }

            $imagesFile = $request->file('images');
            $slug = strtolower(str_replace(" ", "-", $request->title));
            $oldSlug = $post->slug;
            $oldStatus = $post->status;

            $post->update([
                'title' => $request->title,
                'slug' => $slug,
                'sub_title' => $request->sub_title,
                'description' => $request->description,
                'is_approved' => $approved,
                'status' => $status,
                'user_id' => Auth::id(),
            ]);

            $post->categories()->sync($request->categories);

            $post->tags()->sync($request->tags);

            if (isset($imagesFile)) {

                $currentDate = Carbon::now()->toDateString();
                $post->images()->delete();
                foreach ($request->images as $key => $img) {

                    $this->validate(new Request(['image' => $img]), [
                        'image' => 'image|mimes:png,jpg,jpeg',
                    ]);

                    $imageName[$key]   = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $img->getClientOriginalExtension();

                    $post->images()->create([
                        'name' => $slug,
                        'url' => 'storage/post/' . $slug . '/' . $imageName[$key]
                    ]);
                }

                DB::commit();

                foreach ($request->images as $key => $image) {

                    if (!Storage::disk('public')->exists('post')) {
                        Storage::disk('public')->makeDirectory('post');
                    }

                    $img = Image::make($image)->resize(700, 450)->save();
                    Storage::disk('public')->deleteDirectory('post/' . $oldSlug);
                    Storage::disk('public')->put('post/' . $slug . '/' . $imageName[$key], $img);
                }
            } else {
                if ($slug != $oldSlug) {
                    foreach ($post->images as $key => $img) {
                        $img->update([
                            "name"  =>  $slug,
                            "url"   =>  str_replace('storage/post/' . $oldSlug, 'storage/post/' . $slug, $img->url)
                        ]);
                    }
                    DB::commit();
                    if (Storage::disk('public')->exists('post/' . $oldSlug)) {
                        Storage::disk('public')->move('post/' . $oldSlug, 'post/' . $slug);
                    }
                } else {

                    DB::commit();
                }
            }

            if ($status && $status != $oldStatus) {
                $users = User::where('role_id', 3)->get();
                foreach ($users as $key => $user) {
                    $user->notify(new NewBlogPost($post));
                }
            }

            \Toastr::success('Mis à jour effectuée');

            return redirect()->route('enfold.backend.blogger.posts.index');
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($post)
    {
        $post = $this->model->findOrfail($post);
        if ($post->user_id != Auth::id()) {

            \Toastr::error('Action non autorisée');

            return redirect()->back();
        }

        DB::beginTransaction();
        try {

            $post->categories()->detach();

            $post->tags()->detach();

            $image = $post->images;

            $post->images()->delete();

            $post->delete();

            DB::commit();
            foreach ($image as $key => $img) {
                Storage::disk('public')->deleteDirectory('post/' . $img['name']);
            }
            \Toastr::success('Suppression effectuée');

            return redirect()->route('enfold.backend.blogger.posts.index');
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}
