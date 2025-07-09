<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends \Illuminate\Database\Migrations\Migration
{
    public function up(): void
    {
        Schema::table('jamaah', function (Blueprint $table) {
            if (!Schema::hasColumn('jamaah', 'no_paspor')) {
                $table->string('no_paspor')->nullable();
            }
            if (!Schema::hasColumn('jamaah', 'foto_paspor')) {
                $table->string('foto_paspor')->nullable();
            }
            if (!Schema::hasColumn('jamaah', 'tanggal_buat_paspor')) {
                $table->date('tanggal_buat_paspor')->nullable();
            }
            if (!Schema::hasColumn('jamaah', 'tanggal_habis_paspor')) {
                $table->date('tanggal_habis_paspor')->nullable();
            }
            if (!Schema::hasColumn('jamaah', 'lokasi_buat_paspor')) {
                $table->string('lokasi_buat_paspor')->nullable();
            }
        });
        
    }

    public function down(): void
    {
        Schema::table('jamaah', function (Blueprint $table) {
            $table->dropColumn([
                'no_paspor',
                'foto_paspor',
                'tanggal_buat_paspor',
                'tanggal_habis_paspor',
                'lokasi_buat_paspor',
            ]);
        });
    }
};
