@extends('layout')
@section("titre") Gestion des dossiers @endsection
@section('content')
<div class="container mt-4">
    <h2 class="fw-bold text-dark mb-4">Gestion des dossiers</h2>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="bg-light rounded h-100 p-4">
        <form method="GET" class="row g-2 mb-3">
            <div class="col-md-4">
                <input type="search" name="search" value="{{ request('search') }}" class="form-control" placeholder="Rechercher par numéro, titre ou client">
            </div>
            <div class="col-md-3">
                <select name="statut" class="form-select">
                    <option value="">Tous les statuts</option>
                    @foreach ($statuts as $s)
                        <option value="{{ $s }}" @selected(request('statut') === $s)>{{ ucfirst(str_replace('_', ' ', $s)) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <select name="priorite" class="form-select">
                    <option value="">Toutes les priorités</option>
                    @foreach ($priorites as $p)
                        <option value="{{ $p }}" @selected(request('priorite') === $p)>{{ ucfirst($p) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-info w-100"><i class="fa fa-filter"></i> Filtrer</button>
            </div>
        </form>

        <div class="table-responsive mt-3">
            <a href="{{ route('addDoss') }}" class="btn btn-danger float-end mb-3"><i class="fa fa-plus"></i> Nouveau dossier</a>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>N° dossier</th>
                        <th>Titre</th>
                        <th>Client</th>
                        <th>Statut</th>
                        <th>Priorité</th>
                        <th>Avocat</th>
                        <th>Ouvert le</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dossiers as $doss)
                        <tr>
                            <td>{{ $doss->numero_dossier ?? '—' }}</td>
                            <td>{{ $doss->titre ?? $doss->nomDossier }}</td>
                            <td>{{ $doss->client ? $doss->client->prenomClient.' '.$doss->client->nomClient : '—' }}</td>
                            <td><span class="badge bg-info text-white">{{ ucfirst(str_replace('_', ' ', $doss->statut)) }}</span></td>
                            <td><span class="badge bg-secondary">{{ ucfirst($doss->priorite) }}</span></td>
                            <td>{{ $doss->avocat ? $doss->avocat->prenomAvocat.' '.$doss->avocat->nomAvocat : '—' }}</td>
                            <td>{{ $doss->dateDossier }}</td>
                            <td>
                                <a href="{{ route('dossiers.show', $doss->idDossier) }}" class="btn btn-secondary btn-sm">Voir</a>
                                <a href="{{ route('dossiers.edit', $doss->idDossier) }}" class="btn btn-primary btn-sm">Modifier</a>
                                <form action="{{ route('dossiers.destroy', $doss->idDossier) }}" method="POST" class="d-inline" onsubmit="return confirm('Supprimer ce dossier ?');">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            @if ($dossiers->isEmpty())
                <p class="text-center text-muted mt-3">Aucun dossier trouvé.</p>
            @endif

            {{ $dossiers->links() }}
        </div>
    </div>
</div>
@endsection
