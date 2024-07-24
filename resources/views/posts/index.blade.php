<x-layout>  
            
    Nombre d'article : {{ $total }}
    @forelse($posts as $post)
  
    <x-post :$post list />
    @empty
    <p class="text-slate-40 text-center bg-slate-800 text-white py-5 font-bold text-2xl">Aucun Resultat</p>
    @endforelse
    </div>
    {{ $posts->links() }}

</x-layout>