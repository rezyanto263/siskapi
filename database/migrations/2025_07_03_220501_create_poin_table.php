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
        Schema::create('poin', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->unsignedTinyInteger('poin');
            $table->char('posisi_kegiatan_id', 36);
            $table->char('tingkat_kegiatan_id', 36);
            $table->char('jenis_kegiatan_id', 36);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('posisi_kegiatan_id')->references('id')->on('posisi_kegiatan');
            $table->foreign('tingkat_kegiatan_id')->references('id')->on('tingkat_kegiatan');
            $table->foreign('jenis_kegiatan_id')->references('id')->on('jenis_kegiatan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('poin');
    }
};
