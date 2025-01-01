<?php

namespace App\Listeners\Order;

// use Illuminate\Contracts\Queue\ShouldQueue;
// use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Events\Order\PlacedWithoutRegistration as PlacedWithoutRegistrationEvent;
use App\Mail\Order\PlacedWithoutRegistration as PlacedWithoutRegistrationMail;
use App\Mail\Order\Placed;

class WithoutRegistration
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
    public function handle(PlacedWithoutRegistrationEvent $event): void
    {
        Mail::to($event->customer->email)->send(new PlacedWithoutRegistrationMail($event));
        Mail::to(env('MAIL_FROM_ADDRESS', 'hello@example.com'))->send(new Placed($event));
    }
}
