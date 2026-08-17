<?php

namespace Tests\Feature;

use App\Models\Client;
use App\Models\Dossier;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DossierTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_user_can_list_dossiers(): void
    {
        $user = User::factory()->create();
        Dossier::factory()->count(3)->create();

        $response = $this->actingAs($user)->get(route('dossiers'));

        $response->assertStatus(200);
        $response->assertViewHas('dossiers');
    }

    public function test_authenticated_user_can_create_dossier(): void
    {
        $user = User::factory()->create();
        $client = Client::factory()->create();

        $response = $this->actingAs($user)->post(route('addDoss.store'), [
            'nomDossier' => 'DOS-2024-001',
            'titre' => 'Affaire commerciale',
            'idCl' => $client->idClient,
            'dateDossier' => '2024-05-01',
            'statut' => 'nouveau',
            'priorite' => 'normale',
            'description' => 'Description du dossier',
        ]);

        $response->assertRedirect(route('dossiers'));
        $this->assertDatabaseHas('dossiers', ['nomDossier' => 'DOS-2024-001']);
    }

    public function test_dossier_belongs_to_client(): void
    {
        $client = Client::factory()->create();
        $dossier = Dossier::factory()->create(['idCl' => $client->idClient]);

        $this->assertNotNull($dossier->client);
        $this->assertEquals($client->idClient, $dossier->client->idClient);

        $this->assertTrue($client->dossiers->contains($dossier->idDossier));
    }

    public function test_dossier_belongs_to_responsible_user(): void
    {
        $user = User::factory()->create();
        $dossier = Dossier::factory()->create(['assigned_user_id' => $user->id]);

        $this->assertNotNull($dossier->assignedUser);
        $this->assertEquals($user->id, $dossier->assignedUser->id);

        $this->assertTrue($user->dossiersResponsable->contains($dossier->idDossier));
    }

    public function test_authenticated_user_can_update_dossier(): void
    {
        $user = User::factory()->create();
        $dossier = Dossier::factory()->create(['statut' => 'nouveau']);

        $response = $this->actingAs($user)->put(route('dossiers.update', $dossier->idDossier), [
            'nomDossier' => $dossier->nomDossier,
            'titre' => 'Titre modifié',
            'idCl' => $dossier->idCl,
            'dateDossier' => $dossier->dateDossier,
            'statut' => 'en_cours',
            'priorite' => 'haute',
        ]);

        $response->assertRedirect(route('dossiers.show', $dossier->idDossier));
        $this->assertDatabaseHas('dossiers', [
            'idDossier' => $dossier->idDossier,
            'titre' => 'Titre modifié',
            'statut' => 'en_cours',
            'priorite' => 'haute',
        ]);
    }

    public function test_dossier_creation_validation_fails_without_client(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('addDoss.store'), [
            'nomDossier' => 'Sans client',
            'dateDossier' => '2024-05-01',
            'statut' => 'nouveau',
            'priorite' => 'normale',
        ]);

        $response->assertSessionHasErrors(['idCl']);
        $this->assertDatabaseCount('dossiers', 0);
    }

    public function test_dossier_creation_rejects_invalid_statut(): void
    {
        $user = User::factory()->create();
        $client = Client::factory()->create();

        $response = $this->actingAs($user)->post(route('addDoss.store'), [
            'nomDossier' => 'Bad statut',
            'idCl' => $client->idClient,
            'dateDossier' => '2024-05-01',
            'statut' => 'statut_inexistant',
            'priorite' => 'normale',
        ]);

        $response->assertSessionHasErrors(['statut']);
        $this->assertDatabaseCount('dossiers', 0);
    }

    public function test_authenticated_user_can_delete_dossier(): void
    {
        $user = User::factory()->create();
        $dossier = Dossier::factory()->create();

        $response = $this->actingAs($user)->delete(route('dossiers.destroy', $dossier->idDossier));

        $response->assertRedirect(route('dossiers'));
        $this->assertDatabaseMissing('dossiers', ['idDossier' => $dossier->idDossier]);
    }
}
