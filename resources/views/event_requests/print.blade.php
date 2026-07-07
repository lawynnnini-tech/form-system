<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Event Request Form</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f3f4f6;
            color: #333;
            line-height: 1.45;
            font-size: 13px;
        }

        .form-container {

            width: 210mm;
            min-height: 297mm;

            margin: 20px auto;

            background: #fff;

            padding: 30mm 15mm 25mm;

            box-shadow: 0 0 10px rgba(0, 0, 0, .12);

        }

        .print-btn-container {

            text-align: right;

            margin-bottom: 20px;

        }

        .btn-print {

            background: #4B0082;

            color: white;

            border: none;

            padding: 10px 25px;

            cursor: pointer;

            border-radius: 5px;

            font-weight: bold;

        }

        .btn-print:hover {

            background: #32105d;

        }

        .gold-line {

            border-top: 2px solid #d7b400;

            margin: 8px 0;

        }

        .main-title {

            text-align: center;

            font-size: 24px;

            color: #4B0082;

            font-weight: bold;

            letter-spacing: .5px;

            margin-top: 10px;

        }

        .sub-title {

            text-align: center;

            font-style: italic;

            color: #666;

            margin-top: 6px;

            margin-bottom: 12px;

        }

        .section-title {

            margin-top: 22px;

            margin-bottom: 10px;

            padding: 8px 12px;

            background: #f8f1fc;

            color: #4B0082;

            border-left: 6px solid #4B0082;

            font-size: 15px;

            font-weight: bold;

            text-transform: uppercase;

        }

        table {

            width: 100%;

            border-collapse: collapse;

            margin-bottom: 18px;

        }

        td,
        th {

            border: 1px solid #cfcfcf;

            padding: 9px;

            vertical-align: top;

        }

        .label {

            width: 34%;

            background: #f8f1fc;

            color: #4B0082;

            font-weight: bold;

        }

        .value-text {

            border-bottom: 1px solid #555;

            min-height: 22px;

            padding-bottom: 2px;

        }

        .check-group {

            display: flex;

            flex-wrap: wrap;

            gap: 14px;

        }

        .check-item {

            display: flex;

            align-items: center;

            gap: 5px;

        }

        .resources-table th {

            background: #4B0082;

            color: white;

            text-align: center;

        }

        .resources-table tbody tr:nth-child(even) {

            background: #faf6dd;

        }

        .signature-card {

            border: 1px solid #bbb;

            margin-bottom: 12px;

            page-break-inside: avoid;

        }

        .signature-title {

            background: #f8f1fc;

            color: #4B0082;

            padding: 10px;

            font-weight: bold;

        }

        .signature-body {

            padding: 12px;

        }

        .signature-line {

            margin-bottom: 14px;

        }

        .signature-line span {

            display: inline-block;

            width: 90px;

        }

        .signature-fill {

            display: inline-block;

            border-bottom: 1px solid #444;

            width: 72%;

        }

        .office-header {

            margin-top: 20px;

            background: #d7b400;

            color: white;

            padding: 10px;

            font-weight: bold;

        }

        .office-body {

            border: 2px solid #4B0082;

            padding: 18px;

        }

        .print-header {

            display: none;

        }

        .print-footer {

            display: none;

        }

        @page {

            size: A4;

            margin: 25mm 15mm 18mm;

        }

        @media print {

            body {

                background: white;

            }

            .form-container {

                width: 100%;

                margin: 0;

                box-shadow: none;

                padding-top: 35mm;

                padding-bottom: 20mm;

            }

            .print-btn-container {

                display: none;

            }

            .print-header {

                display: block;

                position: fixed;

                top: 0;

                left: 0;

                right: 0;

                height: 30mm;

                background: white;

                padding: 10mm 15mm 5mm;

            }

            .print-footer {

                display: flex;

                justify-content: space-between;

                align-items: center;

                position: fixed;

                bottom: 0;

                left: 0;

                right: 0;

                height: 12mm;

                padding: 0 15mm;

                /* border-top: 1px solid #bdbdbd; */

                background: #fff;

                font-size: 11px;

                color: #555;

            }

            .section-title {

                page-break-after: avoid;

            }

            table {

                page-break-inside: auto;

            }

            tr {

                page-break-inside: avoid;

                page-break-after: auto;

            }

            .signature-card {

                page-break-inside: avoid;

            }

            .office-body {

                page-break-inside: avoid;

            }

        }
    </style>

</head>

