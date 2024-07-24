<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class PostController extends Controller
{
    public function index():View
    {
        $total = Post::count();

        $posts = Post::latest()->paginate(10 );
        return view('posts/index', compact('posts', 'total'));
    }

    public function show(Post $post):View{

        return view('posts.show', compact('post'));
    }

    public function postsByCategory(Category $category)
    {
        $posts =Post::where(
            'category_id', $category->id
            )->latest()->paginate(10);
            
            $total = $posts->count();

                
        return view('posts/index', compact('posts','total'));
    }
}
