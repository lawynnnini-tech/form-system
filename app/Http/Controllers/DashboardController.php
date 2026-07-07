<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // ဒီနေရာမှာ dashboard.blade.php ကို ပြပေးမယ်
        return view('dashboard'); 
    }
    
}