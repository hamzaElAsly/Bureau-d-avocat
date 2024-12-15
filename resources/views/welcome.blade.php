@extends('layout')
@section("titre")Page d'acceuil @endsection
@section('content')
<div class="container mt-4">

    <div class="dashCol bg-light p-3">
        <div class="dashCol1">
            <h4 class=" mt-3"><i class="icons nav-item fa fa-folder me-2"></i><strong>DOSSIER EN COURS</strong></h4>
            <h1 class="mt-4 mb-4">10</h1>
            <p><button type="button" class="btn btn-outline-light">Voir les dossier</button></p>
        </div>
        <div class="dashCol2">
            <h4 class=" mt-3"><i class="fa fa-calendar me-2"></i><strong>AUDIENCES ATTENTE</strong></h4>
            <h1 class="mt-4 mb-4">2</h1>
            <button type="button" class="btn btn-outline-light">Voir les audiences</button>
        </div>
        <div class="dashCol3">
            <h4 class=" mt-3"><i class="icons nav-item fa fa-user me-2"></i><strong>CLIENTS</strong></h4>
            <h1 class="mt-4 mb-4">{{$countCl}}</h1>
            <a href="{{route('clients')}}"><button type="button" class="btn btn-outline-light">Voir les partenaires</button></a>
        </div>
    </div>

    {{-- Liste des audiences --}}
    <div class="tableau bg-light rounded h-100 p-4 mt-2">
        <h4 class="mb-4">Audiences en attente</h4>
        <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">dossier</th>
                        <th scope="col">Date audience</th>
                        <th scope="col">Lieu</th>
                        <th scope="col">Défensseur</th>
                        <th scope="col">Demandant</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">MA-29</th>
                        <td scope="row">09/12/2023</td>
                        <td scope="row">Tribunal de grande Instance</td>
                        <td scope="row">Personne X</td>
                        <td scope="row">Personne Y </td>
                        <td scope="row"><button type="button" class="btn btn-info">Afficher</button></td>
                    </tr>
                    <tr>
                        <th scope="row">MA-45</th>
                        <td scope="row">25/03/2024</td>
                        <td scope="row">Auditorat Militaire</td>
                        <td scope="row">Personne X</td>
                        <td scope="row">Personne Y </td>
                        <td scope="row"><button type="button" class="btn btn-info">Afficher</button></td>
                    </tr>
                </tbody>
        </table>
    </div>
    
    {{-- Cherche un Cabinet --}}
    <div class="todoliste h-100 bg-light rounded mt-2 p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h4 class="mb-0">Cabinets</h4>
        </div>
        <div class="mb-2">
            <input class="form-control bg-transparent col-sm-10" type="text" placeholder="Localisation de cabinet">
            <button type="button" class="btn btn-success  col-sm-8 mt-2 ms-5">Chercher un Cabinet</button>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title" style="text-align:center">Cabinet Flan</h5>
                Adresse :<b><p class="card-text">Boulevard Mohamed VI, Fes 30030.</p></b><br>
                Email :<b><p class="card-text">cabinet-flane@gmail.com</p></b>
                <button type="button" class="btn btn-outline-secondary  col-sm-8 mt-2 ms-5">Détails</button>
            </div>
        </div>
    </div>
</div>
@endsection