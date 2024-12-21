<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->string('id_device', 5)->primary();        // ID perangkat, dengan panjang 5 karakter
            $table->string('device_name', 50);                 // Nama perangkat
            $table->string('room', 50);                        // Nama ruangan
            $table->integer('room_number');                    // Nomor ruangan
            $table->timestamps();                              // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devices');
    }
};
