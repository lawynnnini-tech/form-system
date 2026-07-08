@extends('layouts.app')

@section('title', 'Material Request Form')

@section('content')
<style>

    body { background: #f3f4f6; font-family: Arial, sans-serif; padding: 20px; }
    .form-container { width: 100%; max-width: 1200px; margin: 0 auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); }


    .header-wrapper { display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px; }
    .school-name { font-size: 20px; font-weight: bold; color: #4B0082; }
    .form-meta { display: flex; gap: 15px; }
    .gold-line { border-top: 2px solid #e4ce0c; margin: 15px 0; }
    .main-title { font-size: 24px; font-weight: bold; color: #4B0082; text-align: center; }
    .sub-title { font-style: italic; color: #555; text-align: center; margin-bottom: 10px; }

    
    .section-title { 
        background: transparent;    
        color: #4B0082;             
        padding: 10px 0;        
        font-weight: bold; 
        margin-top: 20px; 
        text-transform: uppercase;
        border-bottom: 2px solid #9370DB;
    }

    
  .label {
        width: 350px; 
        padding: 10px;
        background-color: #f8f1fc; 
        color: #4B0082;            
        font-weight: bold;
        border: 1px solid #dbd8d8; 
        vertical-align: top;
    }

    
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
        background-color: #f5f5c4; 
    }

   input[type="text"], 
    input[type="date"], 
    input[type="time"], 
    input[type="number"] {
        border: none;                  
        border-bottom: 1px solid #000; 
        width: 100%;                   
        background: transparent;       
        outline: none;                 
    }


    .check-group input[type="text"] {
        width: 100px;                  
        display: inline-block;
    }
    
.purpose-table {
        width:100%;
        border-collapse: collapse;
        border: 3px solid #b3a9dd; 
        background-color: #fff;
    }

    .purpose-table td {
                     
        
        border-bottom: 1px solid #d3d3d3; 
        height: 50px;
        padding: 0;
    }

    .purpose-table .last-row td {
    
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
        background-color: #ffffff; 
    }

   .resources-table tbody tr:nth-child(even):not(.total-row) td {
        background-color: #f5f5c4; 
    }

    
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
    Material Request Form
</div>

<div class="max-w-6xl mx-auto bg-white p-8 rounded-xl shadow-lg border border-gray-100">
    <form method="POST" action="{{ route('material-requests.store') }}">
    @csrf
    

        <div class="header-section">
    
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
    
    
    <div class="gold-line"></div>
    
    
    <div class="main-title">MATERIAL REQUEST FORM</div>
    <div class="sub-title">For Teachers . Marketing . Administrative Staff</div>
    
    
    <div class="gold-line"></div>
</div>

        
        <div class="section-title">SECTION A — REQUESTER INFORMATION</div><br>
        <table>
            <tr><td class="label">Full Name of Requester</td><td><input type="text" name="requester_name"></td></tr>
            <tr class="row-highlight"><td class="label">Department / Role</td><td>
                <div class="check-group">
                    <label><input type="checkbox" name="department[]" value="Teacher"> Teacher</label>
                    <label><input type="checkbox" name="department[]" value="Marketing"> Marketing</label>
                    <label><input type="checkbox" name="department[]" value="Admin"> Admin</label>
                    <label><input type="checkbox" name="department[]" value="Other"> Other: <input type="text" name="department_other" style="width:100px;"></label>
                </div>
            </td></tr>
            <tr><td class="label">Employee ID</td><td><input type="text" name="employee_id"></td></tr>
            <tr><td class="label">Contact Number / Email</td><td><input type="text" name="contact"></td></tr>
            <tr class="row-highlight"><td class="label">Date of Request</td><td><input type="date" name="request_date"></td></tr>
            <tr class="row-highlight"><td class="label">Date Needed By</td><td><input type="date" name="need_date"></td></tr>
        </table>



<div class="section-title">SECTION B — MATERIAL DETAILS</div><br>
    <table class="resources-table">
    <thead>
        <tr>
            <th style="width: 50px;">No.</th> <th>Item Description</th>
            <th>Quantity</th>
            <th>Unit</th>
            <th>Remarks</th>
        </tr>
    </thead>
    <tbody>
        @for($i=0; $i<4; $i++)
        <tr>
            <td style="text-align: center;">{{ $i + 1 }}</td> <td><input type="text" name="items[{{$i}}][desc]"></td>
            <td><input type="number" name="items[{{$i}}][qty]"></td>
            <td><input type="text" name="items[{{$i}}][unit]"></td>
            <td><input type="text" name="items[{{$i}}][remarks]"></td>
        </tr>
        @endfor
    </tbody>
</table>

        
     <div class="section-title">SECTION C — PURPOSE / JUSTIFICATION</div><br>

<table class="purpose-table">
    <tr>
        <td>
            <textarea name="purpose[]" style="width:100%; border:none; resize:none;">{{ old('purpose.0') }}</textarea>
        </td>
    </tr>

    <tr>
        <td>
            <textarea name="purpose[]" style="width:100%; border:none; resize:none;">{{ old('purpose.1') }}</textarea>
        </td>
    </tr>

    <tr>
        <td>
            <textarea name="purpose[]" style="width:100%; border:none; resize:none;">{{ old('purpose.2') }}</textarea>
        </td>
    </tr>

    <tr class="last-row">
        <td>
            <textarea name="purpose[]" style="width:100%; border:none; resize:none;">{{ old('purpose.3') }}</textarea>
        </td>
    </tr>

    <tr>
        <td>
            <textarea name="purpose[]" style="width:100%; border:none; resize:none;">{{ old('purpose.4') }}</textarea>
        </td>
    </tr>
</table>
       
<div class="section-title">SECTION D — SIGNATURES & APPROVAL WORKFLOW</div><br>


<div style="padding: 10px; font-style: italic; border-left: 4px solid #e4ce0c; background: #f9f9f9; margin-bottom: 15px;">
    Note: Materials will only be released by the Storage Admin once ALL required signatures below are complete.No materials will be issued without the full approval chain.
</div>

@foreach([
    '1. Requester ', 
    '2. Department Head / Supervisor', 
    '3. Principal / Manager', 
    '4. Storage Admin', 
    '5. Receiver Acknowledgement'
] as $index => $role)
   <div style="display: flex; border: 1px solid #dbd8d8; margin-bottom: 10px;">

    <div style="width: 30%; background: #f8f1fc; padding: 12px; font-weight: bold; color: #1e134d; display: flex; align-items: center; border-right: 1px solid #dbd8d8;">
        {{ $role }}
    </div>
    
    
    <div style="width: 70%; padding: 10px; display: flex; flex-direction: column; gap: 8px; background: white; border-bottom: 2px solid #e4ce0c;">
        <div style="display: flex; align-items: center; height: 25px;">
            <span style="width: 90px; font-size: 14px;">Name (Print):</span>
            <input type="text" name="signatures[{{ $index }}][name]" style="border: none; border-bottom: 1px solid #000; flex: 1; height: 20px; font-size: 14px; background: transparent; outline: none;">
        </div>
        <div style="display: flex; align-items: center; height: 25px;">
            <span style="width: 90px; font-size: 14px;">Signature:</span>
            <input type="text" name="signatures[{{ $index }}][signature]" style="border: none; border-bottom: 1px solid #000; flex: 1; height: 20px; font-size: 14px; background: transparent; outline: none;">
        </div>
        <div style="display: flex; align-items: center; height: 25px;">
            <span style="width: 90px; font-size: 14px;">Date:</span>
            <input type="date" name="signatures[{{ $index }}][date]" style="border: none; border-bottom: 1px solid #000; flex: 1; height: 20px; font-size: 14px; background: transparent; outline: none;">
        </div>
    </div>
</div>
@endforeach

        
<div style="background: #d8a51a; color: white; padding: 10px; font-weight: bold; margin-top: 10px;">
    FOR STORAGE ADMIN USE ONLY
</div>

<div style="border: 2px solid #4B0082; padding: 15px; background: #fff;">
    
    <div style="margin-bottom: 15px; display: flex; align-items: center;">
        <span style="margin-right: 10px; font-weight: bold; min-width: 120px;">Date Released:</span>
        <input type="date" name="date_released" style="border: none; border-bottom: 1px solid #000; flex: 1;">
    </div>

    <div style="margin-bottom: 15px; display: flex; gap: 20px;">
        <label>
            <span style="margin-right: 10px; font-weight: bold;">Stock Card Updated:</span>
            <input type="radio" name="status" value="Yes" {{ old('status') == 'Yes' ? 'checked' : '' }}> Yes
        </label>
        <label>
            <input type="radio" name="status" value="No" {{ old('status') == 'No' ? 'checked' : '' }}> No
        </label>
    </div>
    
    <div style="display: flex; align-items: center;">
        <span style="margin-right: 10px; font-weight: bold; min-width: 120px;">Admin Initials:</span>
        <input type="text" name="admin" style="border: none; border-bottom: 1px solid #000; flex: 1;">
    </div>
</div>



        <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px;">
    
    
   <a href="{{ route('material-requests.index') }}" 
   style="padding: 10px 40px; background-color: #e5e7eb; color: #374151; text-decoration: none; border-radius: 4px; font-weight: bold; cursor: pointer;">
   CANCEL
</a>

    
    <button type="submit" 
            style="padding: 10px 40px; background-color: #4B0082; color: white; border: none; border-radius: 4px; font-weight: bold; cursor: pointer;">
            SUBMIT
    </button>
    
</div>
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