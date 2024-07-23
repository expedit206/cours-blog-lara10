<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') . ' | article ' . $post->id}}</title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased pt-10 pb-16 md:pb-32">
    {{-- Conteneur global --}}
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        {{-- Header --}}
        <header class="flex justify-between items-center space-x-5 text-slate-900">
            {{-- Logo --}}
            <a href="{{ route('index') }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M4.2610.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 18.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-
2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 
15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                </svg>
            </a>
            {{-- Formulaire de recherche --}}
            <form action="{{ route('index') }}" class="pb-3 pr-2 flex items-center 
border-b border-b-slate-300 text-slate-300 focus-within:border-b-slate-900 focuswithin:text-slate-900 transition">
                <input id="search" value="" class="px-2 w-full outline-none leadingnone placeholder-slate-400"
                    type="search" name="search" placeholder="Rechercher un
article">
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                        <path fill-rule="evenodd"
                            d="M9 3.5a5.5 5.5 0 100 11 5.5 5.50 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 70 012 9z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </form>
            {{-- Navigation --}}
            <nav x-data="{ open: false }" class="relative">
                <button @click="open = !open" @click.outside="if (open) open = false" class="md:hidden w-8 h-8 flex rounded-full bg-white text-sm 
    focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 
    24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 
    6.75h16.5M3.75 12h16.5m-16.5 5.25H12" />
                    </svg>
                </button>
                <ul x-show="open" x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="transform opacity-0 scale-95"
                    x-transition:enter-end="transform opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75"
                    x-transition:leave-start="transform opacity-100 scale-100"
                    x-transition:leave-end="transform opacity-0 scale-95" class="md:hidden absolute right-0 z-10 mt-2 w-48 origin-top-right 
    rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outlinenone" tabindex="-1">
                    <li><a href="" class="block px-4 py-2 text-sm text-gray-700 
        hover:bg-gray-100">Connexion</a></li>
                    <li>
                        <a href="" class="flex items-center px-4 py-2 font-semibold 
            text-sm text-indigo-700 hover:bg-gray-100">
                            Inscription
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 2020" fill="currentColor"
                                class="w-5 h-5 ml-1">
                                <path fill-rule="evenodd"
                                    d="M2 10a.75.75 0 01.75-
                .75h12.59l-2.1-1.95a.75.75 0 111.02-1.1l3.5 3.25a.75.75 0 010 1.1l-3.5 3.25a.75.75 011-1.02-1.1l2.1-1.95H2.75A.75.75 0 012 10z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </li>
                </ul>

                <ul class="hidden md:flex space-x-12 font-semibold">
                    <li><a href="">Connexion</a></li>
                    <li>
                        <a href="" class="flex items-center group text-indigo-700">
                            Inscription
                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mx-1 group-hover:ml-2 group-hover:mr-0 
                transition-all">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                            </svg>
                        </a>
                    </li>
                </ul>
            </nav>

        </header>
        <main class="mt-10 md:mt-12 lg:mt-16">
            <div class="space-y-10 md:space-y-16 mb-5">
                {{-- Début du post --}}
                <article class="flex flex-col lg:flex-row pb-10 md:pb-16 border-b">
                    <div class="lg:w-5/12">

                        <img class="w-full max-h-72 object-cover lg:max-h-none lg:hfull" src="{{$post['thumbnail']}}">
                    </div>
                    <div class="flex flex-col items-start mt-5 space-y-5 lg:w-7/12 
lg:mt-0 lg:ml-12">
                        <a href="" class="underline font-bold text-slate-900 textlg">Catégorie</a>
                        <h1 class="font-bold text-slate-900 text-3xl lg:text-5xl 
leading-tight">{{$post['title']}}</h1>
                        <ul class="flex flex-wrap gap-2">
                            <li><a href=""
                                    class="px-3 py-1 bg-indigo-700 textindigo-50 rounded-full text-sm text-white">Tag
                                    1</a></li>
                            <li><a href=""
                                    class="px-3 py-1 bg-indigo-700 textindigo-50 rounded-full text-sm text-white">Tag
                                    2</a></li>
                            <li><a href=""
                                    class="px-3 py-1 bg-indigo-700 textindigo-50 rounded-full text-sm text-white">Tag
                                    3</a></li>
                        </ul>

                        <p class="text-xl lg:text-2xl text-slate-600">
                            {!! nl2br(e($post['content'])) !!}
                        </p>

                        <time class="text-xs text-slate-600" datetime="{{ $post['created_at'] }}"> {{ $post['created_at'] }} </time>
                    </div>
                </article>
                {{-- Fin du post --}}
            </div>
        </main>
    </div>
</body>

</html>