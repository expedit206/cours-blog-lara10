<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{


    protected function prepareForValidation():void
    {
        $this -> merge([
            'slug'=>Str::slug($this->slug ?? $this->title),
        ]);
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(Request $request): array
    {
        return [
            'title' => ['required', 'string', 'between:3,255'],
            'slug' => ['required', 'string', Rule::unique('posts')->ignore($this -> post) ], //igno re le post le post actuel pour appliquer la validation unique sur la table, si no les erreur d'unicite lors de la creation
            'content' => ['required', 'string', 'min:12'],
            'thumbnail' => [Rule::requiredIf($request->isMethod('post')), 'image'], //le champ est requit si on est sur la methode post donc de creation du post si non elle n'est pas requis et on es sur la modification
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'tags_id' => ['array', 'exists:tags,id'],
        ];
    }
}
