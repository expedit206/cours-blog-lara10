<!DOCTYPE html>
<html lang="fr" class="h-full ">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased h-full bg-slate-400">
    <div class="flex min-h-full flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="flex justify-center">
            <a href="{{ route('index') }}" class="border-blue-400 border-2 rounded-full p-2 bg-cyan-200">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"> <path strokeLinecap="round" strokeLinejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                </svg>
            </a>
        </div>
        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-[100%] flex justify-center">
            <div class="bg-black w-[90%] rounded-lg h-[60vh] md:w-[70%] lg:w-[50%] text-white px-6 py-12 shadow sm:rounded-lg sm:px-12">
                <form class="space-y-10" action=" {{ $action }}" method="POST" novalidate>
                    @csrf
                    {{ $slot }}
                 
                    <div>
                        <button type="submit" class="flex w-full justify-center
                        rounded-md bg-green-950 px-3 py-1.5 text-sm font-semibold leading-6 hover:text-green950 text-green-100 shadow-sm hover:bg-green-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green950">{{ $submitMessage }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
