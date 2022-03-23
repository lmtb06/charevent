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
		'ville' => 'required|alpha_dash',
		'codePostal' => 'required|numeric|digits:5',
		'dateDebut' => 'required|date|after:today',
		'dateFin' => 'nullable|date|after:dateDebut',
		'expiration' => 'nullable',
        ];
    }
}
