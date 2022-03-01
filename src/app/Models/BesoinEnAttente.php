<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BesoinEnAttente extends Model
{
    use HasFactory;

    protected $table = 'besoinEnAttente';
    protected $primaryKey = 'besoin_id';
    protected $timestamps = false;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_responsable',
        'id_evenement',
        'titre_B',
        'typeModif'
    ];
}
