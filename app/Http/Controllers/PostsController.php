<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $post->imageURL = request('imageURL');

        $post->save();

        return redirect('/home');
    }
    public function getOne($postid)
    {
        $posts = Post::latest()->get();

        $postData = Post::findOrFail($postid);

        $id = Auth::user()->id;
        $postsOfUser = Post::where('user_id', $id)->get();
        $postsCount = count($postsOfUser);
        $user = User::find($id);


        $comments = Comment::latest()->where('post_id', $postid)->get();

        return view('post', ['postData' => $postData, 'user' => $user, 'posts' => $posts, 'count' => $postsCount, 'comments' => $comments]);
    }

    public function getUserPosts($userid)
    {

        $postsOfUser = Post::latest()->where('user_id', $userid)->get();
        $postsCount = count($postsOfUser);
        $user = User::find($userid);

        return view('userposts', ['user' => $user, 'count' => $postsCount, 'postsuser' => $postsOfUser]);
    }

    public function removePost()
    {
        $postID = request('postid');

        $post = Post::findOrFail($postID);

        $userid = Auth::user()->id;

        if ($userid == $post->user_id) {


            $post->delete();

            return redirect('/posts/' . $userid);
        } else {

            return redirect('/home');
        }
    }
}
