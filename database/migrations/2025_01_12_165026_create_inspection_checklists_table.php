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
        Schema::create('inspection_checklists', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('transaksi_id');
            $table->uuid('komponen_id');
            $table->enum('kondisi_masuk', ['Baik', 'Rusak', 'Hilang', 'Tergores']);
            $table->enum('kondisi_keluar', ['Baik', 'Rusak', 'Hilang', 'Tergores']);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('transaksi_id')->references('id')->on('rental_transactions');
            $table->foreign('komponen_id')->references('id')->on('components');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inspection_checklists');
    }
};
