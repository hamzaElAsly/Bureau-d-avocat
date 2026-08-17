<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_log_in_from_the_configured_fortify_view(): void
    {
        $user = User::factory()->create([
            'email' => 'avocat@example.test',
            'password' => Hash::make('password'),
        ]);

        $this->get(route('login'))->assertOk()->assertSee('Connexion');

        $this->post(route('login.store'), [
            'email' => $user->email,
            'password' => 'password',
        ])->assertRedirect('/');

        $this->assertAuthenticatedAs($user);
    }

    public function test_guest_can_register_and_is_authenticated(): void
    {
        $response = $this->post(route('register.store'), [
            'name' => 'Nouvel Avocat',
            'email' => 'nouvel.avocat@example.test',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $response->assertRedirect('/');
        $this->assertDatabaseHas('users', [
            'name' => 'Nouvel Avocat',
            'email' => 'nouvel.avocat@example.test',
        ]);
        $this->assertTrue(Hash::check('password123', User::where('email', 'nouvel.avocat@example.test')->value('password')));
        $this->assertAuthenticated();
    }

    public function test_legacy_register_url_uses_the_same_fortify_registration_flow(): void
    {
        $this->get('/Register')->assertRedirect('/register');

        $this->post('/Register', [
            'name' => 'Avocat Historique',
            'email' => 'historique@example.test',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ])->assertRedirect('/');

        $this->assertAuthenticated();
        $this->assertDatabaseHas('users', ['email' => 'historique@example.test']);
    }

    public function test_registration_validates_required_fields_and_duplicate_email(): void
    {
        User::factory()->create(['email' => 'existing@example.test']);

        $this->from(route('register'))->post(route('register.store'), [
            'name' => '',
            'email' => 'existing@example.test',
            'password' => 'password123',
            'password_confirmation' => 'different-password',
        ])->assertSessionHasErrors(['name', 'email', 'password']);

        $this->assertDatabaseCount('users', 1);
    }

    public function test_authenticated_user_can_log_out(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)->post(route('logout'))->assertRedirect('/');

        $this->assertGuest();
    }
}
