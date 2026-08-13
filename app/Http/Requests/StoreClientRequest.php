<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'prenom' => ['required', 'string', 'max:150'],
            'nom' => ['required', 'string', 'max:150'],
            't1' => ['required', 'string', 'max:30'],
            't2' => ['nullable', 'string', 'max:30'],
            'adrs' => ['required', 'string', 'max:255'],
            'mail' => ['required', 'email', 'max:150'],
            'photo' => ['nullable', 'string', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'prenom.required' => 'Le prénom est obligatoire.',
            'nom.required' => 'Le nom est obligatoire.',
            't1.required' => 'Au moins un numéro de téléphone est obligatoire.',
            'adrs.required' => "L'adresse est obligatoire.",
            'mail.required' => "L'email est obligatoire.",
            'mail.email' => "L'email doit être une adresse valide.",
        ];
    }
}
