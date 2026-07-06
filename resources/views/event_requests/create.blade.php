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
    Create Event Request Form
</div>

<div class="max-w-6xl mx-auto bg-white p-8 rounded-xl shadow-lg border border-gray-100">
    <form method="POST" action="{{ route('event-requests.store') }}">
        @csrf

        <div class="header-section">
    <!-- အပေါ်ပိုင်း အတန်း -->
    <div class="header-wrapper">
    <div class="school-name">I.A.M INTERNATIONAL SCHOOL</div>
    <div class="form-meta" style="display: flex; gap: 20px; align-items: center;">
        <div>
            <label style="font-weight: bold; margin-right: 5px;">Form No:</label>
            <input type="text" name="form_no" style="width: 100px; padding: 5px;">
        </div>
        <div>
            <label style="font-weight: bold; margin-right: 5px;">Date:</label>
            <input type="date" name="date_issued" style="width: 150px; padding: 5px;">
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
            <tr><td class="label">Name of Requester / Organizer</td><td><input type="text" name="requester_name"></td></tr>
            <tr class="row-highlight"><td class="label">Department / Role</td><td>
                <div class="check-group">
                    <label><input type="checkbox" name="department" value="Teacher"> Teacher</label>
                    <label><input type="checkbox" name="department" value="Marketing"> Marketing</label>
                    <label><input type="checkbox" name="department" value="Admin"> Admin</label>
                    <label><input type="checkbox" name="department" value="Student"> Student Org</label>
                    <label><input type="checkbox" name="department" value="Other"> Other: <input type="text" style="width:100px;"></label>
                </div>
            </td></tr>
            <tr><td class="label">Contact Number / Email</td><td><input type="text" name="contact"></td></tr>
            <tr class="row-highlight"><td class="label">Date of Request</td><td><input type="date" name="request_date"></td></tr>
        </table>

        <!-- Section B -->
        <div class="section-title">SECTION B — EVENT DETAILS</div><br>
        <table>
            <tr><td class="label">Event / Activity Title</td><td><input type="text" name="event_title"></td></tr>
            <tr class="row-highlight"><td class="label">Type of Event</td><td>
                <div class="check-group">
                    <label><input type="checkbox" name="event_type" value="Academic"> Academic</label>
                    <label><input type="checkbox" name="event_type" value="Sports"> Sports</label>
                    <label><input type="checkbox" name="event_type" value="Cultural"> Cultural</label>
                    <label><input type="checkbox" name="event_type" value="Marketing"> Marketing/Promo</label>
                    <label><input type="checkbox" name="event_type" value="Meeting"> Meeting</label>
                    <label><input type="checkbox" name="event_type" value="Other"> Other: <input type="text" style="width:100px;"></label>
                </div>
            </td></tr>
            <tr><td class="label">Proposed Date(s)</td><td><input type="text" name="proposed_date"></td></tr>
            <tr class="row-highlight"><td class="label">Start | End Time</td><td>Start: <input type="time" name="start_time" style="width:100px;"> End: <input type="time" name="end_time" style="width:100px;"></td></tr>
            <tr><td class="label">Venue / Location</td><td><input type="text" name="venue"></td></tr>
            <tr class="row-highlight"><td class="label">Expected Participants</td><td><input type="number" name="participants"></td></tr>
            <tr><td class="label">Target Audience</td><td>
                <div class="check-group">
                    <label><input type="checkbox" name="audience[]" value="Students"> Students</label>
                    <label><input type="checkbox" name="audience[]" value="Staff"> Staff</label>
                    <label><input type="checkbox" name="audience[]" value="Parents"> Parents</label>
                    <label><input type="checkbox" name="audience[]" value="Public"> Public</label>
                    <label><input type="checkbox" name="audience[]" value="Other"> Other: <input type="text" style="width:100px;"></label>
                </div>
            </td></tr>
        </table>
        
      <div class="section-title">SECTION C — PURPOSE / OBJECTIVES</div> <br>
     
