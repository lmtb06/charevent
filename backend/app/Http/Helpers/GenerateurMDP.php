<?php

namespace App\Http\Helpers;

use Faker\Factory;
use Illuminate\Support\Str;

class GenerateurMDP
{
	/**
	 * Renvoie un mot de passe sécurisé et conforme aux attentes du système
	 *
	 * @return string
	 */
	public static function generer(): string
	{
		$faker = Factory::create();
		return $faker->password(8,30);
	}
}