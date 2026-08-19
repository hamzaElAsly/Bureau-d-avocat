<?php

namespace App\Http\Requests;

use App\Models\Client;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            't1' => ['required', 'numeric'],
            't2' => ['nullable', 'numeric'],
            'adrs' => ['required', 'string', 'max:255'],
            'mail' => ['required', 'email', 'max:150'],
            'photo' => ['nullable', 'image', 'max:2048'],
            'type_client' => ['required', Rule::in(Client::TYPES)],
            'identifiant' => ['nullable', 'string', 'max:100'],
            'notes' => ['nullable', 'string'],
            'statut' => ['required', Rule::in(Client::STATUTS)],
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
