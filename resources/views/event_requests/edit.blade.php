@extends('layouts.app')

@section('title', 'Event Activity Request Form')

@section('content')
<style>
    /* အခြေခံအချက်အလက်များ */
    body { background: #f3f4f6; font-family: Arial, sans-serif; padding: 20px; }
    .form-container { width: 100%; max-width: 1200px; margin: 0 auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); }

    /* Header & Title Design */
    .header-wrapper { display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px; }
    .school-name { font-size: 20px; font-weight: bold; color: #4B0082; }
    .form-meta { display: flex; gap: 15px; }
    .gold-line { border-top: 2px solid #e4ce0c; margin: 15px 0; }
    .main-title { font-size: 24px; font-weight: bold; color: #4B0082; text-align: center; }
    .sub-title { font-style: italic; color: #555; text-align: center; margin-bottom: 10px; }

    /* Sections */
    .section-title { 
        background: transparent;    /* နောက်ခံအရောင်မရှိစေရန် */
        color: #4B0082;             /* စာသားအရောင်ကို Light Purple သို့ ပြောင်းခြင်း */
        padding: 10px 0;            /* အပေါ်အောက် နေရာအနည်းငယ်ချန်ခြင်း */
        font-weight: bold; 
        margin-top: 20px; 
        text-transform: uppercase;
        border-bottom: 2px solid #9370DB; /* အောက်ခြေတွင် လိုင်းလေးတစ်ခုခံပေးခြင်းဖြင့် ပိုလှစေရန် */
    }

    /* Table & Inputs */
  .label {
        width: 350px; /* ဤနေရာတွင် width ကို တိုးမြှင့်ပါ (ဥပမာ- 350px) */
        padding: 10px;
        background-color: #f8f1fc; 
        color: #4B0082;            
        font-weight: bold;
        border: 1px solid #dbd8d8; 
        vertical-align: top;
    }

    /* ကျန်ရှိသော CSS များမှာ မူလအတိုင်းဖြစ်သည် */
    table {
        width: 100%;
        border-collapse: collapse;
        border: 1px solid #dbd8d8;
    }
    td {
        padding: 10px;
        border: 1px solid #c0c0c0;
    }

    .row-highlight {
        background-color: #f5f5c4; /* Light Beige/Yellow အရောင် */
    }

   input[type="text"], 
    input[type="date"], 
    input[type="time"], 
    input[type="number"] {
        border: none;                  /* အကွက်ဘောင်ကို ဖျောက်ခြင်း */
        border-bottom: 1px solid #000; /* အောက်ခြေလိုင်းတစ်ခုတည်းကိုသာ ထားရှိခြင်း */
        width: 100%;                   /* အကွက်အပြည့် ဖြန့်ထားခြင်း */
        background: transparent;       /* နောက်ခံအရောင်မရှိစေရန် */
        outline: none;                 /* ကလစ်နှိပ်သည့်အခါ ပေါ်လာသည့် ဘောင်ကို ပိတ်ခြင်း */
    }

    /* Checkbox အောက်က Other input အတွက် အထူးပြင်ဆင်ချက် */
    .check-group input[type="text"] {
        width: 100px;                  /* Other အတွက် အကျယ်ကို ကန့်သတ်ခြင်း */
        display: inline-block;
    }
    /* Section C Purpose Specifics */
.purpose-table {
        width: 100%;
        border-collapse: collapse;
        border: 3px solid #b3a9dd; /* အပြင်ဘောင် */
        background-color: #fff;
    }

    .purpose-table td {
        height: 50px;              
        /* လိုင်းအရောင်ကို ပိုမိုဖျော့သော မီးခိုးရောင်ဖြင့် ပြောင်းလဲထားသည် */
        border-bottom: 1px solid #d3d3d3; 
        padding: 0;
    }

    .purpose-table .last-row td {
       /* နောက်ဆုံးလိုင်း အဝါရောင် */
        border-bottom: 1px solid #e4ce0c;       
    }

   
    .resources-table {
        width: 100%;
        border-collapse: collapse;
        border: 1px solid #dbd8d8;
    }

    .resources-table th {
        background-color: #7d1cc2;
        color: white;
        padding: 20px;
        border: 1px solid #dbd8d8;;
    }

    .resources-table td {
        border: 1px solid #dbd8d8;;
        height: 50px;
        padding: 5px;
        background-color: #ffffff; /* ပုံမှန်အကွက်များ အဖြူရောင် */
    }

   .resources-table tbody tr:nth-child(even):not(.total-row) td {
        background-color: #f5f5c4; /* Light Yellow color */
    }

    /* Total Row အတွက် အရောင်သတ်မှတ်ချက် */
    .resources-table tbody tr.total-row td {
        background-color: #f8f1fc !important;
        font-weight: bold;
        text-align: right;
    }
</style>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div style="font-family: 'Arial', sans-serif; font-size: 30px; font-weight: 600; color: #2d1b69; border-left: 4px solid #e4ce0c; padding-left: 10px; margin-bottom: 15px;">
    Edit Event Request Form
</div>

<div class="max-w-6xl mx-auto bg-white p-8 rounded-xl shadow-lg border border-gray-100">
    <form method="POST" action="{{ route('event-requests.update', $eventRequest->id) }}">
    @csrf
    @method('PUT')

        <div class="header-section">
    <!-- အပေါ်ပိုင်း အတန်း -->
    <div class="header-wrapper">
    <div class="school-name">I.A.M INTERNATIONAL SCHOOL</div>
    <div class="form-meta" style="display: flex; gap: 20px; align-items: center;">
        <div>
            <label style="font-weight: bold; margin-right: 5px;">Form No:</label>
            <!-- form_no အတွက် value ထည့်ခြင်း -->
            <input type="text" name="form_no" value="{{ old('form_no', $eventRequest->form_no) }}" style="width: 100px; padding: 5px;">
        </div>
        <div>
            <label style="font-weight: bold; margin-right: 5px;">Date:</label>
            <!-- date_issued အတွက် value ထည့်ခြင်း -->
            <input type="date" name="date_issued" value="{{ old('date_issued', $eventRequest->date_issued) }}" style="width: 150px; padding: 5px;">
        </div>
    </div>
</div>
    
    <!-- ရွှေရောင်လိုင်း -->
    <div class="gold-line"></div>
    
    <!-- ခေါင်းစဉ်များ -->
    <div class="main-title">EVENT / ACTIVITY REQUEST FORM</div>
    <div class="sub-title">Request to Organize or Conduct an Event / Activity</div>
    
    <!-- ရွှေရောင်လိုင်း -->
    <div class="gold-line"></div>
</div>

       <!-- Section A -->
<div class="section-title">SECTION A — REQUESTER INFORMATION</div><br>
<table>
    <tr>
        <td class="label">Name of Requester / Organizer</td>
        <td><input type="text" name="requester_name" value="{{ old('requester_name', $eventRequest->requester_name) }}"></td>
    </tr>
    <tr class="row-highlight">
        <td class="label">Department / Role</td>
        <td>
            <div class="check-group">
              <label><input type="checkbox" name="department[]" value="Teacher" {{ in_array('Teacher', old('department', (array)($eventRequest->department ?? []))) ? 'checked' : '' }}> Teacher</label>
<label><input type="checkbox" name="department[]" value="Marketing" {{ in_array('Marketing', old('department', (array)($eventRequest->department ?? []))) ? 'checked' : '' }}> Marketing</label>
<label><input type="checkbox" name="department[]" value="Admin" {{ in_array('Admin', old('department', (array)($eventRequest->department ?? []))) ? 'checked' : '' }}> Admin</label>
<label><input type="checkbox" name="department[]" value="Student" {{ in_array('Student', old('department', (array)($eventRequest->department ?? []))) ? 'checked' : '' }}> Student Org</label>
            </div>
        </td>
    </tr>
    <tr>
        <td class="label">Contact Number / Email</td>
        <td><input type="text" name="contact" value="{{ old('contact', $eventRequest->contact) }}"></td>
    </tr>
    <tr class="row-highlight">
        <td class="label">Date of Request</td>
        <td><input type="date" name="request_date" value="{{ old('request_date', $eventRequest->request_date) }}"></td>
    </tr>
</table>

        <!-- Section B -->
<div class="section-title">SECTION B — EVENT DETAILS</div><br>
<table>
    <tr><td class="label">Event / Activity Title</td><td><input type="text" name="event_title" value="{{ old('event_title', $eventRequest->event_title) }}"></td></tr>
    
    <tr class="row-highlight"><td class="label">Type of Event</td><td>
        <div class="check-group">
            <label><input type="checkbox" name="event_type[]" value="Academic" {{ in_array('Academic', old('event_type', (array)($eventRequest->event_type ?? []))) ? 'checked' : '' }}> Academic</label>
<label><input type="checkbox" name="event_type[]" value="Sports" {{ in_array('event_type', old('event_type', (array)($eventRequest->event_type ?? []))) ? 'checked' : '' }}> Sports</label>
<label><input type="checkbox" name="event_type[]" value="Cultural" {{ in_array('event_type', old('event_type', (array)($eventRequest->event_type ?? []))) ? 'checked' : '' }}> Cultural</label>
<label><input type="checkbox" name="event_type[]" value="Meeting" {{ in_array('Meeting', old('event_type', (array)($eventRequest->event_type ?? []))) ? 'checked' : '' }}> Meeting</label>
        </div>
    </td></tr>
    
    <tr><td class="label">Proposed Date(s)</td><td><input type="text" name="proposed_date" value="{{ old('proposed_date', $eventRequest->proposed_date) }}"></td></tr>
    
    <tr class="row-highlight"><td class="label">Start | End Time</td>
        <td>
            Start: <input type="time" name="start_time" value="{{ old('start_time', $eventRequest->start_time) }}" style="width:100px;"> 
            End: <input type="time" name="end_time" value="{{ old('end_time', $eventRequest->end_time) }}" style="width:100px;">
        </td>
    </tr>
    
    <tr><td class="label">Venue / Location</td><td><input type="text" name="venue" value="{{ old('venue', $eventRequest->venue) }}"></td></tr>
    
    <tr class="row-highlight"><td class="label">Expected Participants</td><td><input type="number" name="participants" value="{{ old('participants', $eventRequest->participants) }}"></td></tr>
    
    <tr><td class="label">Target Audience</td><td>
        <div class="check-group">
            <label><input type="checkbox" name="audience[]" value="Students" {{ in_array('Students', old('audience', (array)($eventRequest->target_audience ?? []))) ? 'checked' : '' }}> Students</label>
<label><input type="checkbox" name="audience[]" value="Staff" {{ in_array('Staff', old('audience', (array)($eventRequest->target_audience ?? []))) ? 'checked' : '' }}> Staff</label>
<label><input type="checkbox" name="audience[]" value="Parents" {{ in_array('Parents', old('audience', (array)($eventRequest->target_audience ?? []))) ? 'checked' : '' }}> Parents</label>
<label><input type="checkbox" name="audience[]" value="Public" {{ in_array('Public', old('audience', (array)($eventRequest->target_audience ?? []))) ? 'checked' : '' }}> Public</label>
        </div>
    </td></tr>
</table>
        
      <div class="section-title">SECTION C — PURPOSE / OBJECTIVES</div> <br>
<table class="purpose-table">
    <tr><td><textarea name="purpose_1" style="width:100%; border:none; height:100%;">{{ old('purpose_1', $eventRequest->purpose_1 ?? '') }}</textarea></td></tr>
    <tr><td><textarea name="purpose_2" style="width:100%; border:none; height:100%;">{{ old('purpose_2', $eventRequest->purpose_2 ?? '') }}</textarea></td></tr>
    <tr><td><textarea name="purpose_3" style="width:100%; border:none; height:100%;">{{ old('purpose_3', $eventRequest->purpose_3 ?? '') }}</textarea></td></tr>
    
    <tr class="last-row"><td><textarea name="purpose_4" style="width:100%; border:none; height:100%;">{{ old('purpose_4', $eventRequest->purpose_4 ?? '') }}</textarea></td></tr>
    <tr><td><textarea name="purpose_5" style="width:100%; border:none; height:100%;">{{ old('purpose_5', $eventRequest->purpose_5 ?? '') }}</textarea></td></tr>
</table>
       <!-- Section D -->
        <div class="section-title">SECTION D — RESOURCES NEEDED</div><br>
        <table class="resources-table">
    <thead>
        <tr>
            <th>Item / Resource</th>
            <th>Quantity</th>
            <th>Source (In-house / External)</th>
            <th>Estimated Cost</th>
        </tr>
    </thead>
    <tbody>
        <tr><td>AAA</td><td>10</td><td>Bb</td><td>10</td></tr>
        <tr><td></td><td></td><td></td><td></td></tr>
        <tr><td></td><td></td><td></td><td></td></tr>
        <tr><td></td><td></td><td></td><td></td></tr>
       <tr class="total-row">
    <td colspan="3" style="text-align: right; font-weight: bold; color: #4B0082;">TOTAL ESTIMATED COST</td>
    <td>&nbsp;</td>
</tr>
    </tbody>
</table>

       <!-- Section E -->
<div class="section-title">SECTION E — LOGISTICS & SUPPORT REQUIRED</div> <br>
<div style="padding:15px; border:0px solid #ccc; display:grid; grid-template-columns: 1fr 1fr; gap:10px;">
    <!-- Checkbox တိုင်းတွင် in_array ကို သုံးပြီး checked ဖြစ်မဖြစ် စစ်ဆေးပါ -->
    <label><input type="checkbox" name="logistics[]" value="sound" {{ in_array('sound', old('logistics', $eventRequest->logistics ?? [])) ? 'checked' : '' }}> Sound system / microphones</label>
    <label><input type="checkbox" name="logistics[]" value="decor" {{ in_array('decor', old('logistics', $eventRequest->logistics ?? [])) ? 'checked' : '' }}> Decorations</label>
    <label><input type="checkbox" name="logistics[]" value="tables" {{ in_array('tables', old('logistics', $eventRequest->logistics ?? [])) ? 'checked' : '' }}> Tables & chairs</label>
    <label><input type="checkbox" name="logistics[]" value="refresh" {{ in_array('refresh', old('logistics', $eventRequest->logistics ?? [])) ? 'checked' : '' }}> Refreshments / catering</label>
    <label><input type="checkbox" name="logistics[]" value="projector" {{ in_array('projector', old('logistics', $eventRequest->logistics ?? [])) ? 'checked' : '' }}> Projector / screen</label>
    <label><input type="checkbox" name="logistics[]" value="security" {{ in_array('security', old('logistics', $eventRequest->logistics ?? [])) ? 'checked' : '' }}> Security / first aid</label>
    <label><input type="checkbox" name="logistics[]" value="marketing" {{ in_array('marketing', old('logistics', $eventRequest->logistics ?? [])) ? 'checked' : '' }}> Marketing materials (posters)</label>
    <label>
        <input type="checkbox" name="logistics[]" value="other" {{ in_array('other', old('logistics', $eventRequest->logistics ?? [])) ? 'checked' : '' }}> Other: 
        <input type="text" name="logistics_other" value="{{ old('logistics_other', $eventRequest->logistics_other ?? '') }}" style="width:150px;">
    </label>
</div>

       <!-- Section F: SIGNATURES & APPROVAL -->
<div class="section-title">SECTION F — SIGNATURES & APPROVAL</div><br>

@foreach([
    'requester' => '1. Requester / Organizer', 
    'dept_head' => '2. Department Head / Supervisor', 
    'principal' => '3. Principal / Manager', 
    'finance' => '4. Finance Officer (if budget required)', 
    'admin' => '5. Admin Office'
] as $key => $role)
   <div style="display: flex; border: 1px solid #dbd8d8; margin-bottom: 10px;">
    <!-- Role Area -->
    <div style="width: 30%; background: #f8f1fc; padding: 12px; font-weight: bold; color: #1e134d; border-right: 1px solid #dbd8d8;">
        {{ $role }}
    </div>
    
    <!-- Inputs -->
    <div style="width: 70%; padding: 10px; display: flex; flex-direction: column; gap: 8px; background: white; border-bottom: 2px solid #e4ce0c;">
        <div style="display: flex; align-items: center; height: 25px;">
            <span style="width: 90px; font-size: 14px;">Name (Print):</span>
            <input type="text" name="signatures[{{$key}}][name]" 
                   value="{{ old('signatures.'.$key.'.name', $eventRequest->signatures[$key]['name'] ?? '') }}" 
                   style="border: none; border-bottom: 1px solid #000; flex: 1;">
        </div>
        <div style="display: flex; align-items: center; height: 25px;">
            <span style="width: 90px; font-size: 14px;">Signature:</span>
            <input type="text" name="signatures[{{$key}}][sig]" 
                   value="{{ old('signatures.'.$key.'.sig', $eventRequest->signatures[$key]['sig'] ?? '') }}" 
                   style="border: none; border-bottom: 1px solid #000; flex: 1;">
        </div>
        <div style="display: flex; align-items: center; height: 25px;">
            <span style="width: 90px; font-size: 14px;">Date:</span>
            <input type="date" name="signatures[{{$key}}][date]" 
                   value="{{ old('signatures.'.$key.'.date', $eventRequest->signatures[$key]['date'] ?? '') }}" 
                   style="border: none; border-bottom: 1px solid #000; flex: 1;">
        </div>
    </div>
</div>
@endforeach
       <!-- FOR OFFICE USE ONLY -->
<div style="background: #d8a51a; color: white; padding: 10px; font-weight: bold; margin-top: 10px;">
    FOR OFFICE USE ONLY
</div>
<div style="border: 2px solid #4B0082; padding: 15px; background: #fff;">
    <!-- Approved / Disapproved Section (Radio Button သို့မဟုတ် Checkbox အဖြစ် အသုံးပြုနိုင်သည်) -->
    <div style="margin-bottom: 15px; display: flex; gap: 20px;">
        <label>
            <input type="radio" name="status" value="approved" {{ old('status', $eventRequest->status) == 'approved' ? 'checked' : '' }}> Approved
        </label>
        <label>
            <input type="radio" name="status" value="disapproved" {{ old('status', $eventRequest->status) == 'disapproved' ? 'checked' : '' }}> Disapproved
        </label>
    </div>
    
    <!-- Reference No. Section -->
    <div style="margin-bottom: 15px; display: flex; align-items: center;">
        <span style="margin-right: 10px; font-weight: bold;">Reference No.:</span>
        <input type="text" name="ref_no" value="{{ old('ref_no', $eventRequest->ref_no) }}" style="border: none; border-bottom: 1px solid #000; flex: 1;">
    </div>
    
    <!-- Remarks Section -->
    <div style="display: flex; align-items: center;">
        <span style="margin-right: 10px; font-weight: bold;">Remarks:</span>
        <input type="text" name="remarks" value="{{ old('remarks', $eventRequest->remarks) }}" style="border: none; border-bottom: 1px solid #000; flex: 1;">
    </div>
</div>

<!-- Submit Button -->
<button type="submit" style="margin-top:20px; background:#4B0082; color:white; padding:10px 40px; cursor:pointer;">UPDATE</button>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@endsection