<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\Component;

class Input extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(

        public string $name,
        public string $label,
        public ?string $value=null,
        public ?string $id = null,
        public string $type = 'text',
        public string $help = '',

    )
    {
        $this->id ??= $this->name;   
    }

    public function isImage()
    {
        return str_starts_with(Storage::mimeType($this->value), 'image/'); //Verifie si le fichier passer en valeur a un minetype qui commence par "/image". Car les minetype des fichier image se presente comme ceci : "/image/nom_de_l'image" 
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input');
    }
}
