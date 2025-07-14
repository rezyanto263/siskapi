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
        Schema::create('kegiatan', function (Blueprint $table) {
            $table->uuid()->primary();
            $table->char('mahasiswa_id', 36);
            $table->string('nama', 100);
            $table->string('sertifikat', 200);
            $table->char('poin_id', 36);
            $table->string('status', 50);
            $table->timestamps();

            $table->foreign('mahasiswa_id')->references('user_id')->on('mahasiswa');
            $table->foreign('poin_id')->references('id')->on('poin');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kegiatan');
    }
};
