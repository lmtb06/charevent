<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationSimple extends Model
{
    use HasFactory;
    protected $table = 'notifications_simple';
    protected $primaryKey = 'id_notification';
    public $timestamps =false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_destinataire',
        'id_evenement',
        'dateReception',
        'dateLecture',
        'message',
        'supprime',
    ];
}
