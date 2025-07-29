<?php

// app/Http/Controllers/EventImportController.php

namespace App\Http\Controllers;

use App\Models\EventReminder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EventImportController extends Controller
{
    public function showImportForm()
    {
        return view('events.import');
    }

    public function import(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt',
        ]);

        $file = fopen($request->file('csv_file'), 'r');
        $header = fgetcsv($file); // First row: column headers

        $rows = [];
        $errors = [];

        while ($row = fgetcsv($file)) {
            $data = array_combine($header, $row);

            $validator = Validator::make($data, [
                'title' => 'required|string',
                'description' => 'nullable|string',
                'date_time' => 'required|date',
                'participants_email' => 'nullable|email',
                'status' => 'required|in:upcoming,completed',
            ]);

            if ($validator->fails()) {
                $errors[] = ['row' => $row, 'errors' => $validator->errors()->all()];
                continue;
            }

            EventReminder::create([
                'title' => $data['title'],
                'description' => $data['description'],
                'date_time' => $data['date_time'],
                'participants_email' => $data['participants_email'],
                'status' => $data['status'],
            ]);
        }

        fclose($file);

        return back()->with('message', 'Import finished')
                     ->with('errorsList', $errors);
    }
}
