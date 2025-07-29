@extends('layouts.master')

@section('content')
<div class="container py-5">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-5">
        <h1 class="display-6 mb-4 mb-md-0">
            <i class="bi bi-calendar-event me-2"></i>Event Reminders
        </h1>
        <a href="{{ route('events.create') }}" class="btn btn-primary btn-lg">
            <i class="bi bi-plus-circle me-2"></i>Create Event
        </a>
    </div>

    @if ($events->count())
        <div class="card shadow-sm border-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th scope="col" class="text-nowrap">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Email</th>
                            <th scope="col" class="text-nowrap">Date & Time</th>
                            <th scope="col">Status</th>
                            <th scope="col" class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($events as $index => $event)
                            <tr>
                                <th scope="row">{{ $index + 1 }}</th>
                                <td class="fw-semibold">{{ $event->title }}</td>
                                <td class="text-muted">{{ Str::limit($event->description, 50) }}</td>
                                <td class="text-muted">{{ Str::limit($event->participants_email, 50) }}</td>
                                <td class="text-nowrap">{{ $event->date_time->format('Y-m-d H:i') }}</td>
                                <td>
                                    <span class="badge rounded-pill
                                        {{ $event->status === 'completed' ? 'bg-success' : 'bg-warning text-dark' }}">
                                        {{ ucfirst($event->status) }}
                                    </span>
                                </td>
                                <td class="text-end">
                                    <div class="d-flex justify-content-end gap-2">
                                        <a href="{{ route('events.edit', $event) }}"
                                           class="btn btn-sm btn-outline-primary rounded-circle"
                                           data-bs-toggle="tooltip"
                                           data-bs-placement="top"
                                           title="Edit">Edit</a>
                                        <form method="POST" action="{{ route('events.destroy', $event) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="btn btn-sm btn-outline-danger rounded-circle"
                                                    data-bs-toggle="tooltip"
                                                    data-bs-placement="top"
                                                    title="Delete"
                                                    onclick="return confirm('Are you sure you want to delete this event?')">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $events->links() }}
        </div>
    @else
        <div class="text-center py-5">
            <div class="py-5">
                <i class="bi bi-calendar-x text-muted" style="font-size: 3rem;"></i>
                <h4 class="mt-3 text-muted">No events found</h4>
                <p class="text-muted">Get started by creating your first event reminder</p>
                <a href="{{ route('events.create') }}" class="btn btn-primary mt-3">
                    <i class="bi bi-plus-circle me-2"></i>Create Event
                </a>
            </div>
        </div>
    @endif
</div>
@endsection

@push('scripts')
<script>
    // Initialize Bootstrap tooltips
    document.addEventListener('DOMContentLoaded', function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    })
</script>
@endpush
