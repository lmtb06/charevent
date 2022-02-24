<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Evenement extends Model
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
     * Retourne la localisation associé à un utilisateur
     */
    public function localisation()
    {
        return $this->belongsTo(Localisation::class);
    }

    /**
     * 
     */
    public function user()
    {
        return $this->belongsToMany(User::class);
    }

}
