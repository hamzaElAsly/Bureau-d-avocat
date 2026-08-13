@extends('layout')
@section("titre")Infos de Client @endsection
@section('content')
<div class="container mt-5">
    <div class="row">
        <!-- Infos client -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center" id="profilInfoCl">
                @if ($client->imageClient)
                    <img src="{{ asset($client->imageClient) }}"
                        style="width: 250px; height:250px; margin:auto; border-radius:50%;"
                        alt="Profil Client" class="mb-3">
                @endif
                <h5 class="card-title">Adresse</h5>
                <p class="card-text">{{$client->adressClient}}</p>
                <h5 class="card-title">Phone 1</h5>
                <p class="card-text"><a href="tel:{{$client->tel1}}">{{$client->tel1}}</a></p>
                <h5 class="card-title">Phone 2</h5>
                <p class="card-text"><a href="tel:{{$client->tel2}}">{{$client->tel2}}</a></p>
                <h5 class="card-title">Email</h5>
                <p class="card-text">{{$client->emailClient}}</p>
                <a href="{{route('updateCl',$client->idClient)}}">
                    <button class="btn btn-primary">Modifier ses infos</button>
                </a>
            </div>
            </div>
        </div>
        <!-- Dossiers en cours -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="text-black-50 mt-3">Ses dossiers ({{ $client->dossiers->count() }})</h4>
                        <a href="{{ route('addDoss') }}?idCl={{ $client->idClient }}" class="btn btn-danger btn-sm mb-3"><i class="fa fa-plus"></i> Nouveau dossier</a>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Statut</th>
                                <th>Priorité</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($client->dossiers as $doss)
                                <tr>
                                    <td>{{ $doss->titre ?? $doss->nomDossier }}</td>
                                    <td><span class="badge bg-info text-white">{{ ucfirst(str_replace('_', ' ', $doss->statut)) }}</span></td>
                                    <td><span class="badge bg-secondary">{{ ucfirst($doss->priorite) }}</span></td>
                                    <td>{{ $doss->dateDossier }}</td>
                                    <td><a href="{{ route('dossiers.show', $doss->idDossier) }}" class="btn btn-primary btn-sm">Ouvrir</a></td>
                                </tr>
                            @endforeach
                            @if ($client->dossiers->isEmpty())
                                <tr><td colspan="5" class="text-center text-muted">Aucun dossier pour ce client.</td></tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection