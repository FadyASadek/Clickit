<?php

namespace App\Listeners;

use App\Events\EmailVerificationEvent;
use App\Traits\EmailTemplateTrait;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class EmailVerificationListener implements ShouldQueue
{
    use EmailTemplateTrait;

    /** Retry up to 3 times if the mail server is briefly unavailable. */
    public int $tries = 3;

    /** Max seconds a queued mail job may run before being killed. */
    public int $timeout = 30;

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
    public function handle(EmailVerificationEvent $event): void
    {
        $this->sendMail($event);
    }

    private function sendMail(EmailVerificationEvent $event):void{
        $email = $event->email;
        $data = $event->data;
        $this->sendingMail(sendMailTo: $email,userType: $data['userType'],templateName: $data['templateName'],data: $data);
    }
}
