<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
 {
    Schema::create('deadlines', function (Blueprint $table) {
        $table->id();
        $table->foreignId('matkul_id')->constrained()->onDelete('cascade');
        $table->foreignId('jadwal_id')->nullable()->constrained()->onDelete('cascade');
        $table->string('judul_tugas');
        $table->date('tanggal_deadline');
        $table->boolean('notif_h1')->default(false);
        $table->text('deskripsi')->nullable();
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deadlines');
    }
};
