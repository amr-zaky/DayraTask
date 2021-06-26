<?php

namespace App\Listeners;

use App\Mail\SendInvoiceMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendInvoiceEmailToClient
{

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(object $event)
    {
        Mail::to($event->emailData['email'])->send(new SendInvoiceMail($event->emailData));
    }
}
