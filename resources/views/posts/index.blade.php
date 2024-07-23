<x-layout>  
            
    Nombre d'article : {{ $total }}
    @foreach($posts as $post)
  
    <x-post :$post list />
    @endforeach
    </div>
    {{ $posts->links() }}

</x-layout>