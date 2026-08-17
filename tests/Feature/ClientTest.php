<?php

namespace Tests\Feature;

use App\Models\Client;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ClientTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_user_can_list_clients(): void
    {
        $user = User::factory()->create();
        Client::factory()->count(3)->create();

        $response = $this->actingAs($user)->get(route('clients'));

        $response->assertStatus(200);
        $response->assertViewHas('dbClient');
    }

    public function test_authenticated_user_can_create_client(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('addCl.store'), [
            'prenom' => 'Jean',
            'nom' => 'Dupont',
            't1' => '0612345678',
            't2' => '0687654321',
            'adrs' => '12 rue de Paris',
            'mail' => 'jean.dupont@example.com',
            'type_client' => 'particulier',
            'statut' => 'actif',
        ]);

        $response->assertRedirect(route('clients'));
        $this->assertDatabaseHas('clients', ['emailClient' => 'jean.dupont@example.com']);
    }

    public function test_client_creation_validation_fails_without_required_fields(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('addCl.store'), [
            'prenom' => '',
            'nom' => '',
            't1' => '',
            'adrs' => '',
            'mail' => 'invalid-email',
            'type_client' => 'particulier',
            'statut' => 'actif',
        ]);

        $response->assertSessionHasErrors(['prenom', 'nom', 't1', 'adrs', 'mail']);
        $this->assertDatabaseCount('clients', 0);
    }

    public function test_authenticated_user_can_update_client(): void
    {
        $user = User::factory()->create();
        $client = Client::factory()->create();

        $response = $this->actingAs($user)->put(route('updateCl.store', $client->idClient), [
            'prenom' => 'Nouveau',
            'nom' => 'Nom',
            't1' => '0600000000',
            't2' => '0600000001',
            'adrs' => 'Nouvelle adresse',
            'mail' => 'nouveau@example.com',
            'type_client' => 'entreprise',
            'identifiant' => 'RC-123',
            'notes' => 'Client professionnel',
            'statut' => 'actif',
        ]);

        $response->assertRedirect(route('clients'));
        $this->assertDatabaseHas('clients', [
            'idClient' => $client->idClient,
            'nomClient' => 'Nom',
            'emailClient' => 'nouveau@example.com',
        ]);
    }

    public function test_authenticated_user_can_delete_client(): void
    {
        $user = User::factory()->create();
        $client = Client::factory()->create();

        $response = $this->actingAs($user)->delete(route('deleteCl', $client->idClient));

        $response->assertRedirect(route('clients'));
        $this->assertDatabaseMissing('clients', ['idClient' => $client->idClient]);
    }

    public function test_unauthenticated_user_cannot_access_clients(): void
    {
        $this->get(route('clients'))->assertRedirect(route('login'));
    }
}
