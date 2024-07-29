<x-default-layout title="Gestion des posts">

    <div class="">


        <div class="">

            <div class="">
                <h1>Posts</h1>
                <p>Interface d'administration du blog</p>
            </div>

            <div class="mt-5">
                <a href="{{ route('admin.posts.create') }}" class="bg-violet-100 rounded-md p-2 text-black font-bold">Creer un post</a>
            </div>

        </div>
    </div>

    <div class="flex justify-center ">
        <table border="3" class="w-[95%]">

            <thead class="border-2 ">

                <tr>
                    <th>Titre</th>
                <th colspan="3">Action</th>
            </tr>
                </thead>


                <tbody class="border-2">

                    @foreach ($posts as $post )
                        
                    <tr class="even:bg-gray-700 border-2 ">

                        <td class="text-start p-2 font-bold">{{ $post->title }}</td>
                      
                        <td>

                            <a href="{{ route('posts.show', ['post'=>$post]) }}" class="bg-opacity-20 border-1 bg-green-600  rounded-lg p-1" target="_blank">Voir le post</a>
                            
                        </td>
                        
                        <td>
                            
                            <a href="{{ route('admin.posts.edit', ['post'=>$post]) }} " class="alert alert-success px-3 py-1">Editer</a>
                            
                        </td>

                        <td  x-data>
                        
                            <a href="#" 
                            class='bg-opacity-30 border-1 supp bg-red-600 rounded-lg p-1 text-white ' 
                            onclick="
                            let form = document.querySelector('.form')
                         form.submit()
                            "
                                  {{-- @click.prevent ="$refs.delete.submit()" --}}
                                  >
                                  Supprimer
                                </a>

                            <form  x-ref="delete" class="form"  action="{{route('admin.posts.destroy', ['post'=>$post]) }}" method='POST'>
                                @csrf

                                @method('DELETE')
                                 
                            </form>
                        
                        </td>


                    </tr>
                    @endforeach
                   

        </tbody>
        </table>
    </div>
</x-default-layout>