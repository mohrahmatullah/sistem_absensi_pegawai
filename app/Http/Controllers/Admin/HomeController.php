<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        // if ($request->user()->hasRole('user')) {
        //     return view('admin.home.index');
        // }

        // if ($request->user()->hasRole('admin')){            
            
        //     return view('admin.home.index');
        // }
        // if (request()->user()->hasRole('admin')) {
        //     return view('admin.home.index');
        // } 
        // if (request()->user()->hasRole('user')) {
        //     return view('admin.home.index');
        //     // echo "test";
        // } 
        return view('admin.home.index');
    }
}
