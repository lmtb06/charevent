<?php

namespace App\Models;

use App\Models\BesoinActif;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;

class Evenement extends Model
{
    use HasFactory;

    protected $timestamps = false;
    protected $primaryKey = 'evenement_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'localisation_id',
        'createur_id',
        'titreE',
        'description',
        'dateDebut',
        'dateFin',
        'expiration',
    ];

    public function comptes()
    {
        return $this->belongsToMany(User::class, 'participants');
    }

    public function createur()
    {
        return $this->belongsTo(User::class);
    }

    public function localisation()
    {
        return $this->belongsTo(Localisation::class);
    }

    public function besoins()
    {
        return $this->hasMany(BesoinActif::class);
    }
}
