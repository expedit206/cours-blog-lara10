<x-default-layout :title="$post->exists() ? 'Modification du post' : 'Creation de post' " >


    <form action="{{$post->exists() ? route('admin.posts.update', ['post'=>$post]) : route('admin.posts.store') }}"  method="post" enctype="multipart/form-data" class="shadow-md shadow-black">
        
        @csrf
        
        @if ($post->exists())
        @method('PATCH')
            
        @endif

        <div class="">
            <div class="">
                <h1><b>
                    {{$post->exists() ? 'Modifier' . $post->title : "Creer un post"}}
                    </b></h1>
                <p>Faites parler vos talent de creativité</p>

                <div class="mt-10 spave-y-8 md:w-2/3">
                    <x-input name="title" label="Titre" :value="$post->title" />

                    <x-input name="slug" label="slug" :value="$post->slug" help="Laisser vide pour un slug auto. si une valeur est rensignée, elle sera slugifiée avant d'être soumise a la validation" />
                    <x-textarea name="content" label="Contenu du post">{{ $post->content }}</x-textarea>
                    
                    <x-input name="thumbnail" label="Image de couverture" type='file' :value="$post->thumbnail" />

                    <x-select name="category_id" label="categorie" :value="$post->category_id" :list="$categories" />

                    <x-select name="tag_ids" label="Etiquettes" :value="$post->tags" :list="$tags" multiple />
                <div>

            </div>
            <div class="flex justify-end items-center">
                <button type="submit" class="bg-violet-800  mt-4 font-bold rounded-md p-2 text-white">
                {{ $post->exists() ? 'Enregistrer les modifications' : 'Publier' }}
                </button>
            </div>
            
        </div>
    </form >
    
</x-default-layout>
