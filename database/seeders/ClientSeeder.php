<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clients = [
            [
                'emailClient' => 'youssef.ikhlif@example.test',
                'nomClient' => 'Ikhlif',
                'prenomClient' => 'Youssef',
                'tel1' => 612300101,
                'tel2' => 612300102,
                'adressClient' => '12 Avenue Mohammed V, Casablanca',
                'imageClient' => null,
                'type_client' => 'particulier',
                'identifiant' => null,
                'notes' => 'Client particulier pour un contentieux commercial.',
                'statut' => 'actif',
            ],
            [
                'emailClient' => 'salma.elfassi@example.test',
                'nomClient' => 'El Fassi',
                'prenomClient' => 'Salma',
                'tel1' => 612300103,
                'tel2' => null,
                'adressClient' => '45 Rue Hassan II, Rabat',
                'imageClient' => null,
                'type_client' => 'entreprise',
                'identifiant' => 'ICE-123456789',
                'notes' => 'Société de conseil.',
                'statut' => 'actif',
            ],
            [
                'emailClient' => 'mehdi.lahlou@example.test',
                'nomClient' => 'Lahlou',
                'prenomClient' => 'Mehdi',
                'tel1' => 612300104,
                'tel2' => 612300105,
                'adressClient' => '18 Boulevard Zerktouni, Marrakech',
                'imageClient' => null,
                'type_client' => 'particulier',
                'identifiant' => null,
                'notes' => 'Affaire familiale en cours.',
                'statut' => 'actif',
            ],
            [
                'emailClient' => 'ghita.benjelloun@example.test',
                'nomClient' => 'Benjelloun',
                'prenomClient' => 'Ghita',
                'tel1' => 612300106,
                'tel2' => null,
                'adressClient' => '7 Avenue de la Marche Verte, Tanger',
                'imageClient' => null,
                'type_client' => 'entreprise',
                'identifiant' => 'ICE-987654321',
                'notes' => 'Contrats de prestation.',
                'statut' => 'actif',
            ],
            [
                'emailClient' => 'anas.bennis@example.test',
                'nomClient' => 'Bennis',
                'prenomClient' => 'Anas',
                'tel1' => 612300107,
                'tel2' => null,
                'adressClient' => '3 Rue Al Qods, Agadir',
                'imageClient' => null,
                'type_client' => 'particulier',
                'identifiant' => null,
                'notes' => 'Recouvrement de créance.',
                'statut' => 'actif',
            ],
            [
                'emailClient' => 'kawtar.bouhafa@example.test',
                'nomClient' => 'Bouhafa',
                'prenomClient' => 'Kawtar',
                'tel1' => 612300108,
                'tel2' => 612300109,
                'adressClient' => '22 Boulevard Mohammed VI, Fès',
                'imageClient' => null,
                'type_client' => 'entreprise',
                'identifiant' => 'ICE-112233445',
                'notes' => 'Litige locatif.',
                'statut' => 'actif',
            ],
            [
                'emailClient' => 'othmane.khalfi@example.test',
                'nomClient' => 'Khalfi',
                'prenomClient' => 'Othmane',
                'tel1' => 612300110,
                'tel2' => null,
                'adressClient' => '14 Avenue Hassan II, Meknès',
                'imageClient' => null,
                'type_client' => 'particulier',
                'identifiant' => null,
                'notes' => 'Conseil juridique ponctuel.',
                'statut' => 'actif',
            ],
            [
                'emailClient' => 'imane.aitlahcen@example.test',
                'nomClient' => 'Ait Lahcen',
                'prenomClient' => 'Imane',
                'tel1' => 612300111,
                'tel2' => null,
                'adressClient' => '9 Rue du Marché, Oujda',
                'imageClient' => null,
                'type_client' => 'entreprise',
                'identifiant' => 'ICE-556677889',
                'notes' => 'Dossier immobilier.',
                'statut' => 'actif',
            ],
            [
                'emailClient' => 'mohamed.zerhouni@example.test',
                'nomClient' => 'Zerhouni',
                'prenomClient' => 'Mohamed',
                'tel1' => 612300112,
                'tel2' => null,
                'adressClient' => '6 Avenue Al Massira, Tétouan',
                'imageClient' => null,
                'type_client' => 'particulier',
                'identifiant' => null,
                'notes' => 'Audience à venir.',
                'statut' => 'actif',
            ],
            [
                'emailClient' => 'sara.haddad@example.test',
                'nomClient' => 'Haddad',
                'prenomClient' => 'Sara',
                'tel1' => 612300113,
                'tel2' => null,
                'adressClient' => '17 Avenue Moulay Youssef, Kénitra',
                'imageClient' => null,
                'type_client' => 'entreprise',
                'identifiant' => 'ICE-667788990',
                'notes' => 'Suivi de contrat.',
                'statut' => 'actif',
            ],
        ];

        foreach ($clients as $client) {
            Client::updateOrCreate(['emailClient' => $client['emailClient']], $client);
        }
    }
}
