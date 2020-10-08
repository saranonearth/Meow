<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function add()
    {

        $post = new Post();

        $post->data = request('postData');
        $post->user_id = request('userId');
        $post->topic = "post";
        $post->user_picture = request('userImage');
        $post->user_name = request('userName');

        $post->save();

        return redirect('/home');
    }
}
