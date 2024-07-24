<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;

class PostController extends Controller
{
    public function index(Request $request):View
    {
        $posts = Post::query();

        if($search = $request ->search){
            $posts ->where(fn (Builder $query)=>$query

            ->where('title', 'LIKE', '%' .$search .'%')
            ->orWhere('content', 'LIKE', '%' .$search .'%')
        );
  }
        
        $posts = $posts->latest()->paginate(10 );

        $total = $posts->count();
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

    public function postsByTag(Tag $tag)
    {
        $posts =Post::whereRelation(
            'tags', 'tags.id', $tag->id
            )->latest()->paginate(10);
            
            $total = $posts->count();

                
        return view('posts/index', compact('posts','total'));
    }
}
