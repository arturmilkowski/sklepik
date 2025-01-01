<?php

namespace App\Listeners\Order;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Events\Order\PlacedWithRegistration as PlacedWithRegistrationEvent;
use App\Mail\Order\PlacedWithRegistration as PlacedWithRegistrationMail;
use App\Mail\Order\Placed;

class WithRegistration
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PlacedWithRegistrationEvent $event): void
    {
        Mail::to(Auth::user()->email)->send(new PlacedWithRegistrationMail($event));
        Mail::to(env('MAIL_FROM_ADDRESS', 'hello@example.com'))->send(new Placed($event));
    }
}
