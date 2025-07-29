<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\EventReminder;
use App\Mail\EventReminderMail;
use Illuminate\Support\Facades\Mail;

class SendEventReminders extends Command
{
    protected $signature = 'events:send-reminders';
    protected $description = 'Send reminder emails to participants before the event starts';

    public function handle()
    {
        $now = now();
        $remindBeforeMinutes = 30;

        // Get events happening within next X minutes that haven't been reminded
        $events = EventReminder::where('reminder_sent', false)
            ->whereBetween('date_time', [$now->copy()->addMinutes($remindBeforeMinutes - 1), $now->copy()->addMinutes($remindBeforeMinutes + 1)])
            ->get();

        foreach ($events as $event) {
            if (filter_var($event->participants_email, FILTER_VALIDATE_EMAIL)) {
                Mail::to($event->participants_email)->queue(new EventReminderMail($event));
                $event->reminder_sent = true;
                $event->save();

                $this->info("Reminder sent for event ID {$event->id}");
            }
        }
    }
}
