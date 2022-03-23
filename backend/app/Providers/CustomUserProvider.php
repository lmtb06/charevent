<?php

namespace App\Providers;

use Closure;
use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;


class CustomUserProvider extends EloquentUserProvider
{

    public function retrieveByCredentials(array $credentials)
    {
        if (empty($credentials) ||
        (count($credentials) === 1 &&
            str_contains($this->firstCredentialKey($credentials), 'hashMDP'))) {
            return;
        }

        // First we will add each credential element to the query as a where clause.
        // Then we can execute the query and, if we found a user, return it in a
        // Eloquent User "model" that will be utilized by the Guard instances.
        $query = $this->newModelQuery();

        foreach ($credentials as $key => $value) {
            if (str_contains($key, 'hashMDP')) {
                continue;
            }

            if (is_array($value) || $value instanceof Arrayable) {
                $query->whereIn($key, $value);
            } elseif ($value instanceof Closure) {
                $value($query);
            } else {
                $query->where($key, $value);
            }
        }

        return $query->first();
    }

    /**
     * Validate a user against the given credentials.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  array  $credentials
     * @return bool
     */
    public function validateCredentials(UserContract $user, array $credentials)
    {
        $plain = $credentials['hashMDP'];

        return $this->hasher->check($plain, $user->getAuthPassword());
    }

}


?>