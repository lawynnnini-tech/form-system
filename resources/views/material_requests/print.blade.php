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
            margin: 15mm 15mm 20mm 15mm; /* Top, Right, Bottom, Left */
        }

        body { 
            background: #f3f4f6; 
            font-family: Arial, sans-serif; 
            margin: 0;
            padding: 0;
            -webkit-print-color-adjust: exact !important; 
            print-color-adjust: exact !important;
        }
        
        .print-container { 
            width: 210mm;
            margin: 20px auto; 
            background: white; 
            padding: 15mm; 
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            box-sizing: border-box;
        }

        /* ------------------ MAIN CONTAINER TABLE ------------------ */
        .outer-print-table {
            width: 100%;
            border-collapse: collapse;
            border: none !important;
        }
        .outer-print-table > thead > tr > td,
        .outer-print-table > tfoot > tr > td,
        .outer-print-table > tbody > tr > td {
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

        .print-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-top: 1px solid #000;
            padding-top: 8px;
            font-family: 'Times New Roman', Times, serif;
            font-size: 14px;
            margin-top: 15px;
            width: 100%;
        }

        /* ------------------ FORM CONTENT DESIGN ------------------ */
        .main-title { font-size: 24px; font-weight: bold; color: #4B0082; text-align: center; margin-top: 10px; }
        .sub-title { font-style: italic; color: #555; text-align: center; margin-bottom: 15px; }

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

        .row-highlight { background-color: #f5f5c4; }

        .purpose-table {
            width: 100%;
            border: 3px solid #b3a9dd; 
            background-color: #fff;
            border-collapse: collapse;
        }
        .purpose-table td { border-bottom: 1px solid #d3d3d3; height: 35px; padding: 8px; }
        .purpose-table .last-row td { border-bottom: 2px solid #e4ce0c; }

        .resources-table { text-align: center; width: 100%; border-collapse: collapse; }
        .resources-table th { background-color: #7d1cc2; color: white; padding: 10px; border: 1px solid #dbd8d8; }
        .resources-table td { height: 35px; background-color: #ffffff; border: 1px solid #c0c0c0; }
        .resources-table tbody tr:nth-child(even) td { background-color: #f5f5c4; }

        /* ------------------ PRINT MEDIA TARGETING ------------------ */
        @media print {
            body { background: none; }
            .no-print { display: none; }
            .print-container { 
                width: 100%;
                margin: 0; 
                padding: 0;
                box-shadow: none;
            }
            
            /* Dynamic Multi-page numbering (Page X of Y) */
            .print-page-number::after {
                content: "Page " counter(page) " of " counter(pages);
            }
        }
    </style>
</head>
<body>

    <div class="max-w-6xl mx-auto my-4 flex justify-between no-print px-4" style="width: 210mm; margin: 20px auto;">
        <div></div>
        <button onclick="window.print()" style="background: #2563eb; color: white; padding: 10px 25px; border: none; border-radius: 4px; font-weight: bold; cursor: pointer;">
            🖨 Print Now
        </button>
    </div>

    <div class="print-container">
        
        <table class="outer-print-table">
            
            <thead>
                <tr>
                    <td>
                        <div style="display: flex; justify-content: flex-start; margin-bottom: 15px;">
                            <img src="{{ asset('images/iam.png') }}" alt="I.A.M Logo" style="width: 90px; height: auto; object-fit: contain;">
                        </div>

                        <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 10px;">
                            <div class="school-name">
                                I.A.M International School
                            </div>

                            <div class="form-meta">
                                <div>
                                    <span style="margin-right: 5px;">Form No:</span>
                                    <span class="print-underline" style="min-width: 70px;">{{ $item->form_no }}</span>
                                </div>
                                <div>
                                    <span style="margin-right: 5px;">Date:</span>
                                    <span class="print-underline" style="min-width: 110px;">{{ $item->request_date ? \Carbon\Carbon::parse($item->request_date)->format('d/m/Y') : '' }}</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="gold-line" style="margin-bottom: 15px;"></div>
                    </td>
                </tr>
            </thead>

            <tfoot>
                <tr>
                    <td>
                        <div class="print-footer">
                            <div style="font-style: italic;">
                                Confidential - For Internal Use Only - I.A.M International School
                            </div>
                            <div class="print-footer-page">
                                <span class="print-page-number" style="font-weight: normal;"></span>
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
                                <td><span style="font-weight: normal;">{{ $item->request_date }}</span></td>
                            </tr>
                            <tr class="row-highlight">
                                <td class="label">Date Needed By</td>
                                <td><span style="font-weight: normal;">{{ $item->need_date ?? 'N/A' }}</span></td>
                            </tr>
                        </table>

                        <div class="section-title">SECTION B — MATERIAL DETAILS</div><br>
                        <table class="resources-table">
                            <thead>
                                <tr>
                                    <th>Item Description</th>
                                    <th>Quantity</th>
                                    <th>Unit</th>
                                    <th>Remarks</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for($i=0; $i<4; $i++)
                                    @php $rowItem = isset($item->items[$i]) ? $item->items[$i] : null; @endphp
                                    <tr>
                                        <td>{{ $rowItem['desc'] ?? '' }}</td>
                                        <td>{{ $rowItem['qty'] ?? '' }}</td>
                                        <td>{{ $rowItem['unit'] ?? '' }}</td>
                                        <td>{{ $rowItem['remarks'] ?? '' }}</td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>

                        <div class="section-title">SECTION C — PURPOSE / JUSTIFICATION</div><br>
                        <table class="purpose-table">
                            @for($i=0; $i<5; $i++)
                                @php 
                                    $purposes = is_array($item->purpose) ? $item->purpose : json_decode($item->purpose, true) ?? [$item->purpose];
                                @endphp
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
                                        <span class="print-underline" style="flex: 1; text-align: left;">{{ $sigData['date'] ?? '' }}</span>
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
                                <span class="print-underline" style="width: 200px; text-align: left;">{{ $item->date_released ?? '' }}</span>
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