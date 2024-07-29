@props(['post', 'list'=>false])


  {{-- Début du post --}} 
<article class="flex flex-col lg:flex-row pb-10 md:pb-16 border-b">
    <div class="lg:w-5/12">

        <img class="w-full max-h-72 object-cover lg:max-h-none lg:hfull" src="{{
          
          str_starts_with($post->thumbnail, 'http')    ? $post['thumbnail'] : asset('storage/' . $post['thumbnail']) 
          
          }}">
    </div>
    <div class="flex flex-col items-start mt-5 space-y-5 lg:w-7/12 
    lg:mt-0 lg:ml-12">

    @if ($post->category)
      
    <a href="{{ route('posts.byCategory', ['category'=>$post->category]) }}" class="text-2xl font-bold textlg">{{ $post->category->name }}</a>
    
    @endif
    
    <h1 class="font-bold text-3xl lg:text-5xl black
    leading-tight">{{$post['title']}}</h1>
    
    @if ($post->tags->isNotEmpty())
      
    <ul class="flex flex-wrap gap-2">
      @foreach ($post->tags as $tag)
          
      <li><a href="{{ route('posts.byTag', ['tag'=>$tag]) }}" class="px-3 py-1 bg-indigo-600 textindigo-50 rounded-full text-sm  tag">{{ $tag->name }}</a></li>
      
      @endforeach

    </ul>
    @endif


    <p class="text-xl lg:text-2xl black">
        @if ($list)
        
        {{$post['excerpt']}}

        @else

        {!! nl2br(e($post['content'])) !!}

        @endif
    </p>

    @if ($list)

    <a href=" {{ route('posts.show', ['post' => $post]) }} " class="flex items-center py-2 px-4 font-semibold 
    bg-slate-900 transition  rounded-full">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
    <path stroke-linecap="round" stroke-linejoin="round"
    d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 
    1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 
    7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 
    0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
    </svg>
    Lire l'article
    </a>

    @else

    <time class="text-xs " datetime="{{ $post['created_at'] }}"> @dateTime($post -> created_at)</time>


    @endif
    </div>
</article>
  {{-- Fin du post --}}