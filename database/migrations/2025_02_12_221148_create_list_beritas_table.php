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
        Schema::create('list_beritas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('berita_penyaluran_id')->nullable();
            $table->foreign('berita_penyaluran_id')->references('id')->on('berita_penyalurans');
            $table->string('judul')->nullable();
            $table->longText('ket')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('list_beritas');
    }
};
