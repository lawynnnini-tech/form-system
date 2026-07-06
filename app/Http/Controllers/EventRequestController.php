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
    $validated = $request->validate([
        'form_no' => 'required|unique:event_requests',
        'date_issued' => 'nullable|date',

        'requester_name' => 'required|string',
        'department' => 'nullable|array',
        'contact' => 'required|string',
        'request_date' => 'required|date',

        'event_title' => 'required|string',
        'event_type' => 'nullable|array',

        'proposed_date' => 'nullable|date',
        'start_time' => 'nullable',
        'end_time' => 'nullable',
        'venue' => 'nullable|string',
        'participants' => 'nullable|integer',

        'target_audience' => 'nullable|array',
        'purpose' => 'nullable|array',

        'tables_qty' => 'nullable|integer',
        'chairs_qty' => 'nullable|integer',
        'projector_qty' => 'nullable|integer',
        'microphone_qty' => 'nullable|integer',
        'speaker_qty' => 'nullable|integer',
        'banner_qty' => 'nullable|integer',

        'total_cost' => 'nullable|numeric',

        'logistics' => 'nullable|array',
        'signatures' => 'nullable|array',

        'status' => 'nullable|in:Approved,Rejected',
        'remarks' => 'nullable',
    ]);

    $validated['department'] = $request->department ?? [];
    $validated['event_type'] = $request->event_type ?? [];
    $validated['target_audience'] = $request->target_audience ?? [];
    $validated['purpose'] = $request->purpose ?? [];
    $validated['logistics'] = $request->logistics ?? [];
    $validated['signatures'] = $request->signatures ?? [];
    $validated['ref_no'] = $request->ref_no;

    EventRequest::create($validated);

    return redirect()->route('event-requests.index')
        ->with('success', 'Event Request Created Successfully');
}

// ================= EDIT =================
public function edit(EventRequest $eventRequest)
{
    
    return view('event_requests.edit', compact('eventRequest'));
}
public function update(Request $request, EventRequest $eventRequest)
{
    $validated = $request->validate([
        'form_no' => 'required|unique:event_requests,form_no,' . $eventRequest->id,
        'date_issued' => 'nullable|date',

        'requester_name' => 'required|string',
        'department' => 'nullable|array',
        'contact' => 'required|string',
        'request_date' => 'required|date',

        'event_title' => 'required|string',
        'event_type' => 'nullable|array',

        'proposed_date' => 'nullable|date',
        'start_time' => 'nullable',
        'end_time' => 'nullable',
        'venue' => 'nullable|string',
        'participants' => 'nullable|integer',

        'target_audience' => 'nullable|array',
        'purpose' => 'nullable|array',

        'tables_qty' => 'nullable|integer',
        'chairs_qty' => 'nullable|integer',
        'projector_qty' => 'nullable|integer',
        'microphone_qty' => 'nullable|integer',
        'speaker_qty' => 'nullable|integer',
        'banner_qty' => 'nullable|integer',

        'total_cost' => 'nullable|numeric',

        'logistics' => 'nullable|array',
        'signatures' => 'nullable|array',

        'status' => 'nullable|in:Approved,Rejected',
        'remarks' => 'nullable',
    ]);

    $validated['department'] = $request->department ?? [];
    $validated['event_type'] = $request->event_type ?? [];
    $validated['target_audience'] = $request->target_audience ?? [];
    $validated['purpose'] = $request->purpose ?? [];
    $validated['logistics'] = $request->logistics ?? [];
    $validated['signatures'] = $request->signatures ?? [];
    $validated['ref_no'] = $request->ref_no;
    $validated['request_date'] = $request->request_date;
$validated['proposed_date'] = $request->proposed_date;

    $eventRequest->update($validated);

    return redirect()->route('event-requests.index')
        ->with('success', 'Event Request Updated Successfully');
}

    // ================= SHOW =================
    public function show(EventRequest $eventRequest)
    {
        return view('event_requests.show', compact('eventRequest'));
    }

    // ================= DELETE =================
    public function destroy(EventRequest $eventRequest)
    {
        $eventRequest->delete();

        return back()->with('success', 'Deleted Successfully');
    }

    
}