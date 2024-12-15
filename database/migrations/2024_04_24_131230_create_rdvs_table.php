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
        Schema::disableForeignKeyConstraints();
        Schema::create('rdvs', function (Blueprint $table) {
            $table->unsignedInteger('idRDV')->primary();
            $table->date('dateRDV');
            $table->time('from');
            $table->time('to');
            $table->string('sujet');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('rdvs');
        Schema::enableForeignKeyConstraints();
    }
};
