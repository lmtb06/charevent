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
			'ville' => 'required|alpha_dash',
			'codeZIP' => 'required|numeric|digits:5',
			'birth' => 'required|before:today',
			'telephone' => 'nullable|digits:10|numeric',
			'photo' => 'nullable|file|max:2024',
			'notificationMail' => 'nullable',
		];
    }
}
