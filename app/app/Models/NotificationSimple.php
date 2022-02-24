<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationSimple extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'destinataire_id',
        'dateLecture',
        'message',
        'typeMessage',
        'supprime',

    ];
    
    /**
    * The attributes that should be cast.
    *
    * @var array<string, string>
    */
   protected $casts = [
       'dateLecture' => 'datetime',
       'dateReception' => 'datetime',
   ];


}
