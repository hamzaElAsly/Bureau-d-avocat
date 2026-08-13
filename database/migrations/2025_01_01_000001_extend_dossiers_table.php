<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Étend la table dossiers : statut étendu, priorité, date de fermeture,
     * avocat responsable (User) et timestamps d'ouverture/fermeture explicites.
     * Préserve la colonne `etat` existante pour la rétrocompatibilité.
     */
    public function up(): void
    {
        Schema::table('dossiers', function (Blueprint $table) {
            $table->string('titre')->nullable()->after('nomDossier');
            $table->string('numero_dossier')->nullable()->unique()->after('idDossier');
            $table->string('statut')->default('nouveau')->after('etat');
            $table->string('priorite')->default('normale')->after('statut');
            $table->date('date_fermeture')->nullable()->after('dateDossier');
            $table->foreignId('assigned_user_id')
                ->nullable()
                ->after('idAv')
                ->constrained('users')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('dossiers', function (Blueprint $table) {
            $table->dropForeign(['assigned_user_id']);
            $table->dropColumn(['titre', 'numero_dossier', 'statut', 'priorite', 'date_fermeture', 'assigned_user_id']);
        });
    }
};
