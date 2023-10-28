<?php

namespace App\Http\Controllers\App\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        
    }

    public function index(){
        return view('enfold.backend.admin.dashboard');
    }

    public function list_bloggeurs(){
        return view('enfold.backend.admin.blogueurs')->with('blogueurs', User::author()->get());
        
    }

    public function destroyBlogueur($blogueur)
    {
        DB::beginTransaction();
        try {
            $blog = User::findOrfail($blogueur);

            $blog->delete();
            DB::commit();
            \Toastr::success('Suppression effectuée');

            return redirect()->back();
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}
