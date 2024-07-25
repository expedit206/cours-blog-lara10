<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
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
            <form action="{{ route('index') }}"
                class="pb-3 pr-2 flex items-center 
border-b border-b-slate-300 text-slate-9
00 focus-within:border-b-slate-900 focuswithin:text-slate-900 transition">
                <input id="search" value="{{ request()->search }}"
                    class="px-2 w-full outline-none leadingnone placeholder-slate-400" type="search" name="search"
                    placeholder="Rechercher un
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
            <nav x-data="{ open: false }"  x-cloak class=" relative">
                <button
                 @click="open = !open" 
                 @click.outside="if (open) open = false"
                 @class([
                    'w-8 h-8 flex rounded-full bg-white text-sm 
        focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2',
                     'md:hidden ' => Auth::guest(),
                     ])
                >

                @auth
                        <img class="bg-blue-700 h-8 w-8 rounded-full" 
                        src="https://via.placeholder.com/120x120.png"
                         alt='image de profoil'>
                    @else
                        
                    
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 
        24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-8 h-8">

                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75
        6.75h16.5M3.75 12h16.5m-16.5 5.25H12" />
        
                    @endauth

                    </svg>
                </button>
                <ul x-show="open" x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="transform opacity-0 scale-95"
                    x-transition:enter-end="transform opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75"
                    x-transition:leave-start="transform opacity-100 scale-100"
                    x-transition:leave-end="transform opacity-0 scale-95"
                    @class([

                        'absolute right-0 z-10 mt-2 w-48 origin-top-right 
                        rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outlinenone',
                         'md:hidden' => Auth::guest(),

                         ])
                    tabindex="-1">

                    @auth
                        
                    <li><a href="{{ route('home') }}"
                        class="block px-4 py-2 text-sm text-gray-700 
                hover:bg-gray-100">Mon compte</a></li>
                <li>
                    <li><a @click.prevent="$refs.logout" href=""
                        class="block px-4 py-2 text-sm text-gray-700 
    hover:bg-gray-100">Deconnexion</a></li>

                        <form x-ref="logout" action="" method="post" class="hidden" action="">

                            @csrf

                        </form>
                    @else
                    
                    
                    <li><a href="{{ route('login') }}"
                            class="block px-4 py-2 text-sm text-gray-700 
        hover:bg-gray-100">Connexion</a></li>
                    <li>
                        <a href="{{ route('register') }}"
                            class="flex items-center px-4 py-2 font-semibold 
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
                    @endauth
                </ul>

                @guest
                    
                
                <ul class="hidden md:flex space-x-12 font-semibold">
                    <li><a href="{{ route('login') }}">Connexion</a></li>
                    <li>
                        <a href="{{ route('register') }}" class="flex items-center group text-indigo-700">
                            Inscription
                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                class="w-6 h-6 mx-1 group-hover:ml-2 group-hover:mr-0 
                transition-all">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                            </svg>
                        </a>
                    </li>
                </ul>
                
                @endguest

            </nav>

        </header>

        @if (@session('status'))
            <div class="mt-10 rounded-md bg-green-50 p-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000
                            16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06
                            1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-green-800">{{ session('status') }}</p>
                    </div>
                </div>
            </div>

            @endif
        <main class="mt-10 md:mt-12 lg:mt-16">
            <div class="space-y-10 md:space-y-16 mb-5">

                {{ $slot }}

            </div>
        </main>
    </div>
</body>

</html>
