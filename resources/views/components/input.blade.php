    <div>
        <label for="{{ $id }}" class="block text-sm font-medium leading-6 text-gray900">{{ $label }}</label>
        <div @class(['mt-2 w-full', 'relative rounded-md shadow-sm' => $errors->has($name) && $type!=='file'])>
            <input
             id="{{ $id }}" 
            name="{{ $name }}"
            type="{{ $type }}"

            @if ($type!== 'file')
                
            value="{{ old($name) ?? $value }}"
            @class([
                'w-full pr-10 text-red-900 ring-red-300 placeholder:text-red-300 focus:ring-red-500'=> $errors->has($name),
                'w-full text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300
                placeholder:text-gray-400 focus:ring-2 focus:ring-indogo-600'=> !$errors->has($name),
                
                 ])
              @endif
              >
              
            

        @error($name && $type!=='file')
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center 
        ">
            <svg class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor"
            aria-hidden="true">
            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-
            5a.75.75 0 01.75.75v4.5a.75.75 0 01-1.5 0v-4.5A.75.75 0 0110 5zm0 10a1 1 0 100-2 1 1 
            0 000 2z" clip-rule="evenodd" />
            </svg>
        </div>

        @enderror
     </div>
        
        @error($name)
            
        <p class="mt-2 text-sm text-red-600">{{ $message  }}</p>
        @enderror

        
        @if ($help)

        <p class="mt-2 text-sm text-gray-500 ">{{ $help }} </p>
            
        @endif
    </div>
