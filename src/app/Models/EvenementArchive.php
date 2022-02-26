<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvenementArchive extends Model
{
    use HasFactory;

    protected $timestamps = false;
    protected $primaryKey = 'evenement_archive_id';

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
}
