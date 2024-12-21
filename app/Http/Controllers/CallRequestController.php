<?php

namespace App\Http\Controllers;

use App\Models\CallRequest;
use App\Http\Requests\StoreCallRequestRequest;
use App\Http\Requests\UpdateCallRequestRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;


class CallRequestController extends Controller {
    /**
    * Display a listing of the resource.
    */

    public function index() {
        //
    }

    /**
    * Show the form for creating a new resource.
    */

    public function create() {
        //
    }

    /**
    * Store a newly created resource in storage.
    */
    public function getStatus()
    {
    
        // Query data berdasarkan id_device
        $call = CallRequest::orderBy('created_at', 'desc')
            ->skip(0) // OFFSET 0
            ->take(1) // LIMIT 1
            ->get();
    
        // Return data dalam bentuk JSON
        return response()->json($call);
    }

    public function store(Request $request)
    {
        try {
            $data = $request->all();
    
            // Menampilkan data yang diterima di log
            \Log::info('Data received: ', $data);
    
            // Validasi data input
            if (!isset($data['id_device'], $data['button_type'], $data['status'])) {
                \Log::warning('Invalid data. Missing fields');
                return response()->json(['message' => 'Invalid data. Missing fields.'], 400);
            }
    
            // Pastikan nilai valid jika diperlukan
            if (!in_array($data['status'], ['ON', 'OFF'])) {
                \Log::warning('Invalid status value: ' . $data['status']);
                return response()->json(['message' => 'Invalid status value.'], 400);
            }
    
            // Cek jika data sudah ada di database
            \Log::info('Checking if data already exists in the database.');
    
            // Simpan data ke database
            $callRequest = CallRequest::create([
                'id_device' => $data['id_device'],
                'button_type' => $data['button_type'],
                'status' => $data['status'],
            ]);
    
            // Log keberhasilan penyimpanan data
            \Log::info('Data saved successfully: ', $callRequest->toArray());
    
            // Kirim respons sukses dengan data
            return response()->json([
                'message' => 'Success',
                'data' => $callRequest
            ], 200);
        } catch (\Exception $e) {
            // Menangani error yang terjadi
            \Log::error('Error in /call-requests: ' . $e->getMessage());
            \Log::error($e->getTraceAsString()); // Menambahkan trace untuk detail lebih lanjut
    
            // Menyampaikan kesalahan kepada pengguna
            return response()->json([
                'message' => 'Server Error',
                'error' => $e->getMessage()
            ], 500);
        }
    }   
     

    public function getCsrfToken(Request $request)
    {
        return response()->json([
            'csrf_token' => csrf_token(),
        ]);
    }
    

    /**
    * Display the specified resource.
    */

    public function show( CallRequest $callRequest ) {
        //
    }

    /**
    * Show the form for editing the specified resource.
    */

    public function edit( CallRequest $callRequest ) {
        //
    }

    /**
    * Update the specified resource in storage.
    */

    public function update( UpdateCallRequestRequest $request, CallRequest $callRequest ) {
        //
    }

    /**
    * Remove the specified resource from storage.
    */

    public function destroy( CallRequest $callRequest ) {
        //
    }
}
