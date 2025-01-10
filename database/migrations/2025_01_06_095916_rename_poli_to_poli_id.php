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
        Schema::table('daftars', function (Blueprint $table) {
            $table->renameColumn('poli', 'poli_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('daftars', function (Blueprint $table) {
            $table->renameColumn('poli', 'poli_id');
        });
    }
};
