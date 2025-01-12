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
        Schema::create('damage_conditions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('transaksi_id');
            $table->enum('posisi', ['Depan', 'Belakang', 'Kanan', 'Kiri', 'Atas', 'Bawah']);
            $table->enum('kondisi_masuk', ['Baret', 'Penyok', 'Retak', 'Pecah']);
            $table->enum('kondisi_keluar', ['Baret', 'Penyok', 'Retak', 'Pecah']);
            $table->text('catatan_masuk')->nullable();
            $table->text('catatan_keluar')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('transaksi_id')->references('id')->on('rental_transactions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demage_conditions');
    }
};
