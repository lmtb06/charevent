<?php

namespace App\Http\Helpers;

use Illuminate\Support\Facades\Http;

class LocationApi
{

	/**
	 * Retourne un tableau contenant l'adresse normalisé/ la plus proche de l'adresse donné en paramètre
	 *
	 * @param string $ville la ville
	 * @param string $code_postale le code postale
	 * @param string $departement le numéro du département
	 * @return array contient les clés ville, code_postale et departement
	 */
	public static function normalize(string $ville, string $code_postale, string $departement): array
	{
		$result = Http::get('https://api-adresse.data.gouv.fr/search/', [
			'q' => $ville . ', ' . $code_postale . ', ' . $departement,
			'type' => 'street',
			'autocomplete' => '0',
			'limit' => '1'
		])->json()['features'][0]['properties'];

		$response = [
			'ville' => $ville,
			'code_postale' => $code_postale,
			'departement' => $departement
		];

		// La ville est renseigné dans la réponse
		if (isset($result['city'])) {
			$response['ville'] = $result['city'];
		}

		// Le code postale est renseigné dans la réponse
		if (isset($result['postcode'])) {
			$response['code_postale'] = $result['postcode'];
		}

		// Le département est renseigné dans la réponse
		if (isset($result['context'])) {
			$response['departement'] = substr($result['context'], 0, 2);
		}

		return $response;
	}
}
