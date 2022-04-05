<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

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
                'hashMDP' => 'required|string|min:8|max:30',
                'mdp' => 'nullable|confirmed|string|min:8|max:30',
                'nom' => 'nullable|alpha_dash',
                'prenom' => 'nullable|alpha_dash',
                'departement' => 'nullable|numeric|digits_between:1,3',
                'ville' => 'nullable|alpha_dash',
                'codePostal' => 'nullable|numeric|digits:5',
                'dateNaissance' => 'nullable|before:today',
                'numeroTelephone' => 'nullable|digits:10|numeric',
                'photo' => 'nullable|file|max:2024',
        ];
    }
}
