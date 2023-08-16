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
        Schema::create('DaftarKelas', function (Blueprint $table) {
            $table->id();
            $table->string('namakelas')->default(0);
            $table->string('materi')->default(0);
            $table->string('tugas')->default(0);
            $table->string('ujian')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('DaftarKelas');
    }
};
