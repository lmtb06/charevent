<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationParticipation extends Model
{
    use HasFactory;
    protected $table = 'notification_participation';
    protected $primaryKey = 'notification_id';
    protected $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'destinataire_id',
        'evenement_id',
        'dateReception',
        'dateLecture',
        'message',
        'description',
        'typeMessage',
        'accepte',
        'dateChoix'
    ];

}
