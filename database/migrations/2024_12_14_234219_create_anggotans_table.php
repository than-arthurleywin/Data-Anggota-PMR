<?php

use App\Models\Angkatans;
use App\Models\Jurusan;
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
        Schema::create('anggotans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nis');
            $table->foreignIdFor(Jurusan::class);
            $table->foreignIdFor(Angkatans::class);
            $table->string('telepon');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggotans');
    }
};
