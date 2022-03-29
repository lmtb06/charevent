<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationDemandeParticipation extends Model
{
    use HasFactory;
    protected $table = 'notifications_demande_participation';
    protected $primaryKey = 'id_notification';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'N',
        'id_envoyeur',
        'id_evenement',
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

    public function envoyeur(){
        return $this->belongsTo(User::class, 'id_envoyeur');
    }

    public function destinataire(){
        return $this->belongsTo(User::class, 'id_destinaire');
    }

}
