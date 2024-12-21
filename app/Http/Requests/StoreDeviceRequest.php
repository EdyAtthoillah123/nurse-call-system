<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDeviceRequest extends FormRequest
{
    /**
     * Tentukan apakah pengguna diizinkan untuk melakukan permintaan ini.
     */
    public function authorize(): bool
    {
        return true; // Atur sesuai dengan kebijakan otorisasi aplikasi
    }

    /**
     * Mendapatkan aturan validasi yang berlaku untuk permintaan ini.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'id_device'   => 'required|string|max:5|unique:devices,id_device', // ID perangkat, harus unik
            'device_name' => 'required|string|max:50',  // Nama perangkat
            'room'        => 'required|string|max:50',  // Nama ruangan
            'room_number' => 'required|integer',        // Nomor ruangan
        ];
    }

    /**
     * Mendapatkan pesan kustom untuk aturan validasi.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'id_device.required' => 'ID perangkat wajib diisi.',
            'id_device.max'      => 'ID perangkat tidak boleh lebih dari 5 karakter.',
            'id_device.unique'   => 'ID perangkat sudah terdaftar.',
            'device_name.required' => 'Nama perangkat wajib diisi.',
            'device_name.max'      => 'Nama perangkat tidak boleh lebih dari 50 karakter.',
            'room.required'        => 'Nama ruangan wajib diisi.',
            'room.max'             => 'Nama ruangan tidak boleh lebih dari 50 karakter.',
            'room_number.required' => 'Nomor ruangan wajib diisi.',
            'room_number.integer'  => 'Nomor ruangan harus berupa angka.',
        ];
    }
}
