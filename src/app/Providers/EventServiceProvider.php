<?php

namespace App\Providers;

use App\Events\EvenementArchive;
use App\Events\ParticipantQuitte;
use App\Events\ModificationBesoin;
use App\Events\ParticipantAPostule;
use App\Events\ParticipantEstInvite;
use App\Events\ReponseNotification;
use App\Events\SouhaiteModificationBesoin;
use App\Events\SouhaiteSuppressionBesoin;
use App\Events\SuppressionBesoin;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use App\Listeners\NotifieModificationBesoin;
use App\Listeners\EnvoiNotificationArchivageEvent;
use App\Listeners\EnvoiNotificationQuitterEvenement;
use App\Listeners\EnvoiNotificationInvitationParticipant;
use App\Listeners\EnvoiNotificationCandidatureParticipant;
use App\Listeners\EnvoiReponseNotif;
use App\Listeners\NotifiePropositionBesoin;
use App\Listeners\NotifieSouhaiteModificationBesoin;
use App\Listeners\NotifieSouhaiteSuppressionBesoin;
use App\Listeners\NotifieSuppressionBesoin;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        ParticipantEstInvite::class => [
            EnvoiNotificationInvitationParticipant::class,
        ],
        ParticipantAPostule::class => [
            EnvoiNotificationCandidatureParticipant::class,
        ],
        ParticipantQuitte::class => [
            EnvoiNotificationQuitterEvenement::class,
        ],
        EvenementArchive::class => [
            EnvoiNotificationArchivageEvent::class,
        ],
        ModificationBesoin::class => [
            NotifieModificationBesoin::class,
        ],
        ParticipantAPostule::class => [
            EnvoiNotificationCandidatureParticipant::class,
        ],
        ParticipantEstInvite::class => [
            EnvoiNotificationInvitationParticipant::class,
        ],
        ParticipantQuitte::class => [
            EnvoiNotificationQuitterEvenement::class,
        ],
        ProposeBesoin::class => [
            NotifiePropositionBesoin::class,
        ],
        SouhaiteModificationBesoin::class => [
            NotifieSouhaiteModificationBesoin::class,
        ],
        SouhaiteSuppressionBesoin::class => [
            NotifieSouhaiteSuppressionBesoin::class,
        ],
        SuppressionBesoin::class => [
            NotifieSuppressionBesoin::class,
        ],
        ReponseNotification::class => [
            EnvoiReponseNotif::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
