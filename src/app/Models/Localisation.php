<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localisation extends Model
{
    use HasFactory;

    protected $table = 'localisations';
    protected $primaryKey = 'id_localisation';
    public $timestamps = false;

/**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'ville',
        'departement',
        'codePostal',
    ];

    public function evenements()
    {
        return $this->hasMany(Evenement::class);
    }

    public function comptes()
    {
        return $this->hasMany(User::class, 'id_residence');
    }

}
