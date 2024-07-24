    <div>
        <label for="{{ $id }}" class="block text-sm font-medium leading-6 text-gray900">{{ $label }}</label>
        <div class="mt-2">
            <input id="{{ $id }}" name="{{ $name }}" type="{{ $type }}" value="{{ $value }}" autocomplete="current-password"
             class="form-input block w-full rounded-md
                    border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300
                placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-950 sm:textsm sm:leading-6">
        </div>
        @if ($help)

        <p class="mt-2 text-sm text-gray-500 ">{{ $help }} </p>
            
        @endif
    </div>