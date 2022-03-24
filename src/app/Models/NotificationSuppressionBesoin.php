<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationSuppressionBesoin extends Model
{
    use HasFactory;
    protected $table = 'notifications_suppression_besoin';
    protected $primaryKey = 'id_notification';
    public $timestamps =false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_destinataire',
        'id_envoyeur',
        'id_evenement',
        'id_besoin_en_attente',
        'dateReception',
        'dateLecture',
        'message',
        'supprime',
        'accepte',
        'dateChoix'
    ];

    public function evenement()
    {
        return $this->belongsTo(Evenement::class, 'id_evenement');
    }

    public function besoin()
    {
        return $this->belongsTo(BesoinActif::class, 'id_besoin');
    }

    public function createurEvenement()
    {
        return $this->hasOneThrough(
            User::class, 
            Evenement::class, 
            'id_createur', +
            'id_evenement', 
            'id_envoyeur', 
            'id_createur'
        );
    }
}
