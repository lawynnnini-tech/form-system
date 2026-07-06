<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventRequest extends Model
{
    protected $fillable = [
        'form_no',
        'date_issued',
        'signatures',
        'requester_name',
        'department',
        'contact',
        'request_date',

        'event_title',
        'event_type',
        'proposed_date',
        'start_time',
        'end_time',
        'venue',
        'participants',
        'target_audience',

        'purpose',

        'tables_qty',
        'chairs_qty',
        'projector_qty',
        'microphone_qty',
        'speaker_qty',
        'banner_qty',

        'total_cost',

        'logistics',

        'status',
        'remarks',
    ];

    protected $casts = [
        'target_audience' => 'array',
        'logistics' => 'array',
        'request_date' => 'date',
        'signatures'      => 'array',
        'proposed_date' => 'date',
    ];
}