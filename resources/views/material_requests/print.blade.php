<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Material Request Form - Print</title>
    <style>
        /* A4 Page & Margin Settings */
        @page {
            size: A4;
            margin: 0;
            /* Browser ရဲ့ URL တွေ လုံးဝမပါအောင် margin offset ချန်ထားခြင်း */
        }

        body {
            background: #f3f4f6;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }

        /* Print ခလုတ်ကို ညာဘက်ကပ်ရန် flexbox သုံးထားပါတယ် */
        .button-container {
            width: 210mm;
            margin: 20px auto;
            display: flex;
            justify-content: flex-end;
            /* ညာဘက်အစွန်သို့ ပို့ပေးသည် */
            padding: 0 16px;
            box-sizing: border-box;
        }

        .print-container {
            width: 210mm;
            margin: 0 auto;
            background: white;
            padding: 20mm 15mm 20mm 15mm;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
            position: relative;
        }

        /* ------------------ MAIN CONTAINER TABLE ------------------ */
        .outer-print-table {
            width: 100%;
            border-collapse: collapse;
            border: none !important;
        }

        .outer-print-table>thead>tr>td,
        .outer-print-table>tfoot>tr>td,
        .outer-print-table>tbody>tr>td {
            border: none !important;
            padding: 0 !important;
        }

        /* ------------------ HEADER & FOOTER DESIGN ------------------ */
        .school-name {
            font-size: 24px;
            font-weight: bold;
            color: #4B0082;
            letter-spacing: 0.5px;
            font-family: Arial, sans-serif;
        }

        .form-meta {
            display: flex;
            gap: 20px;
            font-size: 15px;
            color: #000;
            font-weight: bold;
            font-family: Arial, sans-serif;
        }

        .print-underline {
            border-bottom: 1px solid #000;
            display: inline-block;
            text-align: center;
            padding-bottom: 2px;
            font-weight: normal;
        }

        .gold-line {
            border-top: 2px solid #e4ce0c;
            margin: 15px 0;
            width: 100%;
        }

        /* ------------------ FORM CONTENT DESIGN ------------------ */
        .main-title {
            font-size: 24px;
            font-weight: bold;
            color: #4B0082;
            text-align: center;
            margin-top: 10px;
        }

        .sub-title {
            font-style: italic;
            color: #555;
            text-align: center;
            margin-bottom: 15px;
        }

        .section-title {
            color: #4B0082;
            padding: 8px 0;
            font-weight: bold;
            margin-top: 15px;
            text-transform: uppercase;
            border-bottom: 2px solid #9370DB;
            font-size: 15px;
        }

        .content-table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #dbd8d8;
            font-size: 13px;
        }

        .content-table td {
            padding: 8px;
            border: 1px solid #c0c0c0;
        }

        .label {
            width: 280px;
            background-color: #f8f1fc;
            color: #4B0082;
            font-weight: bold;
            vertical-align: top;
        }

        .row-highlight {
            background-color: #f5f5c4;
        }

        .purpose-table {
            width: 100%;
            border: 3px solid #b3a9dd;
            background-color: #fff;
            border-collapse: collapse;
        }

        .purpose-table td {
            border-bottom: 1px solid #d3d3d3;
            height: 35px;
            padding: 8px;
        }

        .purpose-table .last-row td {
            border-bottom: 2px solid #e4ce0c;
        }

        .resources-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
        }

        .resources-table th {
            background-color: #7d1cc2;
            color: white;
            padding: 10px;
            border: 1px solid #dbd8d8;
        }

        .resources-table td {
            height: 35px;
            padding: 8px;
            background-color: #ffffff;
            border: 1px solid #c0c0c0;
        }

        .resources-table tbody tr:nth-child(even) td {
            background-color: #f5f5c4;
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

        /* ------------------ PRINT MEDIA TARGETING ------------------ */
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

        .form-container {
            width: 100%;
            max-width: 1024px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
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
                                        {{ $item->form_no }}
                                    </span>
                                </div>
                                <div>
                                    <span style="font-weight: bold; margin-right: 5px;">Date:</span>
                                    <span style="border-bottom: 1px solid #000; padding: 2px 10px; min-width: 80px; display: inline-block; text-align: center;">
                                        {{ $item->date_issued ? \Carbon\Carbon::parse($item->date_issued)->format('m/d/Y') : '' }}
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
                        <div class="main-title">MATERIAL REQUEST FORM</div>
                        <div class="sub-title">For Teachers . Marketing . Administrative Staff</div>
                        <div class="gold-line"></div>

                        <div class="section-title">SECTION A — REQUESTER INFORMATION</div><br>
                        <table class="content-table">
                            <tr>
                                <td class="label">Full Name of Requester</td>
                                <td><span style="font-weight: normal;">{{ $item->requester_name }}</span></td>
                            </tr>
                            <tr class="row-highlight">
                                <td class="label">Department / Role</td>
                                <td>
                                    @php
                                    $departments = is_array($item->department) ? $item->department : json_decode($item->department, true) ?? [$item->department];
                                    @endphp
                                    <div style="display: flex; gap: 15px;">
                                        <label><input type="checkbox" disabled {{ in_array('Teacher', $departments) ? 'checked' : '' }}> Teacher</label>
                                        <label><input type="checkbox" disabled {{ in_array('Marketing', $departments) ? 'checked' : '' }}> Marketing</label>
                                        <label><input type="checkbox" disabled {{ in_array('Admin', $departments) ? 'checked' : '' }}> Admin</label>
                                        <label><input type="checkbox" disabled {{ in_array('Other', $departments) ? 'checked' : '' }}> Other</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="label">Employee ID</td>
                                <td><span style="font-weight: normal;">{{ $item->employee_id ?? 'N/A' }}</span></td>
                            </tr>
                            <tr>
                                <td class="label">Contact Number / Email</td>
                                <td><span style="font-weight: normal;">{{ $item->contact }}</span></td>
                            </tr>
                            <tr class="row-highlight">
                                <td class="label">Date of Request</td>
                                <td><span style="font-weight: normal;">{{ $item->request_date ? \Carbon\Carbon::parse($item->request_date)->format('m/d/Y') : '' }}</span></td>
                            </tr>
                            <tr class="row-highlight">
                                <td class="label">Date Needed By</td>
                                <td><span style="font-weight: normal;">{{ $item->need_date ? \Carbon\Carbon::parse($item->need_date)->format('m/d/Y') : 'N/A' }}</span></td>
                            </tr>
                        </table>

                        <div class="section-title">SECTION B — MATERIAL DETAILS</div><br>
                        <table class="resources-table">
                            <thead>
                                <tr>
                                    <th style="width: 50px; text-align: center;">No.</th>
                                    <th style="text-align: left;">Item Description</th>
                                    <th style="width: 100px; text-align: center;">Quantity</th>
                                    <th style="width: 100px; text-align: center;">Unit</th>
                                    <th style="text-align: left;">Remarks</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $itemsData = is_array($item->items) ? $item->items : json_decode($item->items, true) ?? [];
                                @endphp

                                @if(count($itemsData) > 0)
                                @foreach($itemsData as $index => $row)
                                <tr>
                                    <td style="text-align: center;">{{ $index + 1 }}</td>
                                    <td style="text-align: left;">{{ $row['desc'] ?? '' }}</td>
                                    <td style="text-align: center;">{{ $row['qty'] ?? '' }}</td>
                                    <td style="text-align: center;">{{ $row['unit'] ?? '' }}</td>
                                    <td style="text-align: left;">{{ $row['remarks'] ?? '' }}</td>
                                </tr>
                                @endforeach
                                @else
                                @for($i=0; $i<4; $i++)
                                    <tr>
                                    <td style="text-align: center;">{{ $i + 1 }}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                </tr>
                @endfor
                @endif
            </tbody>
        </table>
        <div class="section-title">SECTION C — PURPOSE / JUSTIFICATION</div><br>
        <table class="purpose-table">
            @php
            $purposes = is_array($item->purpose) ? $item->purpose : json_decode($item->purpose, true) ?? [$item->purpose];
            @endphp
            @for($i=0; $i<3; $i++)
                <tr class="{{ $i == 3 ? 'last-row' : '' }}">
                <td>{{ $purposes[$i] ?? '' }}</td>
                </tr>
                @endfor
        </table>

        <table class="purpose-table">
            @php
            $purposes = is_array($item->purpose) ? $item->purpose : json_decode($item->purpose, true) ?? [$item->purpose];
            @endphp
            @for($i=0; $i<2; $i++)
                <tr class="{{ $i == 3 ? 'last-row' : '' }}">
                <td>{{ $purposes[$i] ?? '' }}</td>
                </tr>
                @endfor
        </table>

        <div class="section-title">SECTION D — SIGNATURES & APPROVAL WORKFLOW</div><br>
        <div style="padding: 8px; font-style: italic; border-left: 4px solid #e4ce0c; background: #f9f9f9; margin-bottom: 10px; font-size: 12px;">
            Note: Materials will only be released by the Storage Admin once ALL required signatures below are complete. No materials will be issued without the full approval chain.
        </div>

        @foreach([
        '1. Requester ',
        '2. Department Head / Supervisor',
        '3. Principal / Manager',
        '4. Storage Admin',
        '5. Receiver Acknowledgement'
        ] as $index => $role)
        @php $sigData = isset($item->signatures[$index]) ? $item->signatures[$index] : null; @endphp
        <div style="display: flex; border: 1px solid #dbd8d8; margin-bottom: 6px; font-size: 12px;">
            <div style="width: 30%; background: #f8f1fc; padding: 8px; font-weight: bold; color: #1e134d; display: flex; align-items: center; border-right: 1px solid #dbd8d8;">
                {{ $role }}
            </div>
            <div style="width: 70%; padding: 6px; display: flex; flex-direction: column; gap: 4px; background: white; border-bottom: 2px solid #e4ce0c;">
                <div style="display: flex; align-items: center;">
                    <span style="width: 90px;">Name (Print):</span>
                    <span class="print-underline" style="flex: 1; text-align: left;">{{ $sigData['name'] ?? '' }}</span>
                </div>
                <div style="display: flex; align-items: center;">
                    <span style="width: 90px;">Signature:</span>
                    <span class="print-underline" style="flex: 1; text-align: left;">{{ $sigData['signature'] ?? '' }}</span>
                </div>
                <div style="display: flex; align-items: center;">
                    <span style="width: 90px;">Date:</span>
                    <span class="print-underline" style="flex: 1; text-align: left;">{{ $sigData['date'] ? \Carbon\Carbon::parse($sigData['date'])->format('m/d/Y') : '' }}</span>
                </div>
            </div>
        </div>
        @endforeach

        <div style="background: #d8a51a; color: white; padding: 6px; font-weight: bold; margin-top: 10px; font-size: 13px;">
            FOR STORAGE ADMIN USE ONLY
        </div>
        <div style="border: 2px solid #4B0082; padding: 10px; background: #fff; font-size: 12px; margin-bottom: 15px;">
            <div style="margin-bottom: 8px; display: flex; align-items: center;">
                <span style="font-weight: bold; min-width: 140px;">Date Released:</span>
                <span class="print-underline" style="width: 200px; text-align: left;">
                    {{ $item->date_released ? \Carbon\Carbon::parse($item->date_released)->format('m/d/Y') : '' }}
                </span>
            </div>
            <div style="margin-bottom: 8px; display: flex; gap: 20px;">
                <div>
                    <span style="font-weight: bold; margin-right: 10px;">Stock Card Updated:</span>
                    <label><input type="radio" disabled {{ ($item->status ?? '') == 'Yes' ? 'checked' : '' }}> Yes</label>
                    <label style="margin-left: 10px;"><input type="radio" disabled {{ ($item->status ?? '') == 'No' ? 'checked' : '' }}> No</label>
                </div>
            </div>
            <div style="display: flex; align-items: center;">
                <span style="font-weight: bold; min-width: 140px;">Admin Initials:</span>
                <span class="print-underline" style="width: 200px; text-align: left;">{{ $item->admin ?? '' }}</span>
            </div>
        </div>
        </td>
        </tr>
        </tbody>
        </table>
    </div>
</body>

</html>