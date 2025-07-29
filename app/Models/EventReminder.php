<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventReminder extends Model
{
    protected $fillable = [
        'event_id',
        'title',
        'description',
        'date_time',
        'status',
        'participants_email', // <-- not "participants_emails"
    ];

    protected $casts = [
        'date_time' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $latestId = self::max('id') + 1;
            $prefix = 'EVT-' . now()->format('Ymd') . '-' . str_pad($latestId, 4, '0', STR_PAD_LEFT);
            $model->event_id = $prefix;
        });
    }
}
