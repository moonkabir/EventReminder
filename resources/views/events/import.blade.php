@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">📥 Import Events from CSV</h2>

    {{-- Success message --}}
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    {{-- Errors --}}
    @if (session('errorsList'))
        <div class="alert alert-danger">
            <h5>🚫 Some rows failed to import:</h5>
            <ul class="mb-0">
                @foreach (session('errorsList') as $error)
                    <li class="mb-2">
                        <strong>Row:</strong> {{ implode(', ', $error['row']) }}<br>
                        <strong>Errors:</strong>
                        <ul>
                            @foreach ($error['errors'] as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Upload form --}}
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <form method="POST" action="{{ route('events.import') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="csv_file" class="form-label">Select CSV File</label>
                    <input type="file" name="csv_file" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">🚀 Import CSV</button>
            </form>
        </div>
    </div>

    {{-- Table preview --}}
    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="card-title">📋 Expected CSV Columns</h5>
            <table class="table table-bordered table-striped mt-3">
                <thead class="table-light">
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Date & Time</th>
                        <th>Status</th>
                        <th>Participants Email</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Meeting</td>
                        <td>Discuss project</td>
                        <td>2025-08-01 14:00</td>
                        <td>upcoming</td>
                        <td>john@example.com</td>
                    </tr>
                    <tr>
                        <td>Review</td>
                        <td>Weekly summary</td>
                        <td>2025-08-03 11:00</td>
                        <td>completed</td>
                        <td>jane@example.com</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
