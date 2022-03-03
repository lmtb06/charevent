<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BesoinArchive extends Model
{
    use HasFactory;

    protected $table = 'besoins_archives';
    protected $primaryKey = 'id_besoin';
    protected $timestamps = false;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_responsable',
        'id_evenement',
        'titre',
    ];
}
