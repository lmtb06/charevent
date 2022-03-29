<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ConnexionRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		// Les utilisateurs connectés ne peuvent pas faire cette requête
		if (Auth::check()) {
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
			'mail' => ['required', 'email'],
			'password' => ['required'],
		];
	}

	public function withValidator($validator)
	{
		if (!$validator->fails()) {
			$validator->after(function ($validator) {
				$user = User::where('mail', $this->mail)->first();
				if (!$user || !Hash::check($this->password, $user->hashMDP)) {
					$message = 'Mail ou mot de passe invalide';
					$validator->errors()->add('mail', $message);
					$validator->errors()->add('password', $message);
				}
			});
		}
	}


	public function messages()
	{
		return [
			'mail.required' => 'Mail requis',
			'password.required' => 'Mot de passe requis',
		];
	}
}
