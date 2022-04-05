<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UpdateProfilRequest extends FormRequest
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
                'mail' => 'nullable|email|max:255',
                'hashMDP' => 'required|string',
                'nom' => 'nullable|alpha_dash|max:100',
                'prenom' => 'nullable|alpha_dash|max:100',
                'departement' => 'nullable|numeric|digits_between:1,3',
                'ville' => 'nullable|alpha_dash',
                'codePostal' => 'nullable|numeric|digits:5',
                'dateNaissance' => 'nullable|before:today',
                'numeroTelephone' => 'nullable|digits:10|numeric',
                'photo' => 'nullable|file|max:2024',
        ];
    }

	public function messages()
	{
		return [
            'unique' => 'Cette addresse e-mail est déjà attribué à un compte.',
			'min' => 'il faut un minimum de 8 caractère pour le mot de passe.',
            'digits_between' => 'veuillez rentrez un vrai numéro de département français.',
            'digits' => 'veuillez rentrez un vrai code postal français (5 chiffres).',
            'before' => 'vous ne pouvez pas être né(e) dans le futur...',
            'confirmed' => 'les deux mots de passe ne correspondent pas.',
            'ville.regex' => 'veuillez rentrez un vrai nom de ville',
            'codeZIP.numeric' => 'veuillez rentrez des chiffres uniquement pour le code postal',
            'telephone.numeric' => 'veuillez rentrez des chiffres uniquement pour le telephone',
            'departement.numeric' => 'veuillez rentrez des chiffres uniquement pour le departement',
            'nom.max'=>'le nom est limité a 100 caractères',
            'prenom.max'=>'le prénom est limité a 100 caractères',
            'mail.max'=>' l\'adresse mail est limité à 255 caractères',
            'mdp.max'=>' le mot de passe est trop long ! Il est limité à 30 caractères',
            'photo.max' => 'Votre photo prend trop de place. La taille maximum supporté pour la photo est 2MB (2048 KB).'
		];
	}
}
