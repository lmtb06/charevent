<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    protected $table = 'participants';
    public $timestamps = false;

    protected $fillable = [
        'id_compte',
        'id_evenement',
    ];

    public function getIdCompte()
    {
        return $this->id_compte;
    }

    public function getCompte()
    {   
        return $this->belongsTo(User::class, 'id_compte');
    }
}
