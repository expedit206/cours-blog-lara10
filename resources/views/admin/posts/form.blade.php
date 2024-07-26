<x-default-layout title="Creation d'un posts">


    <form action="{{ route('admin.posts.store') }}"  method="post" enctype="form-data">
        
        @csrf

        <div class="">
            <div class="">
                <h1><b>Creer un post</b></h1>
                <p>Faites parler vos talent de creativité</p>


                <div class="mt-10 spave-y-8 md:w-2/3">
                    <x-input name="title" label="Titre" />

                    <x-input name="slug" label="slug" help="Laisser vide pour un slug auto. si une valeur est rensignée, elle sera slugifiée avant d'être soumise a la validation" />
                    <x-textarea name="content" label="Contenu du post">vcs</x-textarea>
                    
                    <x-input name="thumbnail" label="Image de couverture" type='file' />
                    

                    <x-select name="category_id" label="categorie" :list="$categories" />

                    <x-select name="tag_ids" label="Etiquettes" :list="$tags" multiple/>
                <div>

            </div>
            <div class="flex justify-end items-center">
                <button type="submit" class="bg-violet-800  mt-4 font-bold rounded-md p-2 text-white">Modifier</button>
            </div>
            
        </div>
    </form >
    
</x-default-layout>