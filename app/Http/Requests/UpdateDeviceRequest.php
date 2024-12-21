<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDeviceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Ganti dengan logika otorisasi sesuai kebutuhan Anda (misalnya, hanya admin yang dapat mengupdate perangkat)
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'device_name' => 'required|string|max:255', // Nama perangkat harus ada dan tidak lebih dari 255 karakter
            'room' => 'required|string|max:255', // Ruang harus ada dan tidak lebih dari 255 karakter
            'room_number' => 'required|numeric|min:1', // Nomor ruang harus ada dan lebih besar dari 0
        ];
    }

    /**
     * Get the validation error messages.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'device_name.required' => 'Nama perangkat harus diisi.',
            'device_name.string' => 'Nama perangkat harus berupa teks.',
            'device_name.max' => 'Nama perangkat tidak boleh lebih dari 255 karakter.',
            'room.required' => 'Ruang harus diisi.',
            'room.string' => 'Ruang harus berupa teks.',
            'room.max' => 'Ruang tidak boleh lebih dari 255 karakter.',
            'room_number.required' => 'Nomor ruang harus diisi.',
            'room_number.numeric' => 'Nomor ruang harus berupa angka.',
            'room_number.min' => 'Nomor ruang harus lebih besar dari 0.',
        ];
    }
}
