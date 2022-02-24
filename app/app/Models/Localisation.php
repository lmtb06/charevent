<?php

namespace App\Models;

use App\Models\User;
use App\Models\Evenement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Localisation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'titreE',
        'description',
        'dateDebut',
        'dateFin',
        'expiration'
    ];

    /**
     * Récupère les utilisateurs liés à la localisation
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * Récupère les utilisateurs liés à la localisation
     */
    public function evenements()
    {
        return $this->hasMany(Evenement::class);
    }
}
