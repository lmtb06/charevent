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
        'id_destinataire',
        'id_envoyeur',
        'id_evenement',
        'dateReception',
        'dateLecture',
        'message',
        'supprime',
        'accepte',
        'dateChoix'
    ];
}
