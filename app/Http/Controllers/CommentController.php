<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function add()
    {
        $pID = request("postID");

        $comment = new Comment();

        $comment->post_id = request("postID");
        $comment->user_id = request("userID");
        $comment->message = request("commentData");
        $comment->user_picture = request("userImage");
        $comment->user_name = request("userName");

        $comment->save();

        $route = '/post/' . $pID;

        return redirect($route);
    }
}
