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

        'requester_name' => 'required|max:255',
        'department' => 'required|max:255',
        'contact' => 'required|max:255',
        'request_date' => 'required|date',

        'event_title' => 'required|max:255',
        'event_type' => 'required|max:255',

        'proposed_date' => 'nullable|date',
        'start_time' => 'nullable',
        'end_time' => 'nullable',
        'venue' => 'nullable|max:255',
        'participants' => 'nullable|integer',

        'target_audience' => 'nullable|array',
        'purpose' => 'nullable',

        'tables_qty' => 'nullable|integer',
        'chairs_qty' => 'nullable|integer',
        'projector_qty' => 'nullable|integer',
        'microphone_qty' => 'nullable|integer',
        'speaker_qty' => 'nullable|integer',
        'banner_qty' => 'nullable|integer',

        'total_cost' => 'nullable|numeric',

        'logistics' => 'nullable|array',
        'signatures' => 'nullable|array',
        'signatures.*.name' => 'nullable|string|max:255',
        'signatures.*.sig' => 'nullable|string|max:255',
        'signatures.*.date' => 'nullable|date',

        'remarks' => 'nullable',
    ]);

    EventRequest::create($validated);
    $eventRequest = new EventRequest($validated);
    
    // အကယ်၍ signatures ပါလာလျှင် သီးသန့် assign လုပ်ပေးပါ
    if ($request->has('signatures')) {
        $eventRequest->signatures = $request->signatures;
    }

    $eventRequest->save();

    
    return redirect()
        ->route('event-requests.index')
        ->with('success', 'Event Request Created Successfully.');
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
    $validated = $request->validate([
        'form_no' => 'required|unique:event_requests,form_no,' . $eventRequest->id,

        'date_issued' => 'nullable|date',

        'requester_name' => 'required|max:255',
        'department' => 'required|max:255',
        'contact' => 'required|max:255',
        'request_date' => 'required|date',

        'event_title' => 'required|max:255',
        'event_type' => 'required|max:255',

        'proposed_date' => 'nullable|date',
        'start_time' => 'nullable',
        'end_time' => 'nullable',
        'venue' => 'nullable|max:255',
        'participants' => 'nullable|integer',

        'target_audience' => 'nullable|array',
        'purpose' => 'nullable',

        'tables_qty' => 'nullable|integer',
        'chairs_qty' => 'nullable|integer',
        'projector_qty' => 'nullable|integer',
        'microphone_qty' => 'nullable|integer',
        'speaker_qty' => 'nullable|integer',
        'banner_qty' => 'nullable|integer',

        'total_cost' => 'nullable|numeric',

        'logistics' => 'nullable|array',
        'signatures' => 'nullable|array',
        'remarks' => 'nullable',
    ]);

    $eventRequest->update($validated);
    
    // အကယ်၍ signatures ပါလာလျှင် update လုပ်ပေးပါ
    if ($request->has('signatures')) {
        $eventRequest->update([
            'signatures' => $request->signatures
        ]);
    }

    return redirect()
        ->route('event-requests.index')
        ->with('success', 'Event Request Updated Successfully.');
}

    public function destroy(EventRequest $eventRequest)
{
    $eventRequest->delete();

    return redirect()->back()
        ->with('success', 'Deleted Successfully');
}
}