@extends('layouts.master')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-header bg-white py-3 border-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h2 class="h5 mb-0">
                            <i class="bi bi-pencil-square me-2"></i>Edit Event Reminder
                        </h2>
                        <a href="{{ route('events.index') }}" class="btn btn-sm btn-outline-secondary">
                            <i class="bi bi-arrow-left me-1"></i> Back
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger mb-4">
                            <h5 class="alert-heading">Please fix these errors:</h5>
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('events.update', $event) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="title" class="form-label fw-semibold">Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" id="title"
                                   value="{{ old('title', $event->title) }}"
                                   class="form-control form-control-lg" required
                                   placeholder="Event title">
                        </div>

                        <div class="mb-4">
                            <label for="description" class="form-label fw-semibold">Description</label>
                            <textarea name="description" id="description"
                                      class="form-control" rows="4"
                                      placeholder="Event description">{{ old('description', $event->description) }}</textarea>
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label for="date_time" class="form-label fw-semibold">Date & Time <span class="text-danger">*</span></label>
                                <input type="datetime-local" name="date_time" id="date_time"
                                       value="{{ old('date_time', \Carbon\Carbon::parse($event->date_time)->format('Y-m-d\TH:i')) }}"
                                       class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label for="status" class="form-label fw-semibold">Status <span class="text-danger">*</span></label>
                                <select name="status" id="status" class="form-select form-control">
                                    <option value="upcoming" {{ old('status', $event->status) == 'upcoming' ? 'selected' : '' }}>Upcoming</option>
                                    <option value="completed" {{ old('status', $event->status) == 'completed' ? 'selected' : '' }}>Completed</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="participants_emails" class="form-label fw-semibold">Participants Emails</label>
                            <div class="input-group">
                                <input type="text" name="participants_email"
                                       class="form-control"
                                       placeholder="email@example.com"
                                       value="{{ old('participants_email', $event->participants_email ?? '') }}"
                                       id="participantsInput">
                            </div>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save me-1"></i> Update Event
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
