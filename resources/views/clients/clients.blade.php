@extends('layout')
@section("titre")Liste des Clients @endsection
@section('content')
<div class="container mt-4">
    <div class="mt-2 h-100">
        <div class="bg-light rounded h-100 p-4">
            <div class="d-flex justify-content-between">
                <h4 class="mb-4 float-start">Liste des clients</h4>
                <form class="form-inline">
                    <input class="form-control mr-sm-2" type="search" placeholder="Chercher un Nom">
                </form>
                <a href="{{route('addCl')}}" class="mb-4 float-end btn btn-danger">
                    <i class="fa fa-plus"></i> Ajouter un nouveau client
                </a>
            </div>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Téléphone 1</th>
                        <th scope="col">Téléphone 2</th>
                        <th scope="col">Adresse</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dbClient as $cl)
                        <tr>
                            <th scope="row">{{$cl->prenomClient}} {{$cl->nomClient}}</th>
                            <td scope="row">{{$cl->tel1}}</td>
                            <td scope="row">{{$cl->tel2}}</td>
                            <td scope="row">{{$cl->adressClient}}</td>
                            <td scope="row">{{$cl->emailClient}}</td>
                            <td scope="row"><a href="{{route('infoCl',$cl->idClient)}}"><button type="button" class="btn btn-info">Voir plus</button></a></td>
                        </tr>
                    @endforeach
                 </tbody>
            </table>
        </div>
    </div>
</div>
@endsection