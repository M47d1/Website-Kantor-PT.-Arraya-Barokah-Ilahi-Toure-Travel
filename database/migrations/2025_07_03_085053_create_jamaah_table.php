<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('jamaah', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('nik')->unique();
            $table->string('foto_ktp')->nullable();
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('no_paspor')->nullable();
            $table->string('foto_paspor')->nullable();
            $table->text('alamat');
            $table->string('no_hp');
            $table->string('foto')->nullable(); // Foto jamaah
            $table->string('foto_kk')->nullable(); // Kartu Keluarga
            $table->string('foto_akta_lahir')->nullable(); // Akta Kelahiran
            $table->foreignId('mitra_id')->nullable()->constrained('mitras')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jamaah');
    }
};