<table class="purpose-table">
    <tr><td>&nbsp;</td></tr> <!-- လိုင်း ၁ -->
    <tr><td>&nbsp;</td></tr> <!-- လိုင်း ၂ -->
    <tr><td>&nbsp;</td></tr> <!-- လိုင်း ၃ -->
    
    <tr class="last-row"><td>&nbsp;</td></tr> <!-- လိုင်း ၄ -->
    <tr ><td>&nbsp;</td></tr> <!-- လိုင်း ၅ (အဝါရောင်) -->
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
            <label><input type="checkbox" name="logistics[]" value="sound"> Sound system / microphones</label>
            <label><input type="checkbox" name="logistics[]" value="decor"> Decorations</label>
            <label><input type="checkbox" name="logistics[]" value="tables"> Tables & chairs</label>
            <label><input type="checkbox" name="logistics[]" value="refresh"> Refreshments / catering</label>
            <label><input type="checkbox" name="logistics[]" value="projector"> Projector / screen</label>
            <label><input type="checkbox" name="logistics[]" value="security"> Security / first aid</label>
            <label><input type="checkbox" name="logistics[]" value="marketing"> Marketing materials (posters)</label>
            <label><input type="checkbox" name="logistics[]" value="other"> Other: <input type="text" style="width:150px;"></label>
        </div>

        <!-- Section F: SIGNATURES & APPROVAL -->
<div class="section-title">SECTION F — SIGNATURES & APPROVAL</div><br>

<!-- Note Section -->
<div style="padding: 10px; font-style: italic; border-left: 4px solid #e4ce0c; background: #f9f9f9; margin-bottom: 15px;">
    Note: This event/activity may only proceed after all required approvals are signed.
</div>

@foreach([
    '1. Requester / Organizer', 
    '2. Department Head / Supervisor', 
    '3. Principal / Manager', 
    '4. Finance Officer (if budget required)', 
    '5. Admin Office'
] as $role)
   <div style="display: flex; border: 1px solid #dbd8d8; margin-bottom: 10px;">
    <!-- ဘယ်ဘက်ခြမ်း Role Area -->
    <div style="width: 30%; background: #f8f1fc; padding: 12px; font-weight: bold; color: #1e134d; display: flex; align-items: center; border-right: 1px solid #dbd8d8;">
        {{ $role }}
    </div>
    
    <!-- ညာဘက်ခြမ်း Inputs (အနေတော် Padding နှင့် Height) -->
    <div style="width: 70%; padding: 10px; display: flex; flex-direction: column; gap: 8px; background: white; border-bottom: 2px solid #e4ce0c;">
        <div style="display: flex; align-items: center; height: 25px;">
            <span style="width: 90px; font-size: 14px;">Name (Print):</span>
            <input type="text" style="border: none; border-bottom: 1px solid #000; flex: 1; height: 20px; font-size: 14px; background: transparent; outline: none;">
        </div>
        <div style="display: flex; align-items: center; height: 25px;">
            <span style="width: 90px; font-size: 14px;">Signature:</span>
            <input type="text" style="border: none; border-bottom: 1px solid #000; flex: 1; height: 20px; font-size: 14px; background: transparent; outline: none;">
        </div>
        <div style="display: flex; align-items: center; height: 25px;">
            <span style="width: 90px; font-size: 14px;">Date:</span>
            <input type="text" style="border: none; border-bottom: 1px solid #000; flex: 1; height: 20px; font-size: 14px; background: transparent; outline: none;">
        </div>
    </div>
</div>
@endforeach

        <!-- FOR OFFICE USE ONLY -->
<div style="background: #d8a51a; color: white; padding: 10px; font-weight: bold; margin-top: 10px;">
    FOR OFFICE USE ONLY
</div>
<div style="border: 2px solid #4B0082; padding: 15px; background: #fff;">
    <!-- Approved / Disapproved Section -->
    <div style="margin-bottom: 15px; display: flex; gap: 20px;">
        <label><input type="checkbox" name="status" value="approved"> Approved</label>
        <label><input type="checkbox" name="status" value="disapproved"> Disapproved</label>
    </div>
    
    <!-- Reference No. Section -->
    <div style="margin-bottom: 15px; display: flex; align-items: center;">
        <span style="margin-right: 10px; font-weight: bold;">Reference No.:</span>
        <input type="text" name="ref_no" style="border: none; border-bottom: 1px solid #000; flex: 1;">
    </div>
    
    <!-- Remarks Section -->
    <div style="display: flex; align-items: center;">
        <span style="margin-right: 10px; font-weight: bold;">Remarks:</span>
        <input type="text" name="remarks" style="border: none; border-bottom: 1px solid #000; flex: 1;">
    </div>
</div>

        <button type="submit" style="margin-top:20px; background:#4B0082; color:white; padding:10px 40px; cursor:pointer;">SUBMIT</button>
    </form>
</div>

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