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
    {   Schema::disableForeignKeyConstraints();
        Schema::create('tribunals', function (Blueprint $table) {
            $table->unsignedBigInteger('idTribunal')->primary();
            $table->foreignId('id_Region')->references('idRegion')->on('regions')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('nomTribunal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tribunals');
    }
};
