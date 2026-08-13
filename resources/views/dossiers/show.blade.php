@extends('layout')
@section("titre") Fiche dossier @endsection
@section('content')
<div class="container mt-4">
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <a href="{{ route('dossiers') }}" class="btn btn-warning mb-3">Retour à la liste</a>

    <div class="row">
        <!-- Informations générales -->
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-header bg-light">
                    <h4 class="mb-0">{{ $dossier->titre ?? $dossier->nomDossier }}
                        <span class="badge bg-info text-white">{{ ucfirst(str_replace('_', ' ', $dossier->statut)) }}</span>
                        <span class="badge bg-secondary">{{ ucfirst($dossier->priorite) }}</span>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <th style="width:30%">Numéro de dossier</th>
                            <td>{{ $dossier->numero_dossier ?? '—' }}</td>
                        </tr>
                        <tr>
                            <th>Nom</th>
                            <td>{{ $dossier->nomDossier }}</td>
                        </tr>
                        <tr>
                            <th>Statut</th>
                            <td>{{ ucfirst(str_replace('_', ' ', $dossier->statut)) }}</td>
                        </tr>
                        <tr>
                            <th>Priorité</th>
                            <td>{{ ucfirst($dossier->priorite) }}</td>
                        </tr>
                        <tr>
                            <th>Date d'ouverture</th>
                            <td>{{ $dossier->dateDossier }}</td>
                        </tr>
                        <tr>
                            <th>Date de fermeture</th>
                            <td>{{ $dossier->date_fermeture ?? '—' }}</td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td>{{ $dossier->description ?? '—' }}</td>
                        </tr>
                    </table>

                    <a href="{{ route('dossiers.edit', $dossier->idDossier) }}" class="btn btn-primary"><i class="fa fa-edit"></i> Modifier</a>
                    <form action="{{ route('dossiers.destroy', $dossier->idDossier) }}" method="POST" class="d-inline" onsubmit="return confirm('Supprimer ce dossier ?');">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger"><i class="fa fa-trash"></i> Supprimer</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Client + Avocat responsable -->
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-header bg-light"><h5 class="mb-0">Client</h5></div>
                <div class="card-body">
                    @if ($dossier->client)
                        <p><strong>{{ $dossier->client->prenomClient }} {{ $dossier->client->nomClient }}</strong></p>
                        <p><i class="fa fa-phone"></i> {{ $dossier->client->tel1 }}</p>
                        <p><i class="fa fa-envelope"></i> {{ $dossier->client->emailClient }}</p>
                        <a href="{{ route('infoCl', $dossier->client->idClient) }}" class="btn btn-outline-info btn-sm">Voir la fiche client</a>
                    @else
                        <p class="text-muted">Aucun client associé.</p>
                    @endif
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header bg-light"><h5 class="mb-0">Avocat responsable</h5></div>
                <div class="card-body">
                    @if ($dossier->avocat)
                        <p><strong>{{ $dossier->avocat->prenomAvocat }} {{ $dossier->avocat->nomAvocat }}</strong></p>
                        <p class="text-muted">{{ $dossier->avocat->specialiste ?? '' }}</p>
                    @else
                        <p class="text-muted">Aucun avocat assigné.</p>
                    @endif
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header bg-light"><h5 class="mb-0">Utilisateur responsable</h5></div>
                <div class="card-body">
                    @if ($dossier->assignedUser)
                        <p><strong>{{ $dossier->assignedUser->name }}</strong></p>
                        <p class="text-muted">{{ $dossier->assignedUser->email }}</p>
                    @else
                        <p class="text-muted">Aucun utilisateur assigné.</p>
                    @endif
                </div>
            </div>

            @if ($dossier->cas)
            <div class="card mb-3">
                <div class="card-header bg-light"><h5 class="mb-0">Type d'affaire</h5></div>
                <div class="card-body">
                    <p>{{ $dossier->cas->listeCas }}</p>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
