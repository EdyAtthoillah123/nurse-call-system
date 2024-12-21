<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CallRequest extends Model
{
    use HasFactory;

    protected $table = 'call_requests';

    // Menentukan kolom yang bisa diisi (mass assignable)
    protected $fillable = ['id_device', 'button_type', 'status'];

    // Relasi: CallRequest belongs to Device
    public function device()
    {
        return $this->belongsTo(Device::class, 'id_device', 'id_device');
    }
}
