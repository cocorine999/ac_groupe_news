<?php

namespace App\Http\Controllers\App\Frontend;

use App\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommentaireController extends Controller
{
    private $model;

    private $comment;

    public function __construct(App $app)
    {
        $this->model = new Comment();
        $this->comment = $app;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=Auth::user();
        if($user->role_id==3){
            $comments=$this->model->latest()->get();
        }elseif ($user->role_id==2)  {
            $comments=$user->commentaires->sortByDesc('updated_at');
        }
        return view('enfold.backend.commentaires')->with('commentaires', $comments);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            
            $commentaire = $this->comment->delete_comment($id);

            DB::commit();

            return redirect()->back();
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}
