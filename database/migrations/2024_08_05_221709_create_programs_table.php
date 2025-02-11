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
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('slug');
            $table->text('desc_singkat');
            $table->longText('detail_program');
            $table->unsignedBigInteger('kategori_id');
            $table->foreign('kategori_id')->references('id')->on('kategoris');
            $table->decimal('kebutuhan', 40, 2);
            $table->decimal('terkumpul', 40, 2)->default(0);
            $table->decimal('sisa', 40, 2);
            $table->enum('tipe_waktu', [0, 1]);
            $table->date('waktu')->nullable();
            $table->string('img');
            $table->string('status')->default('publish');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
