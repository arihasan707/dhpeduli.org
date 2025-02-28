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
        Schema::create('berita_umums', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('prog_id');
            $table->foreign('prog_id')->references('id')->on('programs');
            $table->string('judul');
            $table->string('slug');
            $table->longText('isi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berita_umums');
    }
};