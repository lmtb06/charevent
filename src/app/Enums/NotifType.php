<?php

namespace App\Enums;

enum NotifType : string
{
    case Information = 'Information';
    case PostuleEvent = 'PostuleEvent';
    case InviteEvent = 'InviteEvent';
    case ModifBesoin = 'ModifBesoin';
    case ProposeBesoin = 'ProposeBesoin';
    case SupprimeBesoin = 'SupprimeBesoin';
    case VolontaireBesoin = 'VolontaireBesoin';

}



?>