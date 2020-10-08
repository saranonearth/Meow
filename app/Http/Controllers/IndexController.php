<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {

        $posts = Post::all();

        if (Auth::user()) {

            return redirect('/home');
        } else {

            return view('hey', ['posts' => $posts]);
        }
    }
}
