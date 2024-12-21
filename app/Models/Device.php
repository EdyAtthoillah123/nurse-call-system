<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    /** @use HasFactory<\Database\Factories\DeviceFactory> */
    use HasFactory;

    // Menentukan nama tabel jika tidak mengikuti konvensi
    protected $table = 'devices';

    // Menentukan kolom yang bisa diisi (mass assignable)
    protected $fillable = [
        'id_device',
        'device_name',
        'room',
        'room_number',
    ];

    // Relasi: Device memiliki banyak CallRequest
    public function callRequests()
    {
        return $this->hasMany(CallRequest::class, 'id_device', 'id_device');
    }
}
