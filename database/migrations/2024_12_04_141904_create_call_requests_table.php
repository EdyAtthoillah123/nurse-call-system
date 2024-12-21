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
        Schema::create('call_requests', function (Blueprint $table) {
            $table->id();                                           // ID otomatis yang auto_increment
            $table->enum('status', ['ON', 'OFF']);                    // Status (ON/OFF)
            $table->string('button_type', 12);                        // Jenis tombol, panjang 12 karakter
            $table->string('id_device', 5);                           // ID perangkat yang terkait
            $table->timestamps();                                    // created_at, updated_at

            // Menambahkan foreign key constraint untuk id_device
            $table->foreign('id_device')->references('id_device')->on('devices')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('call_requests');
    }
};
