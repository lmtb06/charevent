<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserCreationRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
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
			'code_postale' => 'required|numeric|digits:5',
			'naissance' => 'required|before:today',
			'telephone' => 'nullable|digits:10|numeric',
			'photo' => 'nullable|file|mimes:jpeg,jpg,png,gif|max:10000',
			'notification' => 'nullable',
		];
	}

	protected function failedValidation(Validator $validator)
	{
		throw new HttpResponseException(response()->json($validator->errors(), 422));
	}
}
