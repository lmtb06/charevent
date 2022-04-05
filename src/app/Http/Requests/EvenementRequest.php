<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class EvenementRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        'titre' => 'required|string|max:40',
		'description' => 'required|string|min:5|max:1000',
		'departement' => 'required|numeric|digits_between:1,3',
		'ville' => 'required|regex:/^[A-zÀ-ú_ \-]+$/|string',
		'codePostal' => 'required|numeric|digits:5',
		'dateDebut' => 'required|date|after:today',
		'dateFin' => 'nullable|date|after:dateDebut',
		'expiration' => 'nullable',
        ];
    }

	public function messages()
	{
		return [
			'required' => 'attribut requis',
			'min' => 'il faut au moins 5 caractère pour la description',
            'description.max' => 'la description fait 1000 caractères maximum',
            'titre.max' => 'le nom de l\'événement fait 40 caractères maximum',
            'dateDebut.after' => 'vous ne pouvez pas choisir une date antérieur a la date d\'aujourd\'hui',
            'dateFin.after' => 'vous ne pouvez pas choisir une date antérieur a la date de début de l\'événement',
            'numeric' => 'vous de pouvez mettre que des chiffres',
            'codePostal.digits' => 'un code postal a 5 chiffres',
            'digits_between' => 'il y a entre 1 et 3 caractères',
            'ville.regex' => 'veuillez rentrez un vrai nom de ville'
		];
	}
}
