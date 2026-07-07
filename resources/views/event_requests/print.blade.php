<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Print Event Request - {{ $eventRequest->form_no }}</title>
    <style>
        /* အခြေခံအချက်အလက်များ - A4 Size အတွက် */
        @page {
            size: A4;
            margin: 20mm;
        }
        @media print {
            body { 
                background: white !important; 
                -webkit-print-color-adjust: exact !important; /* Chrome, Safari, Edge တို့မှာ အရောင်တွေအတိုင်း ထွက်လာစေရန် */
                print-color-adjust: exact !important;         /* Firefox အတွက် */
            }
            .no-print { display: none !important; } /* Print ထုတ်ရင် မပါချင်တဲ့အရာများအတွက် */
        }

        body { background: #f3f4f6; font-family: Arial, sans-serif; padding: 20px; margin: 0; color: #000; }
        .form-container { width: 100%; max-width: 1000px; margin: 0 auto; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); }

        /* Header & Title Design */
        .header-wrapper { display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px; }
        .school-name { font-size: 20px; font-weight: bold; color: #4B0082; }
        .form-meta { display: flex; gap: 15px; }
        .gold-line { border-top: 2px solid #e4ce0c; margin: 15px 0; }
        .main-title { font-size: 24px; font-weight: bold; color: #4B0082; text-align: center; }
        .sub-title { font-style: italic; color: #555; text-align: center; margin-bottom: 10px; }

        /* Sections */
        .section-title { 
            color: #4B0082; 
            padding: 10px 0; 
            font-weight: bold; 
            margin-top: 20px; 
            text-transform: uppercase;
            border-bottom: 2px solid #9370DB; 
        }

        /* Table & Layout */
        table { width: 100%; border-collapse: collapse; border: 1px solid #dbd8d8; margin-top: 10px; }
        td { padding: 10px; border: 1px solid #c0c0c0; vertical-align: middle; }
        
        .label {
            width: 300px;
            background-color: #f8f1fc; 
            color: #4B0082;            
            font-weight: bold;
        }

        .row-highlight { background-color: #f5f5c4; }
        .value-text { font-size: 15px; font-weight: 500; color: #000; }

        /* Checkbox groups styling */
        .check-group { display: flex; flex-wrap: wrap; gap: 15px; }
        .check-item { display: flex; align-items: center; gap: 5px; }

        /* Section C Purpose Specifics */
        .purpose-box {
            width: 100%;
            min-height: 120px;
            border: 3px solid #b3a9dd;
            background-color: #fff;
            padding: 15px;
            box-sizing: border-box;
            font-size: 15px;
            line-height: 1.6;
        }

        /* Section D Resources Table */
        .resources-table { width: 100%; border-collapse: collapse; border: 1px solid #dbd8d8; }
        .resources-table th { background-color: #7d1cc2; color: white; padding: 12px; border: 1px solid #dbd8d8; }
        .resources-table td { border: 1px solid #dbd8d8; height: 35px; padding: 8px; background-color: #ffffff; }
        .resources-table tbody tr:nth-child(even):not(.total-row) td { background-color: #f5f5c4; }
        .resources-table tbody tr.total-row td { background-color: #f8f1fc !important; font-weight: bold; }

        /* Print Button Floating */
        .print-btn-container { text-align: right; max-width: 1000px; margin: 0 auto 15px auto; }
        .btn-print { background: #4B0082; color: white; padding: 10px 25px; border: none; border-radius: 5px; font-weight: bold; cursor: pointer; box-shadow: 0 2px 5px rgba(0,0,0,0.2); }
    </style>
</head>
<body>

    <div class="print-btn-container no-print">
        <button onclick="window.print();" class="btn-print">🖨️ Print Form</button>
    </div>

    <div class="form-container">
        
        <div class="header-wrapper">
            <div class="school-name">I.A.M INTERNATIONAL SCHOOL</div>
            <div class="form-meta">
                <div><strong>Form No:</strong> <span class="value-text" style="border-bottom: 1px solid #000; padding: 0 10px;">{{ $eventRequest->form_no }}</span></div>
                <div><strong>Date:</strong> <span class="value-text" style="border-bottom: 1px solid #000; padding: 0 10px;">{{ $eventRequest->date_issued }}</span></div>
            </div>
        </div>
        
        <div class="gold-line"></div>
        <div class="main-title">EVENT / ACTIVITY REQUEST FORM</div>
        <div class="sub-title">Request to Organize or Conduct an Event / Activity</div>
        <div class="gold-line"></div>

        <div class="section-title">SECTION A — REQUESTER INFORMATION</div>
        <table>
            <tr>
                <td class="label">Name of Requester / Organizer</td>
                <td class="value-text">{{ $eventRequest->requester_name }}</td>
            </tr>
            <tr class="row-highlight">
                <td class="label">Department / Role</td>
                <td>
                    <div class="check-group">
                        <span class="value-text">✔ {{ $eventRequest->department }}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="label">Contact Number / Email</td>
                <td class="value-text">{{ $eventRequest->contact }}</td>
            </tr>
            <tr class="row-highlight">
                <td class="label">Date of Request</td>
                <td class="value-text">{{ $eventRequest->request_date }}</td>
            </tr>
        </table>

        <div class="section-title">SECTION B — EVENT DETAILS</div>
        <table>
            <tr>
                <td class="label">Event / Activity Title</td>
                <td class="value-text">{{ $eventRequest->event_title }}</td>
            </tr>
            <tr class="row-highlight">
                <td class="label">Type of Event</td>
                <td class="value-text">✔ {{ $eventRequest->event_type }}</td>
            </tr>
            <tr>
                <td class="label">Proposed Date(s)</td>
                <td class="value-text">{{ $eventRequest->proposed_date }}</td>
            </tr>
            <tr class="row-highlight">
                <td class="label">Start | End Time</td>
                <td class="value-text">Start: {{ $eventRequest->start_time }} &nbsp;&nbsp;|&nbsp;&nbsp; End: {{ $eventRequest->end_time }}</td>
            </tr>
            <tr>
                <td class="label">Venue / Location</td>
                <td class="value-text">{{ $eventRequest->venue }}</td>
            </tr>
            <tr class="row-highlight">
                <td class="label">Expected Participants</td>
                <td class="value-text">{{ $eventRequest->participants }}</td>
            </tr>
            <tr>
                <td class="label">Target Audience</td>
                <td>
                    <div class="check-group">
                        @if(is_array($eventRequest->audience))
                            @foreach($eventRequest->audience as $audience)
                                <span class="value-text">[✓] {{ $audience }}</span>
                            @endforeach
                        @else
                            <span class="value-text">{{ $eventRequest->audience }}</span>
                        @endif
                    </div>
                </td>
            </tr>
        </table>
        
        <div class="section-title">SECTION C — PURPOSE / OBJECTIVES</div>
        <div style="margin-top: 10px;">
            <div class="purpose-box">
                {!! nl2br(e($eventRequest->purpose ?? 'N/A')) !!}
            </div>
        </div>

        <div class="section-title">SECTION D — RESOURCES NEEDED</div>
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
                @if(isset($eventRequest->items) && count($eventRequest->items) > 0)
                    @foreach($eventRequest->items as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->source }}</td>
                        <td>{{ $item->cost }}</td>
                    </tr>
                    @endforeach
                @else
                    <tr>
                        <td>{{ $eventRequest->resource_item ?? '-' }}</td>
                        <td>{{ $eventRequest->resource_qty ?? '-' }}</td>
                        <td>{{ $eventRequest->resource_source ?? '-' }}</td>
                        <td>{{ $eventRequest->resource_cost ?? '-' }}</td>
                    </tr>
                @endif
                <tr class="total-row">
                    <td colspan="3" style="text-align: right; font-weight: bold; color: #4B0082;">TOTAL ESTIMATED COST</td>
                    <td>{{ $eventRequest->total_cost ?? '-' }}</td>
                </tr>
            </tbody>
        </table>

        <div class="section-title">SECTION E — LOGISTICS & SUPPORT REQUIRED</div>
        <div style="padding:15px; display:grid; grid-template-columns: 1fr 1fr; gap:10px;">
            @if(is_array($eventRequest->logistics))
                @foreach($eventRequest->logistics as $logistic)
                    <span class="value-text">[✓] {{ ucfirst($logistic) }}</span>
                @endforeach
            @else
                <span class="value-text">{{ $eventRequest->logistics ?? 'None' }}</span>
            @endif
        </div>

        <div class="section-title">SECTION F — SIGNATURES & APPROVAL</div>
        <div style="padding: 10px; font-style: italic; border-left: 4px solid #e4ce0c; background: #f9f9f9; margin-bottom: 15px; margin-top: 10px;">
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
            <div style="width: 30%; background: #f8f1fc; padding: 12px; font-weight: bold; color: #1e134d; display: flex; align-items: center; border-right: 1px solid #dbd8d8;">
                {{ $role }}
            </div>
            <div style="width: 70%; padding: 10px; display: flex; flex-direction: column; gap: 8px; background: white; border-bottom: 2px solid #e4ce0c;">
                <div style="display: flex; align-items: center; height: 25px;">
                    <span style="width: 90px; font-size: 14px;">Name (Print):</span>
                    <span style="border-bottom: 1px dotted #000; flex: 1; height: 20px;"></span>
                </div>
                <div style="display: flex; align-items: center; height: 25px;">
                    <span style="width: 90px; font-size: 14px;">Signature:</span>
                    <span style="border-bottom: 1px dotted #000; flex: 1; height: 20px;"></span>
                </div>
                <div style="display: flex; align-items: center; height: 25px;">
                    <span style="width: 90px; font-size: 14px;">Date:</span>
                    <span style="border-bottom: 1px dotted #000; flex: 1; height: 20px;"></span>
                </div>
            </div>
        </div>
        @endforeach

        <div style="background: #d8a51a; color: white; padding: 10px; font-weight: bold; margin-top: 15px;">
            FOR OFFICE USE ONLY
        </div>
        <div style="border: 2px solid #4B0082; padding: 15px; background: #fff;">
            <div style="margin-bottom: 15px; display: flex; gap: 20px;">
                <span class="value-text">Status: [  ] Approved &nbsp;&nbsp;&nbsp; [  ] Disapproved</span>
            </div>
            <div style="margin-bottom: 15px; display: flex; align-items: center;">
                <span style="margin-right: 10px; font-weight: bold;">Reference No.:</span>
                <span style="border-bottom: 1px solid #000; flex: 1;" class="value-text">{{ $eventRequest->ref_no }}</span>
            </div>
            <div style="display: flex; align-items: center;">
                <span style="margin-right: 10px; font-weight: bold;">Remarks:</span>
                <span style="border-bottom: 1px solid #000; flex: 1;" class="value-text">{{ $eventRequest->remarks }}</span>
            </div>
        </div>

    </div>

    <script>
    // Page တစ်ခုလုံး (CSS, Images ရော) သေချာ Loading တက်ပြီးမှ Print Window ကို ဖွင့်ခိုင်းတာပါ
    window.addEventListener('DOMContentLoaded', (event) => {
        setTimeout(function() {
            window.print();
        }, 500); // 0.5 စက္ကန့် စောင့်ပြီးမှ တက်လာပါမယ်
    });
</script>
</body>
</html>