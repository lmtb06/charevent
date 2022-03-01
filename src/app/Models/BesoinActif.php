<?php

namespace App\Models;

use App\Models\User;
use App\Models\Evenement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BesoinActif extends Model
{
    use HasFactory;

    protected $table = 'besoinActif';
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
    ];

    /**
     * Get the account that owns the need.
     */
    public function compte()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the event that owns the need.
     */
    public function evenement()
    {
        return $this->belongsTo(Evenement::class);
    }
}
