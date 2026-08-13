<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreDossierRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nomDossier' => ['required', 'string', 'max:150'],
            'titre' => ['nullable', 'string', 'max:255'],
            'numero_dossier' => ['nullable', 'string', 'max:50', 'unique:dossiers,numero_dossier'],
            'idCl' => ['required', 'exists:clients,idClient'],
            'idAv' => ['nullable', 'exists:avocats,idAvocat'],
            'assigned_user_id' => ['nullable', 'exists:users,id'],
            'idCa' => ['nullable', 'exists:cas,idCas'],
            'dateDossier' => ['required', 'date'],
            'date_fermeture' => ['nullable', 'date', 'after_or_equal:dateDossier'],
            'statut' => ['required', Rule::in(\App\Models\Dossier::STATUTS)],
            'priorite' => ['required', Rule::in(\App\Models\Dossier::PRIORITES)],
            'description' => ['nullable', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'nomDossier.required' => 'Le nom du dossier est obligatoire.',
            'idCl.required' => 'Le client est obligatoire.',
            'idCl.exists' => 'Le client sélectionné est introuvable.',
            'dateDossier.required' => "La date d'ouverture est obligatoire.",
            'dateDossier.date' => "La date d'ouverture est invalide.",
            'statut.required' => 'Le statut est obligatoire.',
            'priorite.required' => 'La priorité est obligatoire.',
            'date_fermeture.after_or_equal' => "La date de fermeture ne peut précéder la date d'ouverture.",
        ];
    }
}
