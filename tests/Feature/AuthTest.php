<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_creates_user_and_hashes_password(): void
    {
        $response = $this->post('/register', [
            'nom' => 'Dupont',
            'prenon' => 'Jean',
            'tel' => 612345678,
            'email' => 'jean.dupont@example.com',
            'password' => 'Password123!',
            'password_confirmation' => 'Password123!',
        ]);

        $response->assertRedirect('/');
        $this->assertAuthenticated();
        $this->assertDatabaseHas('users', [
            'email' => 'jean.dupont@example.com',
            'nom' => 'Dupont',
            'prenon' => 'Jean',
            'tel' => 612345678,
        ]);

        $user = User::where('email', 'jean.dupont@example.com')->first();
        $this->assertTrue(Hash::check('Password123!', $user->password));
        $this->assertNotSame('Password123!', $user->password);
    }

    public function test_registration_validates_required_fields(): void
    {
        $response = $this->post('/register', []);

        $response->assertSessionHasErrors(['nom', 'prenon', 'tel', 'email', 'password']);
        $this->assertDatabaseCount('users', 0);
        $this->assertGuest();
    }

    public function test_registration_requires_integer_tel(): void
    {
        $response = $this->post('/register', [
            'nom' => 'Test',
            'prenon' => 'User',
            'tel' => 'not-a-number',
            'email' => 'test@example.com',
            'password' => 'Password123!',
            'password_confirmation' => 'Password123!',
        ]);

        $response->assertSessionHasErrors(['tel']);
        $this->assertDatabaseCount('users', 0);
    }

    public function test_registration_requires_unique_email(): void
    {
        User::factory()->create(['email' => 'taken@example.com']);

        $response = $this->post('/register', [
            'nom' => 'Test',
            'prenon' => 'User',
            'tel' => 612345678,
            'email' => 'taken@example.com',
            'password' => 'Password123!',
            'password_confirmation' => 'Password123!',
        ]);

        $response->assertSessionHasErrors(['email']);
        $this->assertDatabaseCount('users', 1);
    }

    public function test_registration_requires_password_confirmation(): void
    {
        $response = $this->post('/register', [
            'nom' => 'Test',
            'prenon' => 'User',
            'tel' => 612345678,
            'email' => 'mismatch@example.com',
            'password' => 'Password123!',
            'password_confirmation' => 'DifferentPassword!',
        ]);

        $response->assertSessionHasErrors(['password']);
        $this->assertDatabaseCount('users', 0);
    }

    public function test_login_authenticates_valid_user(): void
    {
        $user = User::factory()->create([
            'email' => 'login@example.com',
            'password' => Hash::make('Password123!'),
        ]);

        $response = $this->post('/login', [
            'email' => 'login@example.com',
            'password' => 'Password123!',
        ]);

        $response->assertRedirect('/');
        $this->assertAuthenticatedAs($user);
    }

    public function test_login_rejects_wrong_password(): void
    {
        User::factory()->create([
            'email' => 'wrong@example.com',
            'password' => Hash::make('Password123!'),
        ]);

        $response = $this->post('/login', [
            'email' => 'wrong@example.com',
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
        $response->assertSessionHasErrors('email');
    }

    public function test_login_rejects_nonexistent_user(): void
    {
        $response = $this->post('/login', [
            'email' => 'ghost@example.com',
            'password' => 'Password123!',
        ]);

        $this->assertGuest();
        $response->assertSessionHasErrors('email');
    }

    public function test_logout_ends_session(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user);
        $this->assertAuthenticated();

        $response = $this->post('/logout');

        $this->assertGuest();
    }

    public function test_auth_views_render(): void
    {
        $this->get(route('login'))->assertOk();
        $this->get(route('register'))->assertOk();
        $this->get('/Connexion')->assertRedirect(route('login'));
        $this->get('/Register')->assertRedirect(route('register'));
    }
}
