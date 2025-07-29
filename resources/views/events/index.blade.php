@extends('layouts.master')

@section('content')
<div class="container mx-auto p-4">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold">Event Reminders</h2>
        <a href="{{ route('events.create') }}" class="bg-blue-600 px-4 py-2 rounded hover:bg-blue-700">Create Event</a>
    </div>

    @if ($events->count())
        <table class="min-w-full bg-white border border-gray-300 rounded shadow-sm">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="py-2 px-4 border-b">#</th>
                    <th class="py-2 px-4 border-b">Title</th>
                    <th class="py-2 px-4 border-b">Description</th>
                    <th class="py-2 px-4 border-b">Date & Time</th>
                    <th class="py-2 px-4 border-b">Status</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $index => $event)
                    <tr class="hover:bg-gray-50">
                        <td class="py-2 px-4 border-b">{{ $index + 1 }}</td>
                        <td class="py-2 px-4 border-b">{{ $event->title }}</td>
                        <td class="py-2 px-4 border-b">{{ Str::limit($event->description, 50) }}</td>
                        <td class="py-2 px-4 border-b">{{ $event->date_time->format('Y-m-d H:i') }}</td>
                        <td class="py-2 px-4 border-b capitalize">{{ $event->status }}</td>
                        <td class="py-2 px-4 border-b">
                            <a href="{{ route('events.edit', $event) }}" class="text-blue-600 hover:underline">Edit</a>
                            <form method="POST" action="{{ route('events.destroy', $event) }}" class="inline-block ml-2" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $events->links() }}
        </div>
    @else
        <p>No events found.</p>
    @endif
</div>
@endsection

