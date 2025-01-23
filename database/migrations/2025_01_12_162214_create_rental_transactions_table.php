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
            $table->dateTime('tanggal_mulai')->nullable();
            $table->dateTime('tanggal_rencana_kembali')->nullable();
            $table->integer('mulai_km')->nullable();
            $table->dateTime('tanggal_kembali')->nullable();
            $table->integer('akhir_km')->nullable();
            $table->string('bahan_bakar_habis')->nullable();
            $table->string('bahan_bakar_masuk')->nullable();
            $table->text('note')->nullable();
            $table->string('out_foto_depan')->nullable();
            $table->string('out_foto_belakang')->nullable();
            $table->string('out_foto_kanan')->nullable();
            $table->string('out_foto_kiri')->nullable();
            $table->string('out_demage_note')->nullable();
            $table->string('back_foto_depan')->nullable();
            $table->string('back_foto_belakang')->nullable();
            $table->string('back_foto_kanan')->nullable();
            $table->string('back_foto_kiri')->nullable();
            $table->string('back_demage_note')->nullable();
            $table->boolean('status_rental')->default(0);
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
