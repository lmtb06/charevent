<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
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
			'hashMDP' => ['required','max:30', Password::min(8)->mixedCase()->numbers()->symbols()],
			'mdp' => ['required','confirmed', 'max:30', Password::min(8)->mixedCase()->numbers()->symbols()],
		];
    }

    public function messages()
    {
        return [
            
            'mdp.*' => "Le nouveau mot de passe doit être identique dans les deux champs, avoir entre 8 et 30 caractères et contenir au moins un chiffre, symbole et majuscule.",
            'hashMDP.*' => "Votre mot de passe actuel n'a pas été reconnu. Votre mot de passe n'a donc pas été modifié.",
        ];
    }
}
