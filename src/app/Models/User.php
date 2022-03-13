<?php

namespace App\Models;

use App\Models\Evenement;
use App\Models\BesoinActif;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'comptes_actifs';
    protected $primaryKey = 'id_compte';
    const CREATED_AT = 'dateCreationCompte';
    const UPDATED_AT = 'dateModifCompte';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'prenom',
        'photo',
        'mail',
        'hashMDP',
        'dateNaissance',
        'numeroTelephone',
        'notificationMail',
        'role',
        'id_residence'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'hashMDP',
    ];

    public function evenements()
    {
        return $this->belongsToMany(Evenement::class,
        'participants' ,'id_compte', 'id_evenement');
    }

    public function createurDe()
    {
        return $this->hasMany(Evenement::class,
        'id_createur');
    }

    /**
     * Get the needs for the account.
     */
    public function besoins()
    {
        return $this->hasMany(BesoinActif::class, 'id_compte');
    }

    public function localisation()
    {
        return $this->belongsTo(Localisation::class, 'id_compte');
    }

    public function getAuthPassword()
    {
        return $this->hashMDP;
    }

    public function getAuthIdentifier()
    {
        return $this->id_compte;
    }
}
