<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index():View
    {
        $posts = Post::latest()->paginate(10 );
        $total = Post::count();
        return view('posts/index', compact('posts', 'total'));
    }

    public function show(Post $post):View{

        return view('posts.show', compact('post'));
    }
}
