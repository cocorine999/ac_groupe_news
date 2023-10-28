<?php

namespace App\Http\Controllers\App\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Comment;
use App\Tag;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class App extends Controller
{
    private $posts;
    private $tags;
    private $categories;
    private $post;
    private $max;
    private $popular_posts;

    public function __construct()
    {
        $this->posts = Post::listposts()->latest()->get();
        $this->tags = Tag::latest()->get();
        $this->categories = Category::latest()->get();

        ///popular posts

        $moy = round($this->posts->avg("view_count"));

        $this->popular_posts = $this->posts->where("view_count", ">=", $moy)->take(3);
        if (count($this->popular_posts)  < 3) {
            $moy = $moy - $moy / 2;
            $this->popular_posts = $this->posts->where("view_count", ">=", $moy)->take(3);
        }

        $this->max[0]=0;
        $this->max[2]=0;
        $this->max[1] = new Category();

        $this->categories->filter(function ($category) {

            $max = $category->posts->sum('view_count');
            $category->posts->filter(function ($post) {
                $this->max[2]+=$post->favorite_to_users->count();
            });
            $max+=$this->max[2];
            
            if ($max > $this->max[0]) {
                $this->max[0] = $max;
                $this->max[1] = $category;
            }
        });
    }

    public function home()
    {

        ///categories
        if(count($this->categories)!=0){foreach ($this->categories as $key => $category) {
            $popular_categories[$key] = $category->posts->count();
        }

        $moy = round(collect($popular_categories)->avg());

        $popular_categories = $this->categories->filter(function ($category, $moy) {
            return $category->posts->count() >= $moy;
        });

        if (count($popular_categories) < 5) {
            $moy = $moy - $moy / 2;
            $popular_categories = $this->categories->filter(function ($category, $moy) {

                return $category->posts->count() >= $moy;
            });
        }}else{
            $popular_categories=collect();
        }



        return view('enfold.page.home')->with([
            "tags" => $this->tags,
            "posts" => $this->posts,
            "categories" => $this->categories,
            "popular_category" => $this->max[1],
            "popular_categories" => $popular_categories,
            "popular_posts" => $this->popular_posts,
            "latest_posts" => $this->posts->take(10)
        ]);
    }

    public function show_single_post($url)
    {
        $this->post = Post::findOrfail(Str::before(Str::after($url, 'index='), '&query='));
        $blogKey = 'blog_' . $this->post['id'];
        $likes=$this->posts->where('id', '!=', $this->post['id']);
        
        if(count($likes)!=0){
            if(count($likes)==1){
                $like_posts=collect($likes->random(1));
                
            }elseif (count($likes)==2) {
                $like_posts=collect($likes->random(2));
            }else {
                $like_posts=collect($likes->random(3));
            }
        }else{
            $like_posts=collect($likes);
        }
        
        if (!Session::has($blogKey)) {
            $this->post->increment('view_count');
            Session::put($blogKey, 1);
        }
        return view('enfold.page.post')->with([
            "tags" => $this->tags,
            "categories" => $this->categories,
            "post" => $this->post,
            "popular_category" => $this->max[1],
            "like_posts" => $like_posts,
            "popular_posts" => $this->popular_posts,
        ]);
    }

    public function show_posts()
    {
        return view('enfold.page.posts')->with([
            "tags" => $this->tags,
            "categories" => $this->categories,
            "posts" => Post::latest()->paginate(5),
            "popular_category" => $this->max[1],
            "popular_posts" => $this->popular_posts,
        ]);
    }

    public function show_category_posts($url)
    {

        $category = Category::findOrfail(Str::before(Str::after($url, 'index='), '&query='));
        return view('enfold.page.categories')->with([
            "tags" => $this->tags,
            "categories" => $this->categories,
            "category" => $category,
            "popular_category" => $this->max[1],
            "category_posts" => $category->posts()->orderByDesc('updated_at')->paginate(5),
            "popular_posts" => $this->popular_posts,
        ]);
    }

    public function show_tag_posts($url)
    {
        $tag = Tag::findOrfail(Str::before(Str::after($url, 'index='), '&query='));
        return view('enfold.page.tags')->with([
            "tags" => $this->tags,
            "categories" => $this->categories,
            "tag" => $tag,
            "popular_category" => $this->max[1],
            "tag_posts" => $tag->posts()->orderByDesc('updated_at')->paginate(5),
            "popular_posts" => $this->popular_posts,
        ]);
    }

    public function search_posts($url)
    {

        $query = Str::after(url()->full(), '?query=');
        //dd($query);
        $q = "";
        $i = 0;

        $this->posts = collect();

        while ($query != $q) {
            if ($i == 0) {
                $request = Str::before($query, '%20');
            } else {
                $request = Str::before(Str::after($query, $q), '%20');
            }
            $this->post = Post::where('title', 'LIKE', '%' . $request . '%')->where(['status'=>true,'is_approved'=>true])->get();

            if (count($this->post) != 0) {
                foreach ($this->post as $key => $post) {
                    $this->posts->push($post);
                }
            }
            $q .= $request;
            if ($q != $query) {
                $q .= '%20';
            }

            $i++;
        }
        $this->posts = $this->posts->unique('id');
        $query = str_replace("%20", " ", $query);
        return view('enfold.page.search')->with([
            "tags" => $this->tags,
            "query" => $query,
            "posts" => $this->posts->sortByDesc('updated_at'),
            "categories" => $this->categories,
            "popular_category" => $this->max[1],
            "popular_posts" => $this->popular_posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show_contact_form()
    {
        return view('enfold.page.contact')->with([
            "tags" => $this->tags,
            "posts" => $this->posts,
            "categories" => $this->categories,
            "popular_category" => $this->max[1],
            "popular_posts" => $this->popular_posts,
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function about_me()
    {
        return view('enfold.page.about')->with([
            "tags" => $this->tags,
            "posts" => $this->posts,
            "categories" => $this->categories,
            "popular_category" => $this->max[1],
            "popular_posts" => $this->popular_posts,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profil()
    {
        return view('enfold.page.profile')->with([
            "tags" => $this->tags,
            "posts" => $this->posts,
            "categories" => $this->categories,
            "popular_category" => $this->max[1],
            "popular_posts" => $this->popular_posts,
        ]);
    }


    public function add_comment(Request $request)
    {

        DB::beginTransaction();
        try {

            $request->validate([
                'name' => 'required|string|max:255',
                'post_id' => 'required|exists:posts,id',
                'user_id' => 'sometimes|exists:users,id',
                'email' => 'required|string|email|max:255',
                'commentaire' => 'required|string|max:255',
                'commentaire_id' => 'sometimes|exists:comments,id',
            ]);
            Comment::create($request->all());
            DB::commit();
            return back();
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $category
     * @return \Illuminate\Http\Response
     */
    public function delete_comment($comment)
    {
        DB::beginTransaction();
        try {
            $commentaire = Comment::findOrfail($comment);

            $commentaire->delete();

            DB::commit();
            \Toastr::success('Suppression effectuée');
            return back();
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json($e->getMessage());
        }
    }
}
