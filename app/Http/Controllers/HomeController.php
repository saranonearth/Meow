<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::latest()->get();


        $id = Auth::user()->id;
        $postsOfUser = Post::where('user_id', $id)->get();
        $postsCount = count($postsOfUser);
        $user = User::find($id);
        return view('home', ['user' => $user, 'posts' => $posts, 'count' => $postsCount]);
    }
}
