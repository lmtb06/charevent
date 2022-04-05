<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class InscriptionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
		// Les utilisateurs connectés ne peuvent pas faire cette requête
        if (Auth::check())
        {
            return false;
        }
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
			'email' => 'required|email|unique:comptes_actifs,mail|max:255',
			'password' => ['required', 'confirmed', 'max:30', Password::min(8)->mixedCase()->numbers()->symbols()],
			'nom' => 'required|string|max:100',
			'prenom' => 'required|string|max:100',
			'departement' => 'required|numeric|digits_between:1,3',
			'ville' => 'required|regex:/^[A-zÀ-ú_ \-]+$/',
			'codeZIP' => 'required|numeric|digits:5',
			'birth' => 'required|before:today',
			'telephone' => 'nullable|numeric|digits:10',
			'photo' => 'nullable|file|max:2024',
			'notificationMail' => 'nullable',
        
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
            'password.max'=>' le mot de passe est trop long ! Il est limité à 30 caractères',
            'photo.max' => 'Votre photo prend trop de place. La taille maximum supporté pour la photo est 2MB (2048 KB).'
		];
	}
}
