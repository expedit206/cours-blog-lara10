<x-defaultLayout title="Mon compte">

    <form action="{{ route('home') }}"  method='POST'>
        
        @csrf
        @method('PATCH') 
        {{-- //ca ne prend pas --}}

        <div class="">
            <div class="">
                <h1><b>Mot de passe</b></h1>
                <p>Vous pouvez modifier votre mot de passe pour vos futurs creation.</p>


                <div class="mt-10 spave-y-8 md:w-2/3">
                    <x-input type="password" name="current_password" label="Mot de passe actuel" />

                    <x-input type="password" name="password" label="Nouveau Mot de passe actuel" />

                    <x-input type="password" name="password_confirmation" label="Confirmation du nouveau Mot de passe actuel" />
                <div>

            </div>
            <div class="flex justify-end items-center">
                <button type="submit" class="bg-violet-800  mt-4 font-bold rounded-md p-2 text-white">Modifier</button>
            </div>
            
        </div>
    </form>

    </x-defaultLayout>
