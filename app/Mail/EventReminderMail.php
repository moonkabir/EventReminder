<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\EventReminder;

class EventReminderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $event;

    public function __construct(EventReminder $event)
    {
        $this->event = $event;
    }

    public function build()
    {
        return $this->subject("Reminder: {$this->event->title}")->view('emails.reminder');
    }
}
