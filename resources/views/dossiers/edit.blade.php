@extends('layout')
@section("titre") Modifier le dossier @endsection
@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Modifier le dossier</h1>
    <div class="bg-light m-2 pb-3 p-4">
        <form action="{{ route('dossiers.update', $dossier->idDossier) }}" method="post">
            @csrf @method('POST')
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="mb-3">
                <label class="form-label">Nom du dossier *</label>
                <input type="text" name="nomDossier" class="form-control" value="{{ old('nomDossier', $dossier->nomDossier) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Titre</label>
                <input type="text" name="titre" class="form-control" value="{{ old('titre', $dossier->titre) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Numéro de dossier</label>
                <input type="text" name="numero_dossier" class="form-control" value="{{ old('numero_dossier', $dossier->numero_dossier) }}">
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Client *</label>
                    <select name="idCl" class="form-select">
                        <option value="">Choisir un client</option>
                        @foreach ($clients as $cl)
                            <option value="{{ $cl->idClient }}" @selected(old('idCl', $dossier->idCl) == $cl->idClient)>{{ $cl->prenomClient }} {{ $cl->nomClient }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Avocat responsable</label>
                    <select name="idAv" class="form-select">
                        <option value="">Aucun</option>
                        @foreach ($avocats as $av)
                            <option value="{{ $av->idAvocat }}" @selected(old('idAv', $dossier->idAv) == $av->idAvocat)>{{ $av->prenomAvocat }} {{ $av->nomAvocat }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Utilisateur responsable</label>
                    <select name="assigned_user_id" class="form-select">
                        <option value="">Aucun</option>
                        @foreach ($users as $u)
                            <option value="{{ $u->id }}" @selected(old('assigned_user_id', $dossier->assigned_user_id) == $u->id)>{{ $u->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Type d'affaire</label>
                    <select name="idCa" class="form-select">
                        <option value="">Aucun</option>
                        @foreach ($cas as $c)
                            <option value="{{ $c->idCas }}" @selected(old('idCa', $dossier->idCa) == $c->idCas)>{{ $c->listeCas }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label">Statut *</label>
                    <select name="statut" class="form-select">
                        @foreach ($statuts as $s)
                            <option value="{{ $s }}" @selected(old('statut', $dossier->statut) === $s)>{{ ucfirst(str_replace('_', ' ', $s)) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Priorité *</label>
                    <select name="priorite" class="form-select">
                        @foreach ($priorites as $p)
                            <option value="{{ $p }}" @selected(old('priorite', $dossier->priorite) === $p)>{{ ucfirst($p) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Date d'ouverture *</label>
                    <input type="date" name="dateDossier" class="form-control" value="{{ old('dateDossier', $dossier->dateDossier) }}">
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Date de fermeture</label>
                <input type="date" name="date_fermeture" class="form-control" value="{{ old('date_fermeture', $dossier->date_fermeture) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="5">{{ old('description', $dossier->description) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Enregistrer</button>
            <a href="{{ route('dossiers.show', $dossier->idDossier) }}" class="btn btn-warning">Annuler</a>
        </form>
    </div>
</div>
@endsection
