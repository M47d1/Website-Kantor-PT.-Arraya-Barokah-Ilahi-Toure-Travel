<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Tambahkan kolom `diambil` bertipe boolean ke tabel `mitras`.
     */
    public function up(): void
    {
        Schema::table('mitras', function (Blueprint $table) {
            // Tambahkan kolom diambil setelah kolom kode_mitra, default false (belum diambil)
            $table->boolean('diambil')->default(false)->after('kode_mitra');
        });
    }

    /**
     * Rollback perubahan: hapus kolom `diambil` jika ada.
     */
    public function down(): void
    {
        Schema::table('mitras', function (Blueprint $table) {
            if (Schema::hasColumn('mitras', 'diambil')) {
                $table->dropColumn('diambil');
            }
        });
    }
};
