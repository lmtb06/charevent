<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompteArchive extends Model
{
    use HasFactory;

    protected $table = 'comptes_archives';
    protected $primaryKey = 'id_compte';
    public $timestamps =false;

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
        'dateCreationCompte',
        'dateModifCompte',
        'role',
        'id_residence'
    ];
}
