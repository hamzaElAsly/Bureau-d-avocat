<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->string('type_client')->default('particulier')->after('prenomClient');
            $table->string('identifiant', 100)->nullable()->after('emailClient');
            $table->text('notes')->nullable()->after('adressClient');
            $table->string('statut')->default('actif')->after('notes');
        });
    }

    public function down(): void
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropColumn(['type_client', 'identifiant', 'notes', 'statut']);
        });
    }
};
