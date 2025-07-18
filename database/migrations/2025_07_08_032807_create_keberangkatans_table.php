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
        Schema::create('keberangkatans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_berangkat');
            $table->string('nama_paket');
            $table->string('gelombang');
            $table->string('status')->default('Dijadwalkan');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keberangkatans');
    }
};
