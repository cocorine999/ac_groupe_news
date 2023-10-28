<?php

namespace App\Http\Controllers\App\Common\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Post;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new User();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->model = Auth::user();
        return view('enfold.backend.favorites.index')->with('favorite_posts', $this->model->favorite_posts()->orderByDesc("created_at")->get());
    }

    /**
     * Display the specified resource.
     *
     * @param int $post
     * @return \Illuminate\Http\Response
     */
    public function show($post)
    {
        return view('enfold.backend.favorites.show')->with('favorite_post', Post::findOrfail($post));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add($post)
    {
        $user = Auth::user();

        if ($user) {
            $isFavorite = $user->favorite_posts()->where('post_id', $post)->count();

            if ($isFavorite == 0) {
                $user->favorite_posts()->attach($post);
                \Toastr::success("Vous avez aimé ce post");
                return redirect()->back();
            } else {
                $user->favorite_posts()->detach($post);
                \Toastr::success("Vous supprimé ce post de vos favoris");

                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }
}
