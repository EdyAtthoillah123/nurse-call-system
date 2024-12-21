<?php

namespace App\Http\Controllers;
use App\Models\Device;
use App\Models\CallRequest;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Device::with('callRequests')->get();
        return view('dashboard', compact('data'));
    }

    public function getDeviceCalls($id_device)
    {
        // Validasi jika id_device kosong atau tidak valid
        if (!$id_device) {
            return response()->json(['error' => 'ID Device is required'], 400);
        }
    
        // Query data berdasarkan id_device
        $call = CallRequest::with('device')
            ->where('id_device', $id_device)
            ->orderBy('created_at', 'desc')
            ->skip(0) // OFFSET 0
            ->take(1) // LIMIT 1
            ->get();
    
    
        // Return data dalam bentuk JSON
        return response()->json($call);
    }
    


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
