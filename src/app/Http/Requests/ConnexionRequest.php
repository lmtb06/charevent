<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;
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
			'password' => ['required', 'max:30', Password::min(8)->mixedCase()->numbers()->symbols()],
		];
    }
}
