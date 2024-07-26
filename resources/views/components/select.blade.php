<div>
    <label for="{{ $id }}" class="block text-sm font-medium leading-6 text-gray900">{{ $label }}</label>
    <div class='mt-2 w-full'>
        <select
        id="{{ $id }}" 
        name="{{ $name .($multiple ? '[]' : '') }}"
         @class([
            'pr-10 text-red-900 ring-red-300  focus:ring-red-500'=> $errors->has($name),
            'w-full text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300
            placeholder:text-gray-400 focus:ring-2 focus:ring-indogo-600'=> !$errors->has($name), 
             'form-select' => !$multiple,
             'form-multiselect' => $multiple,
             ])
             @if ($multiple) multiple @endif
          >

          @foreach ($list as $item)
              <option value="{{ $item -> $optionValuesKeys }}"
                @selected($valueIsCollection ? $value -> contains($optionValuesKeys, $items->$optionValueKeys) :
                $item-> $optionValuesKeys == $value                )
                
                >
                {{ $item->  $optionValuesText }}
              </option>
          @endforeach
          
        
        </select>
 </div>
    
    @error($name)
        
    <p class="mt-2 text-sm text-red-600">{{ $message  }}</p>
    @enderror

    
    @if ($help)

    <p class="mt-2 text-sm text-gray-500 ">{{ $help }} </p>
        
    @endif
</div> 
