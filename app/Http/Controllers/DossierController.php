<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDossierRequest;
use App\Http\Requests\UpdateDossierRequest;
use App\Models\Avocat;
use App\Models\Cas;
use App\Models\Client;
use App\Models\Dossier;
use App\Models\User;
use Illuminate\Http\Request;

class DossierController extends Controller
{
    public function index(Request $request)
    {
        $query = Dossier::with(['client', 'avocat', 'assignedUser', 'cas']);

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('nomDossier', 'like', "%{$search}%")
                  ->orWhere('numero_dossier', 'like', "%{$search}%")
                  ->orWhere('titre', 'like', "%{$search}%")
                  ->orWhereHas('client', function ($cq) use ($search) {
                      $cq->where('nomClient', 'like', "%{$search}%")
                        ->orWhere('prenomClient', 'like', "%{$search}%");
                  })
                    ->orWhereHas('assignedUser', function ($uq) use ($search) {
                        $uq->where('nom', 'like', "%{$search}%")
                            ->orWhere('prenon', 'like', "%{$search}%")
                            ->orWhere('email', 'like', "%{$search}%");
                    });
            });
        }

        if ($statut = $request->input('statut')) {
            $query->where('statut', $statut);
        }

        if ($priorite = $request->input('priorite')) {
            $query->where('priorite', $priorite);
        }

        if ($responsable = $request->input('responsable')) {
            $query->where('assigned_user_id', $responsable);
        }

        $dossiers = $query->orderByDesc('idDossier')->paginate(10)->withQueryString();

        return view('dossiers.index', [
            'dossiers' => $dossiers,
            'statuts' => Dossier::STATUTS,
            'priorites' => Dossier::PRIORITES,
            'users' => User::orderBy('nom')->orderBy('prenon')->get(),
        ]);
    }

    public function create()
    {
        return view('dossiers.create', [
            'clients' => Client::orderBy('nomClient')->get(),
            'avocats' => Avocat::orderBy('nomAvocat')->get(),
            'users' => User::orderBy('nom')->orderBy('prenon')->get(),
            'cas' => Cas::orderBy('listeCas')->get(),
            'statuts' => Dossier::STATUTS,
            'priorites' => Dossier::PRIORITES,
        ]);
    }

    public function store(StoreDossierRequest $request)
    {
        Dossier::create($this->mapInputs($request));

        return redirect()->route('dossiers')->with('success', 'Dossier créé avec succès.');
    }

    public function show(string $id)
    {
        $dossier = Dossier::with(['client', 'avocat', 'assignedUser', 'cas'])->findOrFail($id);

        return view('dossiers.show', compact('dossier'));
    }

    public function edit(string $id)
    {
        $dossier = Dossier::findOrFail($id);

        return view('dossiers.edit', [
            'dossier' => $dossier,
            'clients' => Client::orderBy('nomClient')->get(),
            'avocats' => Avocat::orderBy('nomAvocat')->get(),
            'users' => User::orderBy('nom')->orderBy('prenon')->get(),
            'cas' => Cas::orderBy('listeCas')->get(),
            'statuts' => Dossier::STATUTS,
            'priorites' => Dossier::PRIORITES,
        ]);
    }

    public function update(UpdateDossierRequest $request, string $id)
    {
        $dossier = Dossier::findOrFail($id);
        $inputs = $this->mapInputs($request);
        if (! $request->filled('idAv')) { unset($inputs['idAv']); }
        if (! $request->filled('idCa')) { unset($inputs['idCa']); }
        $dossier->update($inputs);
        return redirect()
            ->route('dossiers.show', $dossier->idDossier)
            ->with('success', 'Dossier modifié avec succès.');
    }

    public function destroy(string $id)
    {
        $dossier = Dossier::findOrFail($id);
        $dossier->delete();

        return redirect()->route('dossiers')->with('success', 'Dossier supprimé avec succès.');
    }

    private function mapInputs(StoreDossierRequest|UpdateDossierRequest $request): array
    {
        return [
            'nomDossier' => $request->input('nomDossier'),
            'titre' => $request->input('titre'),
            'numero_dossier' => $request->input('numero_dossier'),
            'idCl' => $request->input('idCl'),
            'idAv' => $request->input('idAv') ?: null,
            'assigned_user_id' => $request->input('assigned_user_id') ?: $request->user()->id,
            'idCa' => $request->input('idCa') ?: null,
            'dateDossier' => $request->input('dateDossier'),
            'date_fermeture' => $request->input('date_fermeture') ?: null,
            'statut' => $request->input('statut'),
            'priorite' => $request->input('priorite'),
            'description' => $request->input('description'),
            'etat' => $request->input('statut') === 'cloture' || $request->input('statut') === 'archive'
                ? 'close'
                : 'en cours',
        ];
    }
}
