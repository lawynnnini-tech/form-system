@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<style>
    body {
        background: #f3f4f6;
        font-family: Arial, sans-serif;
    }

    .dashboard-container {
        max-width: 1200px;
        margin: auto;
        padding: 20px;
    }

    .title {
        font-size: 28px;
        font-weight: bold;
        color: #2d1b69;
        margin-bottom: 20px;
        border-left: 5px solid #e4ce0c;
        padding-left: 10px;
    }

    /* Cards */
    .card-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 15px;
        margin-bottom: 25px;
    }

    .card {
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        border-left: 5px solid #4B0082;
        transition: 0.3s;
    }

    .card:hover {
        transform: translateY(-3px);
    }

    .card h2 {
        font-size: 18px;
        margin-bottom: 10px;
        color: #555;
    }

    .card p {
        font-size: 26px;
        font-weight: bold;
        color: #2d1b69;
    }

    /* Table */
    .table-container {
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th {
        background: #4B0082;
        color: white;
        padding: 12px;
        text-align: left;
    }

    td {
        padding: 12px;
        border-bottom: 1px solid #ddd;
    }

    tr:hover {
        background: #f9f9f9;
    }

    .status {
        padding: 5px 10px;
        border-radius: 5px;
        font-size: 12px;
        font-weight: bold;
        color: white;
    }

    .approved { background: green; }
    .rejected { background: red; }
    .pending { background: orange; }

    @media(max-width: 900px) {
        .card-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media(max-width: 500px) {
        .card-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="dashboard-container">

    <div class="title">📊  Dashboard</div>

    <!-- CARDS -->
    <div class="card-grid">

        <div class="card">
            <h2>Total Requests</h2>
            <p>{{ $totalRequests }}</p>
        </div>

        <div class="card">
            <h2>Approved</h2>
            <p>{{ $approved }}</p>
        </div>

        <div class="card">
            <h2>Rejected</h2>
            <p>{{ $rejected }}</p>
        </div>

    </div>

    <!-- TABLE -->
    <div class="table-container">

        <h3 style="margin-bottom: 10px;">📝 Recent Requests</h3>

        <table>
            <thead>
                <tr>
                    <th>Form No</th>
                    <th>Requester</th>
                    <th>Event Title</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                @foreach($recentRequests as $req)
                <tr>
                    <td>{{ $req->form_no }}</td>
                    <td>{{ $req->requester_name }}</td>
                    <td>{{ $req->event_title }}</td>
                    <td>
                        @if($req->status == 'Approved')
                            <span class="status approved">Approved</span>
                        @elseif($req->status == 'Rejected')
                            <span class="status rejected">Rejected</span>
                        @else
                            <span class="status pending">Pending</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>

    </div>

</div>

@endsection