<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Support\Facades\View;
use LaravelLang\Dev\Commands\Collect;
use Illuminate\Database\Eloquent\Collection;

class Select extends Component
{

    public bool $valueIsCollection;
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name,
        public string $label,
        public Collection $list,
        public ?string $id = null,
        public string $optionValuesKeys = 'id',
        public string $optionValuesText = 'name',
        public mixed $value = null,
        public bool $multiple = false,
        public string $help = '',
    )
    {
        $this->id ??= $this->name;

        $this-> handleValue();

    }

    protected function handleValue():void
    {
        $this->value =old($this->name) ?? $this->value;

        if(is_array($this->value)){
            
            $this->value = collect($this->value);
        }

        $this->valueIsCollection= $this->value instanceof Collection;
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.select');
    }
}
