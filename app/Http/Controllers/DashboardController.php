<?php

namespace App\Http\Controllers;

use App\Models\EventRequest;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalRequests = EventRequest::count();

        $approved = EventRequest::where('status', 'Approved')->count();

        $rejected = EventRequest::where('status', 'Rejected')->count();

        $pending = EventRequest::whereNull('status')->count();

        $recentRequests = EventRequest::latest()->take(5)->get();

        return view('dashboard', compact(
            'totalRequests',
            'approved',
            'rejected',
            'pending',
            'recentRequests'
        ));
    }
}