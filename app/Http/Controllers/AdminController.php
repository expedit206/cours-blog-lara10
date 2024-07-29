<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Http\Requests\PostRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.posts.index', [
             'posts' => Post::without('category','tags')->latest()->get(), //recupere les post sans charger les categories et les tags comme specifier dans le model post


        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
      return $this ->showForm();

    }
    

        /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {

        return $this ->showForm($post);

    }

    public function showForm(Post $post = new Post):View
    {
        return view('admin.posts.form', [
            'post'=>$post,
            'categories' => Category::orderBy('name')->get(),
            'tags' => Tag::orderBy('name')->get(),
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
    return $this->save($request->validated());
   }



    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post)
    {
    return $this->save($request->validated(), $post);
        
    }

    protected function save(array $data, Post $post = null):RedirectResponse
    {
        if(isset($data['thumbnail'])){
            if(isset($post->thumbnail)){
                Storage::delete($post->image);
            }
            $data['thumbnail'] = $data['thumbnail']->store('thumbnails');

        }
        $data['excerpt'] = Str::limit($data['content'], 150);
        var_dump($data);
        var_dump($post);
        $post=Post::updateOrCreate(['id'=>$post?->id], $data);
 
        $post->tags()->sync($data['tags_ids'] ?? null); // ca supprime les ancienne relation et creer les nouvelle qui se trouve dans la table posts_tag
 
        return redirect()->route('posts.show', ['post'=> $post])->with('status', $post->wasRecentlyCreated ? 'Post publié ! ' : 'Post mis a jour !' );
    

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post):RedirectResponse
    {
        Storage::delete($post->thumbnail);

        $post->delete();
       return redirect()->route('admin.posts.index');
    }
}
