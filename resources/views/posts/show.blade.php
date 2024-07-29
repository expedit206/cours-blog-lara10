<x-defaultLayout title="{{ $post['title'] }}">
    <div class="">

        <x-post :$post />

        @auth

            <form action="{{ route('posts.comment', ['post'=>$post]) }}" method="post" class="">

                @csrf

                <div class="flex gap-2 justify-end  h-full mb-3 mt-2">
                    <textarea resize=none name="comment" id="" cols="50" rows="5" type="text"
                        placeholder="Rajouter quelque chose" autocomplete="off" class="bg-white border-slate-700  border-2 w-full rounded-md lg:w-1/2   outline-indigo-500 text-center shadow-md shadow-black" onfocus='this.select();' placeholder="ghjklmù">Votre commentaire ici !!!</textarea>
                    <button class="">
                        <span class="h-1/2 bg-green-400  rounded-md p-3 font-bold text-slate-800">Ok</span>
                    </button>
                </div>
                
                @error('comment')
                <p class="mt-2 text-sm text-red-600 ">{{ $message }}</p>
                    
                @enderror

            </form>
        @endauth


        <div class="space-y-8">
            @foreach ($post->comments as $comment)

            <div class="comment *:flex bg-slate-50 p-6 rounded-lg">
                <img class="w-10 h-10 sm:w-12 sm:h-12 objet-cover rounded-full" src="https://via.placeholder.com/130/130" alt="image de profil de {{ $comment->user->name  }}">
                
                <div class="ml-4 flex flex-col justify-start">
                    <hr>
                    <h2 class="font-bold text-slate-900 text-2xl text-start">{{ $comment->user->name }}</h2>
                    <hr>
                    
                    <div class="flex flex-col sm:flew-row  justify-start">
                        <p class="mt-4 text-slate-800 sm:leading-loose text-start">{{ $comment->content }}</p>

                        <time datetime={{ $comment->created_at }} class="italic mt-2 sm:mt-0 sm:ml-4 text-xs text-slate-400 text-start" >@dateTime($comment->created_at)</time>
                    </div>

                </div>
            </div>
                
            @endforeach
        </div>
    </div> 
</x-defaultLayout>
