<x-default-layout title="Gestion des posts">

    <div class="">


        <div class="">

            <div class="">
                <h1>Posts</h1>
                <p>Interface d'administration du blog</p>
            </div>

            <div class="mt-5">
                <a href="{{ route('admin.posts.create') }}" class="bg-violet-600 rounded-md p-2 text-white font-bold">Creer un post</a>
            </div>

        </div>
    </div>

    <div class="">
        <table>

            <thead>

                <tr>
                    <th>Titre</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
                </thead>


                <tbody>

                    @foreach ($posts as $post )
                        
                    <tr class="even:bg-gray-100">

                        <td>{{ $post->title }}</td>
                      
                        <td>

                            <a href="{{ route('posts.show', ['post'=>$post]) }}" target="_blank">Voir le post</a>
                            
                        </td>
                        
                        <td>
                            
                            <a href="{{ route('admin.posts.edit', ['post'=>$post]) }}">Editer</a>
                            
                        </td>

                        <td  x-data>
                        
                            <a href="
                            {{-- {{ route('admin.posts.destroy', ['post'=>$post]) }} --}}
                             #
                            " 
                                  {{-- @click.prevent ="$refs.delete.submit()" --}}
                                  >
                                  Supprimer
                                </a>

                            {{-- <form  x-ref="delete"  action="{{route('admin.posts.destroy', ['post'=>$post]) }}" method='POST'>
                                @csrf

                                @method('DELETE')
                                 
                            </form> --}}
                        
                        </td>


                    </tr>
                    @endforeach
                   

        </tbody>
        </table>
    </div>
</x-default-layout>