<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('rental_transactions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('pelanggan_id');
            $table->uuid('pengemudi_id')->nullable();
            $table->uuid('kendaraan_id');
            $table->dateTime('tanggal_mulai');
            $table->integer('mulai_km');
            $table->dateTime('tanggal_akhir')->nullable();
            $table->integer('akhir_km')->nullable();
            $table->enum('bahan_bakar_habis', ['Penuh', 'Setengah', 'Kosong']);
            $table->enum('bahan_bakar_masuk', ['Penuh', 'Setengah', 'Kosong']);
            $table->text('note')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('pelanggan_id')->references('id')->on('customers');
            $table->foreign('pengemudi_id')->references('id')->on('drivers');
            $table->foreign('kendaraan_id')->references('id')->on('vehicles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rental_transactions');
    }
};
