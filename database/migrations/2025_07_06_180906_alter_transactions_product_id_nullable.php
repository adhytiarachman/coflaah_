<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Schema::table('transactions', function (Blueprint $table) {
            // Ubah kolom product_id menjadi nullable
            $table->unsignedBigInteger('product_id')->nullable()->change();

            // Tambahkan nullOnDelete jika belum ada
            $table->dropForeign(['product_id']); // Hapus FK lama
            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->nullOnDelete(); // FK baru dengan nullOnDelete
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('transactions', function (Blueprint $table) {
            // Rollback: buat kolom jadi wajib lagi
            $table->unsignedBigInteger('product_id')->nullable(false)->change();

            // Hapus FK baru
            $table->dropForeign(['product_id']);
            $table->foreign('product_id')->references('id')->on('products');
        });
    }
};
