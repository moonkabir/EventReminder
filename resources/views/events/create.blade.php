@extends('layouts.master')

@section('content')
<div class="max-w-2xl mx-auto p-4 bg-white shadow-md rounded-md">
    <h2 class="text-2xl font-bold mb-4">Create Event Reminder</h2>

    @if ($errors->any())
        <div class="mb-4 text-red-500">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('events.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="title" class="block font-semibold">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block font-semibold">Description</label>
            <textarea name="description" id="description" class="w-full border p-2 rounded" rows="3">{{ old('description') }}</textarea>
        </div>

        <div class="mb-4">
            <label for="date_time" class="block font-semibold">Date & Time</label>
            <input type="datetime-local" name="date_time" id="date_time" value="{{ old('date_time') }}" class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label for="participants_emails" class="block font-semibold">Participants Emails</label>
            <input type="text" name="participants_email" class="w-full border p-2 rounded" placeholder="email@example.com">
            <!-- You can make this dynamic with JS later -->
        </div>

        <div class="mb-4">
            <label for="status" class="block font-semibold">Status</label>
            <select name="status" id="status" class="w-full border p-2 rounded">
                <option value="upcoming" {{ old('status') == 'upcoming' ? 'selected' : '' }}>Upcoming</option>
                <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completed</option>
            </select>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Save Event
            </button>
        </div>
    </form>
</div>
@endsection
