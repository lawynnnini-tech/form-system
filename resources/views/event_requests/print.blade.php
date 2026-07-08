<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Event Request - {{ $eventRequest->form_no }}</title>
    <style>
        body {
            background: #f3f4f6;
            font-family: Arial, sans-serif;
            padding: 20px;
            margin: 0;
        }

        .form-container {
            width: 100%;
            max-width: 1024px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .header-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .school-name {
            font-size: 20px;
            font-weight: bold;
            color: #4B0082;
        }

        .form-meta {
            display: flex;
            gap: 15px;
        }

        .gold-line {
            border-top: 2px solid #e4ce0c;
            margin: 15px 0;
        }

        .main-title {
            font-size: 24px;
            font-weight: bold;
            color: #4B0082;
            text-align: center;
        }

        .sub-title {
            font-style: italic;
            color: #555;
            text-align: center;
            margin-bottom: 10px;
        }

        .section-title {
            color: #4B0082;
            padding: 10px 0;
            font-weight: bold;
            margin-top: 20px;
            text-transform: uppercase;
            border-bottom: 2px solid #9370DB;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #dbd8d8;
            margin-top: 10px;
        }

        td {
            padding: 10px;
            border: 1px solid #c0c0c0;
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

        .row-highlight {
            background-color: #f5f5c4;
        }

        .value-text {
            font-size: 15px;
            color: #333;
            border-bottom: 1px solid #000;
            display: inline-block;
            width: 100%;
            padding-bottom: 3px;
        }

        .check-group {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .check-item {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .purpose-table {
            width: 100%;
            border-collapse: collapse;
            border: 3px solid #b3a9dd;
            background-color: #fff;
        }

        .purpose-table td {
            border-bottom: 1px solid #d3d3d3;
            height: 50px;
            padding: 10px;
            vertical-align: top;
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
            padding: 15px;
            border: 1px solid #dbd8d8;
            text-align: center;
        }

        .resources-table td {
            border: 1px solid #dbd8d8;
            height: 40px;
            padding: 5px;
            text-align: center;
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

        .print-btn-container {
            text-align: right;
            margin-bottom: 20px;
        }

        .btn-print {
            background-color: #4B0082;
            color: white;
            padding: 10px 25px;
            border: none;
            border-radius: 4px;
            font-weight: bold;
            cursor: pointer;
            font-size: 16px;
        }

        .print-layout-table {
            border: 0;
            margin: 0;
        }

        .print-layout-table>thead>tr>td,
        .print-layout-table>tfoot>tr>td,
        .print-layout-table>tbody>tr>td {
            border: 0;
            padding: 0;
        }

        .print-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            color: #555;
            font-size: 11px;
            padding-top: 6px;
        }

        .print-footer-page {
            min-width: 90px;
            text-align: right;
            white-space: nowrap;
        }

        @media print {
            @page {
                margin: 12mm 12mm 18mm;

                @bottom-left {
                    content: "Confidential - For Internal Use Only -- I.A.M International School";
                    color: #555;
                    font-size: 11px;
                }

                @bottom-right {
                    content: "Page " counter(page) " of " counter(pages);
                    color: #555;
                    font-size: 11px;
                }
            }

            body {
                background: white;
                padding: 0;
                margin: 0;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }

            .form-container {
                box-shadow: none;
                padding: 0;
                max-width: 100%;
            }

            .print-btn-container {
                display: none;
            }

            .print-layout-table {
                page-break-inside: auto;
            }

            .print-layout-table>thead {
                display: table-header-group;
            }

            .print-layout-table>tfoot {
                display: none;
            }

            .print-layout-table>tbody {
                display: table-row-group;
            }

            .print-layout-table>thead>tr>td {
                padding-bottom: 8mm;
            }

            .print-layout-table>tbody>tr {
                page-break-inside: auto;
            }

            .section-title {
                page-break-after: avoid;
            }

            table:not(.print-layout-table) {
                page-break-inside: avoid;
            }

            table:not(.print-layout-table) tr {
                page-break-inside: avoid;
            }
        }
    </style>
</head>

<body>

    <div class="form-container">
        <div class="print-btn-container">
            <button class="btn-print" onclick="window.print()">Print Now</button>
        </div>

        <table class="print-layout-table">
            <thead>
                <tr>
                    <td>
                        <div style="display: flex; justify-content: flex-start; margin-bottom: 15px;">
                            <img src="{{ asset('images/iam.png') }}" alt="I.A.M Logo" style="width: 90px; height: auto; object-fit: contain;">
                        </div>

                        <div class="header-wrapper" style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 10px;">
                            <div class="school-name" style="font-size: 18px; font-weight: bold; color: #4B0082; letter-spacing: 0.5px;">
                                I.A.M International School
                            </div>

                            <div class="form-meta" style="display: flex; gap: 20px; font-size: 14px; color: #333;">
                                <div>
                                    <span style="font-weight: bold; margin-right: 5px;">Form No:</span>
                                    <span style="border-bottom: 1px solid #000; padding: 2px 10px; min-width: 60px; display: inline-block; text-align: center;">
                                        {{ $eventRequest->form_no }}
                                    </span>
                                </div>
                                <div>
                                    <span style="font-weight: bold; margin-right: 5px;">Date:</span>
                                    <span style="border-bottom: 1px solid #000; padding: 2px 10px; min-width: 80px; display: inline-block; text-align: center;">
                                        {{ $eventRequest->date_issued ? \Carbon\Carbon::parse($eventRequest->date_issued)->format('m/d/Y') : '' }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <td>
                        <div class="print-footer">
                            <div>Confidential - For Internal Use Only -- I.A.M International School</div>
                            <div class="print-footer-page">
                                <span class="print-page-number"></span>
                            </div>
                        </div>
                    </td>
                </tr>
            </tfoot>
            <tbody>
                <tr>
                    <td>
                        <div class="header-section" style="margin-bottom: 20px;">

                            <div class="gold-line" style="border-top: 2px solid #e4ce0c; margin: 10px 0;"></div>
                            <div class="main-title" style="font-size: 24px; font-weight: bold; color: #4B0082; text-align: center; margin-top: 15px;">EVENT / ACTIVITY REQUEST FORM</div>
                            <div class="sub-title" style="font-style: italic; color: #555; text-align: center; margin-bottom: 15px;">Request to Organize or Conduct an Event / Activity</div>
                            <div class="gold-line" style="border-top: 2px solid #e4ce0c; margin: 10px 0;"></div>
                        </div>

                        <div class="section-title">SECTION A — REQUESTER INFORMATION</div><br>
                        <table>
                            <tr>
                                <td class="label">Name of Requester / Organizer</td>
                                <td>
                                    <div class="value-text">{{ $eventRequest->requester_name }}</div>
                                </td>
                            </tr>
                            <tr class="row-highlight">
                                <td class="label">Department / Role</td>
                                <td>
                                    <div class="check-group">
                                        @foreach(['Teacher', 'Marketing', 'Admin', 'Student'] as $dept)
                                        <div class="check-item">
                                            <input type="checkbox" disabled {{ is_array($departments) && in_array($dept, $departments) ? 'checked' : '' }}> {{ $dept }}
                                        </div>
                                        @endforeach
                                        <div class="check-item">
                                            <input type="checkbox" disabled {{ !empty($eventRequest->department_other) ? 'checked' : '' }}> Other:
                                            <span style="border-bottom: 1px solid #000; padding: 0 10px;">{{ $eventRequest->department_other ?? '__________' }}</span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="label">Contact Number / Email</td>
                                <td>
                                    <div class="value-text">{{ $eventRequest->contact }}</div>
                                </td>
                            </tr>
                            <tr class="row-highlight">
                                <td class="label">Date of Request</td>
                                <td>
                                    <div class="value-text">
                                        {{ $eventRequest->request_date ? \Carbon\Carbon::parse($eventRequest->request_date)->format('m/d/Y') : '' }}
                                    </div>
                                </td>
                            </tr>
                        </table>

                        <div class="section-title">SECTION B — EVENT DETAILS</div><br>
                        <table>
                            <tr>
                                <td class="label">Event / Activity Title</td>
                                <td>
                                    <div class="value-text">{{ $eventRequest->event_title }}</div>
                                </td>
                            </tr>
                            <tr class="row-highlight">
                                <td class="label">Type of Event</td>
                                <td>
                                    <div class="check-group">
                                        @foreach(['Academic', 'Sports', 'Cultural', 'Marketing', 'Meeting'] as $type)
                                        <div class="check-item">
                                            <input type="checkbox" disabled {{ is_array($event_types) && in_array($type, $event_types) ? 'checked' : '' }}> {{ $type }}
                                        </div>
                                        @endforeach
                                        <div class="check-item">
                                            <input type="checkbox" disabled {{ !empty($eventRequest->event_type_other) ? 'checked' : '' }}> Other:
                                            <span style="border-bottom: 1px solid #000; padding: 0 10px;">{{ $eventRequest->event_type_other ?? '__________' }}</span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="label">Proposed Date(s)</td>
                                <td>
                                    <div class="value-text">
                                        {{ $eventRequest->proposed_date ? \Carbon\Carbon::parse($eventRequest->proposed_date)->format('m/d/Y') : '' }}
                                    </div>
                                </td>
                            </tr>
                            <tr class="row-highlight">
                                <td class="label">Start | End Time</td>
                                <td>
                                    Start: <span style="border-bottom: 1px solid #000; padding: 0 10px; margin-right: 20px;">{{ $eventRequest->start_time ? \Carbon\Carbon::parse($eventRequest->start_time)->format('h:i A') : '' }}</span>
                                    End: <span style="border-bottom: 1px solid #000; padding: 0 10px;">{{ $eventRequest->end_time ? \Carbon\Carbon::parse($eventRequest->end_time)->format('h:i A') : '' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="label">Venue / Location</td>
                                <td>
                                    <div class="value-text">{{ $eventRequest->venue }}</div>
                                </td>
                            </tr>
                            <tr class="row-highlight">
                                <td class="label">Expected Participants</td>
                                <td>
                                    <div class="value-text">{{ $eventRequest->participants }}</div>
                                </td>
                            </tr>
                            <tr>
                                <td class="label">Target Audience</td>
                                <td>
                                    <div class="check-group">
                                        @foreach(['Students', 'Staff', 'Parents', 'Public'] as $aud)
                                        <div class="check-item">
                                            <input type="checkbox" disabled {{ is_array($target_audiences) && in_array($aud, $target_audiences) ? 'checked' : '' }}> {{ $aud }}
                                        </div>
                                        @endforeach
                                        <div class="check-item">
                                            <input type="checkbox" disabled {{ !empty($eventRequest->audience_other) ? 'checked' : '' }}> Other:
                                            <span style="border-bottom: 1px solid #000; padding: 0 10px;">{{ $eventRequest->audience_other ?? '__________' }}</span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>

                        <div class="section-title">SECTION C — PURPOSE / OBJECTIVES</div><br>
                        <table class="purpose-table">
                            @for ($i = 0; $i < 5; $i++)
                                <tr class="{{ $i == 3 ? 'last-row' : '' }}">
                                <td>{{ $purposes[$i] ?? '' }}</td>
                </tr>
                @endfor
        </table>

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
                <tr>
                    <td>AAA</td>
                    <td>10</td>
                    <td>Bb</td>
                    <td>10</td>
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
                <tr class="total-row">
                    <td colspan="3" style="color: #4B0082;">TOTAL ESTIMATED COST</td>
                    <td style="text-align: center;">10</td>
                </tr>
            </tbody>
        </table>

        <br><br><br><br><br>

        <div class="section-title">SECTION E — LOGISTICS & SUPPORT REQUIRED</div><br>
        <div style="padding:15px; display:grid; grid-template-columns: 1fr 1fr; gap:10px;">
            @foreach([
            'sound' => 'Sound system / microphones',
            'decor' => 'Decorations',
            'tables' => 'Tables & chairs',
            'refresh' => 'Refreshments / catering',
            'projector' => 'Projector / screen',
            'security' => 'Security / first aid',
            'marketing' => 'Marketing materials (posters)'
            ] as $key => $label)
            <label>
                <input type="checkbox" disabled {{ is_array($logistics) && in_array($key, $logistics) ? 'checked' : '' }}> {{ $label }}
            </label>
            @endforeach
            <label>
                <input type="checkbox" disabled> Other: <span style="border-bottom:1px solid #000; padding:0 10px;">{{ $eventRequest->logistics_other ?? '' }}</span>
            </label>
        </div>

        <div class="section-title">SECTION F — SIGNATURES & APPROVAL</div><br>
        <div style="padding: 10px; font-style: italic; border-left: 4px solid #e4ce0c; background: #f9f9f9; margin-bottom: 15px;">
            Note: This event/activity may only proceed after all required approvals are signed.
        </div>

        @foreach([
        '1. Requester / Organizer',
        '2. Department Head / Supervisor',
        '3. Principal / Manager',
        '4. Finance Officer (if budget required)',
        '5. Admin Office'
        ] as $index => $role)
        <div style="display: flex; border: 1px solid #dbd8d8; margin-bottom: 10px; page-break-inside: avoid;">
            <div style="width: 30%; background: #f8f1fc; padding: 12px; font-weight: bold; color: #1e134d; display: flex; align-items: center; border-right: 1px solid #dbd8d8;">
                {{ $role }}
            </div>
            <div style="width: 70%; padding: 10px; display: flex; flex-direction: column; gap: 8px; background: white; border-bottom: 2px solid #e4ce0c;">
                <div style="display: flex; align-items: center; height: 25px;">
                    <span style="width: 90px; font-size: 14px;">Name (Print):</span>
                    <span style="border-bottom: 1px solid #000; flex: 1; font-size: 14px;">{{ $signatures[$index]['name'] ?? '' }}</span>
                </div>
                <div style="display: flex; align-items: center; height: 25px;">
                    <span style="width: 90px; font-size: 14px;">Signature:</span>
                    <span style="border-bottom: 1px solid #000; flex: 1; font-size: 14px;">{{ $signatures[$index]['signature'] ?? '' }}</span>
                </div>
                <div style="display: flex; align-items: center; height: 25px;">
                    <span style="width: 90px; font-size: 14px;">Date:</span>
                    <span style="border-bottom: 1px solid #000; flex: 1; font-size: 14px;">
                        {{ !empty($signatures[$index]['date']) ? \Carbon\Carbon::parse($signatures[$index]['date'])->format('m/d/Y') : '' }}
                    </span>
                </div>
            </div>
        </div>
        @endforeach
        <br>
        <div style="background: #d8a51a; color: white; padding: 10px; font-weight: bold; margin-top: 10px;">
            FOR OFFICE USE ONLY
        </div>
        <div style="border: 2px solid #4B0082; padding: 15px; background: #fff;">
            <div style="margin-bottom: 15px; display: flex; gap: 20px;">
                <label><input type="radio" disabled {{ $eventRequest->status == 'Approved' ? 'checked' : '' }}> Approved</label>
                <label><input type="radio" disabled {{ $eventRequest->status == 'Rejected' ? 'checked' : '' }}> Rejected</label>
            </div>
            <div style="margin-bottom: 15px; display: flex; align-items: center;">
                <span style="margin-right: 10px; font-weight: bold;">Reference No.:</span>
                <span style="border-bottom: 1px solid #000; flex: 1;">{{ $eventRequest->ref_no }}</span>
            </div>
            <div style="display: flex; align-items: center;">
                <span style="margin-right: 10px; font-weight: bold;">Remarks:</span>
                <span style="border-bottom: 1px solid #000; flex: 1;">{{ $eventRequest->remarks }}</span>
            </div>
        </div>
        </td>
        </tr>
        </tbody>
        </table>
    </div>
</body>

</html>
