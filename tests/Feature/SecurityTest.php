<?php

namespace Tests\Feature;

use App\Models\Client;
use App\Models\Dossier;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SecurityTest extends TestCase
{
    use RefreshDatabase;

    public function test_unauthenticated_user_cannot_access_or_mutate_business_resources(): void
    {
        Client::factory()->create();
        $dossier = Dossier::factory()->create();

        $this->get(route('clients'))->assertRedirect(route('login'));
        $this->get(route('addCl'))->assertRedirect(route('login'));
        $this->get(route('dossiers'))->assertRedirect(route('login'));
        $this->get(route('addDoss'))->assertRedirect(route('login'));
        $this->delete(route('dossiers.destroy', $dossier->idDossier))->assertRedirect(route('login'));
        $this->assertDatabaseHas('dossiers', ['idDossier' => $dossier->idDossier]);
    }

    /**
     * La validation serveur reste appliquée après authentification.
     */
    public function test_invalid_client_creation_is_rejected_server_side(): void
    {
        $response = $this->actingAs(\App\Models\User::factory()->create())->post(route('addCl.store'), [
            'prenom' => '',
            'nom' => '',
            't1' => '',
            'adrs' => '',
            'mail' => 'not-an-email',
            'type_client' => 'particulier',
            'statut' => 'actif',
        ]);

        $response->assertSessionHasErrors(['prenom', 'nom', 't1', 'adrs', 'mail']);
        $this->assertDatabaseCount('clients', 0);
    }
}
