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
        Schema::create('skpi', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->char('mahasiswa_id', 36);
            $table->char('kepala_prodi_id', 36);
            $table->string('nomor', 50)->nullable();
            $table->string('link', 200);
            $table->string('status', 50);
            $table->timestamps();

            $table->foreign('mahasiswa_id')->references('user_id')->on('mahasiswa');
            $table->foreign('kepala_prodi_id')->references('user_id')->on('kepala_prodi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skpi');
    }
};
