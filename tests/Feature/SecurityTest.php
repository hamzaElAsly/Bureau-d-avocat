<?php

namespace Tests\Feature;

use App\Models\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SecurityTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Documente l'état d'autorisation actuel : les routes métier ne sont pas
     * encore protégées par un middleware d'authentification. Les pages
     * /Clients et /dossiers sont accessibles publiquement.
     *
     * Ce test verrouille ce comportement actuel afin de détecter toute
     * régression involontaire. Le renforcement de l'authentification
     * (middleware auth + login fonctionnel) appartient à une phase ultérieure.
     */
    public function test_client_routes_are_currently_publicly_accessible(): void
    {
        Client::factory()->create();

        $this->get(route('clients'))->assertStatus(200);
        $this->get(route('addCl'))->assertStatus(200);
        $this->get(route('dossiers'))->assertStatus(200);
        $this->get(route('addDoss'))->assertStatus(200);
    }

    /**
     * La validation serveur protège contre la création de données invalides
     * même sans authentification (preuve de défense en profondeur).
     */
    public function test_invalid_client_creation_is_rejected_server_side(): void
    {
        $response = $this->post(route('addCl.store'), [
            'prenom' => '',
            'nom' => '',
            't1' => '',
            'adrs' => '',
            'mail' => 'not-an-email',
        ]);

        $response->assertSessionHasErrors(['prenom', 'nom', 't1', 'adrs', 'mail']);
        $this->assertDatabaseCount('clients', 0);
    }
}
