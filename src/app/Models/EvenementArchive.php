<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvenementArchive extends Model
{
    use HasFactory;

    protected $table = 'evenements_archives';
    protected $timestamps = false;
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
}
