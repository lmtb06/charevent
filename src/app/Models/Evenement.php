<?php

namespace App\Models;

use App\Models\User;
use DateTimeInterface;
use App\Models\BesoinActif;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Evenement extends Model
{
    use HasFactory;
    protected $table = 'evenements_actifs';
    public $timestamps =false;
    protected $primaryKey = 'id_evenement';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_localisation',
        'id_createur',
        'titre',
        'description',
        'dateDebut',
        'dateFin',
        'expiration',
    ];

    public function comptes()
    {
        return $this->belongsToMany(User::class,'participants', 'id_evenement', 'id_compte');
    }

    public function createur()
    {
        return $this->belongsTo(User::class, 'id_evenement');
    }

    public function localisation()
    {
        return $this->belongsTo(Localisation::class, 'id_localisation');
    }

    public function besoins()
    {
        return $this->hasMany(BesoinActif::class, 'id_evenement');
    }
}
