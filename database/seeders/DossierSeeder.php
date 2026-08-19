<?php

namespace Database\Seeders;

use App\Models\Avocat;
use App\Models\Cas;
use App\Models\Client;
use App\Models\Dossier;
use App\Models\User;
use Illuminate\Database\Seeder;

class DossierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clients = Client::query()->orderBy('idClient')->pluck('idClient')->all();
        $users = User::query()->orderBy('id')->pluck('id')->all();
        $avocats = Avocat::query()->orderBy('idAvocat')->pluck('idAvocat')->all();
        $cas = Cas::query()->orderBy('idCas')->pluck('idCas')->all();

        $dossiers = [
            ['numero_dossier' => 'DOS-2026-001', 'nomDossier' => 'Litige commercial', 'titre' => 'Litige commercial', 'dateDossier' => '2026-01-12', 'statut' => 'en_cours', 'priorite' => 'haute', 'description' => 'Conflit de facturation entre une société et son fournisseur.'],
            ['numero_dossier' => 'DOS-2026-002', 'nomDossier' => 'Recouvrement de créance', 'titre' => 'Recouvrement de créance', 'dateDossier' => '2026-01-18', 'statut' => 'nouveau', 'priorite' => 'normale', 'description' => 'Relance amiable puis contentieux si nécessaire.'],
            ['numero_dossier' => 'DOS-2026-003', 'nomDossier' => 'Dossier immobilier', 'titre' => 'Dossier immobilier', 'dateDossier' => '2026-02-03', 'statut' => 'en_attente', 'priorite' => 'urgente', 'description' => 'Litige lié à un bail commercial.'],
            ['numero_dossier' => 'DOS-2026-004', 'nomDossier' => 'Affaire familiale', 'titre' => 'Affaire familiale', 'dateDossier' => '2026-02-11', 'statut' => 'suspendu', 'priorite' => 'basse', 'description' => 'Procédure familiale en attente de pièces complémentaires.'],
            ['numero_dossier' => 'DOS-2026-005', 'nomDossier' => 'Contentieux contractuel', 'titre' => 'Contentieux contractuel', 'dateDossier' => '2026-03-02', 'statut' => 'cloture', 'priorite' => 'normale', 'description' => 'Dossier clôturé après transaction.'],
            ['numero_dossier' => 'DOS-2026-006', 'nomDossier' => 'Conseil juridique entreprise', 'titre' => 'Conseil juridique entreprise', 'dateDossier' => '2026-03-15', 'statut' => 'archive', 'priorite' => 'basse', 'description' => 'Mission de conseil finalisée et archivée.'],
            ['numero_dossier' => 'DOS-2026-007', 'nomDossier' => 'Contentieux locatif', 'titre' => 'Contentieux locatif', 'dateDossier' => '2026-04-01', 'statut' => 'en_cours', 'priorite' => 'haute', 'description' => 'Litige relatif à une expulsion locative.'],
            ['numero_dossier' => 'DOS-2026-008', 'nomDossier' => 'Recours administratif', 'titre' => 'Recours administratif', 'dateDossier' => '2026-04-10', 'statut' => 'nouveau', 'priorite' => 'urgente', 'description' => 'Recours contre une décision administrative.'],
        ];

        foreach ($dossiers as $index => $dossier) {
            $statut = $dossier['statut'];

            Dossier::updateOrCreate(
                ['numero_dossier' => $dossier['numero_dossier']],
                [
                    'nomDossier' => $dossier['nomDossier'],
                    'titre' => $dossier['titre'],
                    'idCl' => $clients[$index % count($clients)],
                    'idAv' => $index % 2 === 0 ? ($avocats[$index % count($avocats)] ?? null) : null,
                    'assigned_user_id' => $users[$index % count($users)],
                    'idCa' => $cas[$index % count($cas)] ?? null,
                    'dateDossier' => $dossier['dateDossier'],
                    'date_fermeture' => in_array($statut, ['cloture', 'archive'], true) ? '2026-06-30' : null,
                    'etat' => in_array($statut, ['cloture', 'archive'], true) ? 'close' : 'en cours',
                    'statut' => $statut,
                    'priorite' => $dossier['priorite'],
                    'description' => $dossier['description'],
                ]
            );
        }
    }
}