<body>

    <div class="print-btn-container">

        <button class="btn-print" onclick="window.print()">

            Print Now

        </button>

    </div>

    <div class="print-header">

        <div style="display:flex;justify-content:space-between;align-items:flex-end;">

            <div>

                <img src="{{ asset('images/iam.png') }}" width="85">

                <div style="margin-top:6px;font-size:18px;font-weight:bold;color:#4B0082;">

                    I.A.M International School

                </div>

            </div>

            <div style="display:flex;gap:25px;font-size:13px;">

                <div>

                    <strong>Form No</strong><br>

                    {{ $eventRequest->form_no }}

                </div>

                <div>

                    <strong>Date</strong><br>

                    {{ $eventRequest->date_issued ? \Carbon\Carbon::parse($eventRequest->date_issued)->format('m/d/Y') : '' }}

                </div>

            </div>

        </div>

        <div class="gold-line"></div>

    </div>

    <div class="print-footer">

        <div>

            Confidential – For Internal Use Only – I.A.M International School

        </div>

        <div>

            Page

        </div>

    </div>

    <div class="form-container">

        <!-- <div style="display:flex;justify-content:flex-start;margin-bottom:15px;">

            <img src="{{ asset('images/iam.png') }}" width="90">

        </div>

        <div style="display:flex;justify-content:space-between;align-items:flex-end;">

            <div style="font-size:18px;font-weight:bold;color:#4B0082;">

                I.A.M International School

            </div>

            <div style="display:flex;gap:20px;">

                <div>

                    <strong>Form No:</strong>

                    {{ $eventRequest->form_no }}

                </div>

                <div>

                    <strong>Date:</strong>

                    {{ $eventRequest->date_issued ? \Carbon\Carbon::parse($eventRequest->date_issued)->format('m/d/Y') : '' }}

                </div>

            </div>

        </div> -->

        <!-- <div class="gold-line"></div> -->

        <div class="main-title">

            EVENT / ACTIVITY REQUEST FORM

        </div>

        <div class="sub-title">

            Request to Organize or Conduct an Event / Activity

        </div>

        <div class="gold-line"></div>

        <div class="section-title">
            SECTION A — REQUESTER INFORMATION
        </div>

        <table>

            <tr>

                <td class="label">
                    Name of Requester / Organizer
                </td>

                <td>
                    <div class="value-text">
                        {{ $eventRequest->requester_name }}
                    </div>
                </td>

            </tr>

            <tr>

                <td class="label">
                    Department / Role
                </td>

                <td>

                    <div class="check-group">

                        @foreach ([
                        'Teacher',
                        'Marketing',
                        'Admin',
                        'Student'
                        ] as $dept)

                        <label class="check-item">

                            <input
                                type="checkbox"
                                disabled
                                {{ is_array($departments) && in_array($dept,$departments) ? 'checked' : '' }}>

                            {{ $dept }}

                        </label>

                        @endforeach

                        <label class="check-item">

                            <input
                                type="checkbox"
                                disabled
                                {{ !empty($eventRequest->department_other) ? 'checked' : '' }}>

                            Other :

                            <span class="value-text" style="width:180px;">
                                {{ $eventRequest->department_other }}
                            </span>

                        </label>

                    </div>

                </td>

            </tr>

            <tr>

                <td class="label">
                    Contact Number / Email
                </td>

                <td>

                    <div class="value-text">

                        {{ $eventRequest->contact }}

                    </div>

                </td>

            </tr>

            <tr>

                <td class="label">
                    Date of Request
                </td>

                <td>

                    <div class="value-text">

                        {{ $eventRequest->request_date
                    ? \Carbon\Carbon::parse($eventRequest->request_date)->format('m/d/Y')
                    : '' }}

                    </div>

                </td>

            </tr>

        </table>

        <div class="section-title">
            SECTION B — EVENT DETAILS
        </div>

        <table>

            <tr>
                <td class="label">
                    Event / Activity Title
                </td>

                <td>
                    <div class="value-text">
                        {{ $eventRequest->event_title }}
                    </div>
                </td>
            </tr>

            <tr>
                <td class="label">
                    Type of Event
                </td>

                <td>

                    <div class="check-group">

                        @foreach([
                        'Academic',
                        'Sports',
                        'Cultural',
                        'Marketing',
                        'Meeting'
                        ] as $type)

                        <label class="check-item">

                            <input
                                type="checkbox"
                                disabled
                                {{ is_array($event_types) && in_array($type,$event_types) ? 'checked' : '' }}>

                            {{ $type }}

                        </label>

                        @endforeach

                        <label class="check-item">

                            <input
                                type="checkbox"
                                disabled
                                {{ !empty($eventRequest->event_type_other) ? 'checked' : '' }}>

                            Other :

                            <span class="value-text" style="width:180px;display:inline-block;">
                                {{ $eventRequest->event_type_other }}
                            </span>

                        </label>

                    </div>

                </td>

            </tr>

            <tr>

                <td class="label">
                    Proposed Date
                </td>

                <td>

                    <div class="value-text">

                        {{ $eventRequest->proposed_date
                    ? \Carbon\Carbon::parse($eventRequest->proposed_date)->format('m/d/Y')
                    : '' }}

                    </div>

                </td>

            </tr>

            <tr>

                <td class="label">
                    Time Schedule
                </td>

                <td>

                    <div style="display:flex;gap:40px;align-items:center;">

                        <div>

                            <strong>Start :</strong>

                            <span class="value-text"
                                style="display:inline-block;width:120px;margin-left:8px;">

                                {{ $eventRequest->start_time
                            ? \Carbon\Carbon::parse($eventRequest->start_time)->format('h:i A')
                            : '' }}

                            </span>

                        </div>

                        <div>

                            <strong>End :</strong>

                            <span class="value-text"
                                style="display:inline-block;width:120px;margin-left:8px;">

                                {{ $eventRequest->end_time
                            ? \Carbon\Carbon::parse($eventRequest->end_time)->format('h:i A')
                            : '' }}

                            </span>

                        </div>

                    </div>

                </td>

            </tr>

            <tr>

                <td class="label">
                    Venue / Location
                </td>

                <td>

                    <div class="value-text">

                        {{ $eventRequest->venue }}

                    </div>

                </td>

            </tr>

            <tr>

                <td class="label">
                    Expected Participants
                </td>

                <td>

                    <div class="value-text">

                        {{ $eventRequest->participants }}

                    </div>

                </td>

            </tr>

            <tr>

                <td class="label">
                    Target Audience
                </td>

                <td>

                    <div class="check-group">

                        @foreach([
                        'Students',
                        'Staff',
                        'Parents',
                        'Public'
                        ] as $aud)

                        <label class="check-item">

                            <input
                                type="checkbox"
                                disabled
                                {{ is_array($target_audiences) && in_array($aud,$target_audiences) ? 'checked' : '' }}>

                            {{ $aud }}

                        </label>

                        @endforeach

                        <label class="check-item">

                            <input
                                type="checkbox"
                                disabled
                                {{ !empty($eventRequest->audience_other) ? 'checked' : '' }}>

                            Other :

                            <span class="value-text"
                                style="width:180px;display:inline-block;">

                                {{ $eventRequest->audience_other }}

                            </span>

                        </label>

                    </div>

                </td>

            </tr>

        </table>

        <!-- ========================================================= -->
        <!-- SECTION C -->
        <!-- ========================================================= -->

        <div class="section-title">
            SECTION C — PURPOSE / OBJECTIVES
        </div>

        <table class="purpose-table">

            @for($i=0;$i<5;$i++)

                <tr>

                <td style="height:55px;vertical-align:top;padding:12px;">

                    {{ $purposes[$i] ?? '' }}

                </td>

                </tr>

                @endfor

        </table>


        <!-- ========================================================= -->
        <!-- SECTION D -->
        <!-- ========================================================= -->

        <div class="section-title">
            SECTION D — RESOURCES NEEDED
        </div>

        <table class="resources-table">

            <thead>

                <tr>

                    <th width="40%">
                        Item / Resource
                    </th>

                    <th width="15%">
                        Qty
                    </th>

                    <th width="25%">
                        Source
                    </th>

                    <th width="20%">
                        Estimated Cost
                    </th>

                </tr>

            </thead>

            <tbody>

                <tr>

                    <td>AAA</td>

                    <td style="text-align:center;">
                        10
                    </td>

                    <td style="text-align:center;">
                        BB
                    </td>

                    <td style="text-align:right;">
                        10
                    </td>

                </tr>

                <tr>

                    <td>&nbsp;</td>

                    <td></td>

                    <td></td>

                    <td></td>

                </tr>

                <tr>

                    <td>&nbsp;</td>

                    <td></td>

                    <td></td>

                    <td></td>

                </tr>

                <tr>

                    <td>&nbsp;</td>

                    <td></td>

                    <td></td>

                    <td></td>

                </tr>

                <tr style="background:#f8f1fc;font-weight:bold;">

                    <td colspan="3"
                        style="text-align:right;color:#4B0082;">

                        TOTAL ESTIMATED COST

                    </td>

                    <td style="text-align:right;">

                        10

                    </td>

                </tr>

            </tbody>

        </table>


        <!-- ========================================================= -->
        <!-- SECTION E -->
        <!-- ========================================================= -->

        <div class="section-title">
            SECTION E — LOGISTICS & SUPPORT REQUIRED
        </div>

        <table>

            <tr>

                <td style="padding:18px;">

                    <div style="display:grid;
            grid-template-columns:1fr 1fr;
            gap:15px;">

                        <label class="check-item">

                            <input
                                type="checkbox"
                                disabled
                                {{ is_array($logistics) && in_array('sound',$logistics) ? 'checked' : '' }}>

                            Sound System / Microphones

                        </label>


                        <label class="check-item">

                            <input
                                type="checkbox"
                                disabled
                                {{ is_array($logistics) && in_array('decor',$logistics) ? 'checked' : '' }}>

                            Decorations

                        </label>


                        <label class="check-item">

                            <input
                                type="checkbox"
                                disabled
                                {{ is_array($logistics) && in_array('tables',$logistics) ? 'checked' : '' }}>

                            Tables & Chairs

                        </label>


                        <label class="check-item">

                            <input
                                type="checkbox"
                                disabled
                                {{ is_array($logistics) && in_array('refresh',$logistics) ? 'checked' : '' }}>

                            Refreshments / Catering

                        </label>


                        <label class="check-item">

                            <input
                                type="checkbox"
                                disabled
                                {{ is_array($logistics) && in_array('projector',$logistics) ? 'checked' : '' }}>

                            Projector / Screen

                        </label>


                        <label class="check-item">

                            <input
                                type="checkbox"
                                disabled
                                {{ is_array($logistics) && in_array('security',$logistics) ? 'checked' : '' }}>

                            Security / First Aid

                        </label>


                        <label class="check-item">

                            <input
                                type="checkbox"
                                disabled
                                {{ is_array($logistics) && in_array('marketing',$logistics) ? 'checked' : '' }}>

                            Marketing Materials

                        </label>


                        <label class="check-item">

                            <input
                                type="checkbox"
                                disabled
                                {{ !empty($eventRequest->logistics_other) ? 'checked' : '' }}>

                            Other :

                            <span class="value-text"
                                style="width:180px;
             display:inline-block;">

                                {{ $eventRequest->logistics_other }}

                            </span>

                        </label>

                    </div>

                </td>

            </tr>

        </table>

        <!-- ========================================================= -->
        <!-- SECTION F -->
        <!-- ========================================================= -->

        <div class="section-title">
            SECTION F — SIGNATURES & APPROVAL
        </div>

        <div style="
    padding:15px;
    margin-bottom:20px;
    background:#fffbe9;
    border-left:5px solid #d7b400;
    color:#555;
    font-style:italic;
