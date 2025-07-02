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
        Schema::create('mitras', function (Blueprint $table) {
            $table->id();
            $table->string('kode_mitra')->unique();
            $table->string('nama_depan');
            $table->string('nama_belakang');
            $table->string('no_hp');
            $table->string('no_whatsapp')->nullable();
            $table->string('nik')->unique();
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('agama');
            $table->enum('jenis_kelamin', ['Laki - Laki', 'Perempuan']);
            $table->string('alamat')->nullable();
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mitras');
    }
};
