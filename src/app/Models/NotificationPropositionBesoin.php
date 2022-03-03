<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationPropositionBesoin extends Model
{
    use HasFactory;
    protected $table = 'notifications_proposition_besoin';
    protected $primaryKey = 'id_notification';
    protected $timestamps = false;

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
}
