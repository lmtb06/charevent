<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Evenement;
use App\Models\BesoinActif;
use App\Models\Localisation;
use App\Models\Notification;
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

    public function notifications()
    {
        return $this->hasMany(Notification::class,
        'id_destinataire');
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
        return $this->belongsTo(Localisation::class, 'id_residence');
    }

    public function getAuthPassword()
    {
        return $this->hashMDP;
    }

    public function getAuthIdentifier()
    {
        return $this->id_compte;
    }

    public function isSuperUser()
    {
        return $this->role === config('enums.user_roles.su');;
    }

    /**
     * Calcule l'??ge ?? partir de la date de naissance indiqu??e
     * @return int l'??ge de l'utilisateur
     */
    public function age()
    {
        return Carbon::parse($this->attributes['dateNaissance'])->age;
    }


    /**
     * R??cup??re les utilisateurs contenant le nom ou le pr??nom indiqu??
     *
     * @param [type] $builder
     * @param [type] $name nom ou pr??nom
     */
    public function scopeWhereName($builder, $name){
        if (!is_null($name)){
            $builder->where('prenom', 'like', '%'.$name.'%')
            ->orWhere('nom', 'like', '%'.$name.'%');
        }else{
            $builder->where('prenom', 'like', '%')
            ->orWhere('nom', 'like', '%');
        }
        
    }

    /**
     * Effectue une requ??te where sur le mod??le
     * S??lectionne les utilisateurs ??g?? entre les valeurs sp??cifi??es
     *
     * @param [type] $builder
     * @param Date $min date minimum 
     * @param Date $max date maximum
     */
    public function scopeWhereAge($builder, $min, $max){

        $builder->where([
            ['dateNaissance', '>=', $max],
            ['dateNaissance', '<=', $min]
        ]);
    }

    /**
     * R??cup??re les mod??les qui ont soit un n?? de t??l??phone
     * soit tous les mod??les
     * @param [type] $builder
     * @param boolean $tel le num??ro de t??l??phone doit ??tre pr??sent
     */
    public function scopeWhereHasTelephone($builder, $tel = True){
        if ($tel === True){
            $builder->whereNotNull('numeroTelephone');
        }else{
            $builder->where('id_compte', '>=', '1');
        }
    }
}
