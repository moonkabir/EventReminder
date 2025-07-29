<?php

namespace App\Http\Controllers;

use App\Models\EventReminder;
use Illuminate\Http\Request;

class EventReminderController extends Controller
{
    public function index()
    {
        // $events = EventReminder::latest()->paginate(10);
        // return view('events.index', compact('events'));




        $now = now();
        // Fetch all upcoming events
        $events = EventReminder::where('status', 'upcoming')
            ->where('date_time', '<', $now)
            ->get();

            dd($events);





    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'date_time' => 'required|date',
            'status' => 'required|in:upcoming,completed',
            'participants_email' => 'nullable|email',
        ]);

        EventReminder::create($validated);

        return redirect()->route('events.index')->with('success', 'Event created successfully.');
    }

    public function show(EventReminder $event)
    {
        return view('events.show', compact('event'));
    }

    public function edit(EventReminder $event)
    {
        return view('events.edit', compact('event'));
    }

    public function update(Request $request, EventReminder $event)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'date_time' => 'required|date',
            'status' => 'required|in:upcoming,completed',
            'participants_email' => 'nullable|email',
        ]);

        $event->update($validated);

        return redirect()->route('events.index')->with('success', 'Event updated.');
    }

    public function destroy(EventReminder $event)
    {
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Event deleted.');
    }
}
