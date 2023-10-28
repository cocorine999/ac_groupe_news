<?php

namespace App\Http\Controllers\App\Blogger;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        
    }

    public function index(){
        return view('enfold.backend.blogger.dashboard');
    }
}
