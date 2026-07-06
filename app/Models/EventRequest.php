<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventRequest extends Model
{
    protected $fillable = [
        'form_no',
        'date_issued',

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

        // Section D
        'tables_qty',
        'chairs_qty',
        'projector_qty',
        'microphone_qty',
        'speaker_qty',
        'banner_qty',

        'total_cost',

        'logistics',
        'signatures',

        'status',
        'remarks',
         'ref_no',
    ];

    protected $casts = [
        'department' => 'array',
        'event_type' => 'array',
        'target_audience' => 'array',
        'purpose' => 'array',
        'logistics' => 'array',
        'signatures' => 'array',

        'date_issued' => 'date',
        'request_date' => 'date',
        'proposed_date' => 'date',

        'total_cost' => 'decimal:2',
    ];
}