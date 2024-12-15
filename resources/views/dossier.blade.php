@extends('layout')
@section("titre")Tout les adresses @endsection
@section('content')
<div class="container mt-4">
    <!-- Les dossiers des client -->
    <h2 class="fw-bold text-dark mb-4">Gestion des dossiers</h2>
    <div class="table-responsive mt-3">
        <div class="dropdown float-start m-3">
            <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-funnel-fill"></i> Filter
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <li class="dropdown-item">En cours</li>
                <li class="dropdown-item">Close</li>
            </ul>
        </div>
        <a href="{{route('addDoss')}}"><button class="btn btn-danger float-end m-3">Nouveau dossier</button></a>        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nom du dossier</th>
                    <th>Statut</th>
                    <th>Avocat</th>
                    <th>Demandeur</th>
                    <th>Création</th>
                    <th>Ajouté par</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>RC-30</td>
                    <td><span class="badge bg-info text-white">En cours</span></td>
                    <td>Me Hermans Bashilwango</td>
                    <td>DIPRO</td>
                    <td>09-12-2022 17h10min54s</td>
                    <td>Me Aimé Bucko</td>
                    <td>
                        <button class="btn btn-primary me-2">Modifier</button>
                        <button class="btn btn-secondary">Voir plus</button>
                    </td>
                </tr>
                <tr>
                    <td>RC-17</td>
                    <td><span class="badge bg-danger text-white">Close</span></td>
                    <td>Me Hermans Bashilwango</td>
                    <td>Vodacom RDC</td>
                    <td>09-12-2022 14h35min33s</td>
                    <td>Me Aimé Bucko</td>
                    <td>
                        <button class="btn btn-primary me-2">Modifier</button>
                        <button class="btn btn-secondary">Voir plus</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection