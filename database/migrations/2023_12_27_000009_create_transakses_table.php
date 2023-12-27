<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transakses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('tanggal');
            $table->double('total_harga');
            $table->enum('metode_pembayaran', ['Cash', 'Qris']);
            $table->text('keterangan');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transakses');
    }
};
