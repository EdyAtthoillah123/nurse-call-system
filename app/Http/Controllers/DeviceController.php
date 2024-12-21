<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Http\Requests\StoreDeviceRequest;
use App\Http\Requests\UpdateDeviceRequest;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreDeviceRequest $request)
    {
        // Validasi sudah dilakukan oleh StoreDeviceRequest, kita langsung simpan data
        $device = Device::create([
            'id_device'   => $request->id_device,
            'device_name' => $request->device_name,
            'room'        => $request->room,
            'room_number' => $request->room_number,
        ]);

        // Mengembalikan respons setelah perangkat disimpan
        return redirect()->back()->with('success', 'Perangkat berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Device $device)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Device $device)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDeviceRequest $request, $id_device)
    {
        // Validasi dan update data perangkat
        $device = Device::where('id_device', $request->id_device)->first();
        $device->where('id_device', $request->id_device)->update([
            'device_name' => $request->device_name,
            'room' => $request->room,
            'room_number' => $request->room_number,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Perangkat berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_device)
    {
        // Hapus perangkat berdasarkan id_device
        $device = Device::where('id_device', $id_device)->first();
        
        // Hapus perangkat
        $device->where('id_device', $id_device)->delete();
    
        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Perangkat berhasil dihapus!');
    }    
}
