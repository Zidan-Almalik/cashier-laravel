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
        Schema::table('jenis', function (Blueprint $table) {
            $table
                ->foreign('kategori_id')
                ->references('id')
                ->on('kategoris')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jenis', function (Blueprint $table) {
            $table->dropForeign(['kategori_id']);
        });
    }
};
