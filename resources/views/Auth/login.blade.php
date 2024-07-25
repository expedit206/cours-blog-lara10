<x-auth-layout title="Connexion" :action="route('login')" submitMessage="Connexion">

    
    <x-input name="email" label="Adresse e-mail" type="email"></x-input>
   
    <x-input name="password" label="Mot de passe" type="password"></x-input>
   

            
 <div class="flex items-center justify-between">
     <div class="flex items-center">
         <input id="remember" name="remember" type="checkbox"
              class="form-checkbox 
                  h-4 w-4 rounded border-gray-300 text-green-950 focus:ring-green-950">
         <label for="remember" class="ml-3 block text-sm leading-6">Rester connecter
          </label>
      </div>
  </div>

</x-auth-layout>