<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')-> only('comment');

    }
    
    public function index(Request $request):View
    {
        // retourne la vue indes avec le parametre specifier dans la methode postsView pour la facto

        return $this->postsView($request -> search ? ['search' => $request->search]:[]);
    }

    public function show(Post $post):View{

        return view('posts.show', compact('post'));
    }

    public function comment(Post $post, Request $request):RedirectResponse
    {
        $validated = $request->validate([
           'comment'=>['required', 'string', 'between:2,255'] 
        ]);


        $comment = new Comment();


        $comment ->content= $validated['comment'];

        $comment ->post_id= $post->id;
        
        $comment ->user_id= Auth::id();


        $comment->save();

        return back()->with('status', 'Commentaire publié');


    }

    public function postsByCategory(Category $category)
    {
        return $this->postsView(compact('category'));
    
    }

    public function postsByTag(Tag $tag)
    {
        return $this->postsView(compact('tag'));

    }
    
    // pour retourner la vue de la facto(filters) fait par la methode scope dans le model post

    protected function postsView(array $filters): View
    {
        $posts = Post::filters($filters)->latest()->paginate(10);
            
            $total = $posts->count();
    
                
        return view('posts/index', compact('posts','total'));
    

    }

}
