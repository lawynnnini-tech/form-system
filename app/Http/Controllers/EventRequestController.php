<?php

// app/Http/Controllers/EventRequestController.php

namespace App\Http\Controllers;

use App\Models\EventRequest;
use Illuminate\Http\Request;

class EventRequestController extends Controller
{
    public function index()
    {
        $data = EventRequest::latest()->get();
        return view('event_requests.index', compact('data'));
    }

    public function create()
    {
        return view('event_requests.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'requester_name' => 'required',
        'department' => 'required',
        'contact' => 'required',
        'request_date' => 'required',
        'event_title' => 'required',
    ]);

    EventRequest::create([
        'requester_name' => $request->requester_name,
        'department' => $request->department,
        'contact' => $request->contact,
        'request_date' => $request->request_date,

        'event_title' => $request->event_title,
        'event_type' => $request->event_type,
        'proposed_date' => $request->proposed_date,
        'start_time' => $request->start_time,
        'end_time' => $request->end_time,
        'venue' => $request->venue,
        'participants' => $request->participants,
        'target_audience' => $request->target_audience,

        'purpose' => $request->purpose,

        'tables_qty' => $request->tables_qty,
        'chairs_qty' => $request->chairs_qty,
        'projector_qty' => $request->projector_qty,
        'microphone_qty' => $request->microphone_qty,
        'speaker_qty' => $request->speaker_qty,
        'banner_qty' => $request->banner_qty,

        'logistics' => $request->logistics ?? [],

        'remarks' => $request->remarks,
    ]);

    return redirect()->route('event-requests.index')
        ->with('success', 'Created Successfully');
}

    public function show(EventRequest $eventRequest)
    {
        return view('event_requests.show', compact('eventRequest'));
    }

    public function edit(EventRequest $eventRequest)
    {
        return view('event_requests.edit', compact('eventRequest'));
    }

    public function update(Request $request, EventRequest $eventRequest)
{
    $eventRequest->update([
        'requester_name' => $request->requester_name,
        'department' => $request->department,
        'contact' => $request->contact,
        'request_date' => $request->request_date,

        'event_title' => $request->event_title,
        'event_type' => $request->event_type,
        'proposed_date' => $request->proposed_date,
        'start_time' => $request->start_time,
        'end_time' => $request->end_time,
        'venue' => $request->venue,
        'participants' => $request->participants,
        'target_audience' => $request->target_audience,

        'purpose' => $request->purpose,

        'tables_qty' => $request->tables_qty,
        'chairs_qty' => $request->chairs_qty,
        'projector_qty' => $request->projector_qty,
        'microphone_qty' => $request->microphone_qty,
        'speaker_qty' => $request->speaker_qty,
        'banner_qty' => $request->banner_qty,

        'logistics' => $request->logistics ?? [],

        'remarks' => $request->remarks,
    ]);

    return redirect()->route('event-requests.index')
        ->with('success', 'Updated Successfully');
}

    public function destroy(EventRequest $eventRequest)
{
    $eventRequest->delete();

    return redirect()->back()
        ->with('success', 'Deleted Successfully');
}
}