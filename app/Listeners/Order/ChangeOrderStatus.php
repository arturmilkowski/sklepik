<?php

namespace App\Listeners\Order;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Events\Order\ChangeOrderStatus as ChangeOrderStatusEvent;
use App\Mail\Order\ChangeOrderStatus as ChangeOrderStatusMail;

class ChangeOrderStatus
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
    public function handle(ChangeOrderStatusEvent $event): void
    {
        Mail::to($event->order->orderable->email)->send(new ChangeOrderStatusMail($event));
    }
}
