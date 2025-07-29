<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\EventReminder;
use Carbon\Carbon;

class UpdateEventStatuses extends Command
{
    protected $signature = 'events:update-status';
    protected $description = 'Update status of events to completed if past date_time';

    public function handle()
    {
        $now = now();
        // Fetch all upcoming events
        $events = EventReminder::where('status', 'upcoming')
            ->where('date_time', '<', $now)
            ->get();

        foreach ($events as $event) {
            $event->status = 'completed';
            $event->save();
        }

        $this->info("Updated {$events->count()} event(s).");
    }
}
