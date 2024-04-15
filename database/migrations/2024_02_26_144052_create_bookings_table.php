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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('room_id');
            $table->date('check_in');
            $table->date('check_out');
            $table->string('total_price');
            $table->foreignId('type_payment_id');
            $table->enum('status',['Menunggu Konfirmasi','Disetujui','Ditolak'])->default('Menunggu Konfirmasi');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('restrict');
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade')->onUpdate('restrict');
            $table->foreign('type_payment_id')->references('id')->on('type_payments')->onDelete('cascade')->onUpdate('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
