<?php
namespace App\Http\Controllers;

use App\Models\MaterialRequest;
use Illuminate\Http\Request;

class MaterialRequestController extends Controller
{
    public function index() {
        $material_requests = MaterialRequest::latest()->get();
        return view('material_requests.index', compact('material_requests'));
    }

    public function edit($id)
{
    $materialRequest = MaterialRequest::findOrFail($id);
    return view('material_requests.edit', compact('materialRequest'));
}

public function update(Request $request, $id)
{
    $materialRequest = MaterialRequest::findOrFail($id);
    
    $materialRequest->update($request->all());
    
    return redirect()->route('material-requests.index')->with('success', 'Data ပြင်ဆင်ပြီးပါပြီ။');
}

    public function create() {
        return view('material_requests.create');
    }

    public function store(Request $request) {
        
        MaterialRequest::create($request->all());
        return redirect()->route('material-requests.index')->with('success', 'သိမ်းဆည်းပြီးပါပြီ။');
    }


    // app/Http/Controllers/MaterialRequestController.php

public function destroy($id)
{
    $materialRequest = MaterialRequest::findOrFail($id);
    $materialRequest->delete();

    return redirect()->route('material-requests.index')->with('success', 'Deleted successfully!');
}

public function print($id)
    {
        
        $item = MaterialRequest::findOrFail($id);

        
        return view('material_requests.print', compact('item'));
    }
}