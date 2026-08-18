<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'nom' => ['required', 'string', 'max:255'],
            'prenon' => ['required', 'string', 'max:255'],
            'tel' => ['required', 'integer'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'image' => ['nullable', 'string'],
            'password' => $this->passwordRules(),
        ], [
            'nom.required' => 'Le nom est obligatoire.',
            'prenon.required' => 'Le prénom est obligatoire.',
            'tel.required' => 'Le téléphone est obligatoire.',
            'tel.integer' => 'Le téléphone doit être un nombre entier.',
            'email.required' => 'L\'email est obligatoire.',
            'email.email' => 'L\'email doit être une adresse valide.',
            'email.unique' => 'Cet email est déjà utilisé.',
            'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
        ])->validate();

        return User::create([
            'name' => trim($input['nom'].' '.$input['prenon']),
            'nom' => $input['nom'],
            'prenon' => $input['prenon'],
            'tel' => $input['tel'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'image' => $input['image'] ?? null,
        ]);
    }
}