">

            <strong>Note:</strong>

            This event/activity may only proceed after all required approvals have been completed.

        </div>

        @php

        $roles=[

        'Requester / Organizer',

        'Department Head / Supervisor',

        'Principal / Manager',

        'Finance Officer (If Budget Required)',

        'Administration Office'

        ];

        @endphp


        @foreach($roles as $index=>$role)

        <div class="signature-card">

            <div class="signature-title">

                {{ $loop->iteration }}.
                {{ $role }}

            </div>

            <div class="signature-body">

                <div class="signature-line">

                    <span>
                        Name
                    </span>

                    <span class="signature-fill">

                        {{ $signatures[$index]['name'] ?? '' }}

                    </span>

                </div>

                <div class="signature-line">

                    <span>
                        Signature
                    </span>

                    <span class="signature-fill">

                        {{ $signatures[$index]['signature'] ?? '' }}

                    </span>

                </div>

                <div class="signature-line">

                    <span>
                        Date
                    </span>

                    <span class="signature-fill">

                        {{ !empty($signatures[$index]['date'])
                    ? \Carbon\Carbon::parse($signatures[$index]['date'])->format('m/d/Y')
                    : '' }}

                    </span>

                </div>

            </div>

        </div>

        @endforeach

        <!-- ========================================================= -->
        <!-- OFFICE USE ONLY -->
        <!-- ========================================================= -->

        <div class="office-header">

            FOR OFFICE USE ONLY

        </div>

        <div class="office-body">

            <table style="margin-bottom:20px;">

                <tr>

                    <td class="label" style="width:220px;">

                        Approval Status

                    </td>

                    <td>

                        <label style="margin-right:35px;">

                            <input
                                type="radio"
                                disabled
                                {{ $eventRequest->status=='Approved' ? 'checked' : '' }}>

                            Approved

                        </label>

                        <label>

                            <input
                                type="radio"
                                disabled
                                {{ $eventRequest->status=='Rejected' ? 'checked' : '' }}>

                            Rejected

                        </label>

                    </td>

                </tr>

                <tr>

                    <td class="label">

                        Reference Number

                    </td>

                    <td>

                        <div class="value-text">

                            {{ $eventRequest->ref_no }}

                        </div>

                    </td>

                </tr>

                <tr>

                    <td class="label">

                        Remarks

                    </td>

                    <td>

                        <div
                            style="
                        min-height:90px;
                        border:1px solid #ccc;
                        padding:10px;
                        line-height:1.6;
                        background:#fff;
                    ">

                            {{ $eventRequest->remarks }}

                        </div>

                    </td>

                </tr>

            </table>

        </div>

    </div>

</body>

</html>