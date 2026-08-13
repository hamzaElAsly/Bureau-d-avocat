@extends('layout')
@section("titre")Liste des Clients @endsection
@section('content')
<div class="container mt-4">
    <div class="mt-2 h-100">
        <div class="bg-light rounded h-100 p-4">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            <div class="d-flex justify-content-between flex-wrap">
                <h4 class="mb-4 float-start">Liste des clients</h4>
                <form class="form-inline mb-3" method="GET">
                    <input class="form-control mr-sm-2" type="search" name="search" value="{{ request('search') }}" placeholder="Chercher un nom, email ou téléphone">
                    <button type="submit" class="btn btn-info mt-2">Rechercher</button>
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
                            <td scope="row">
                                <a href="{{route('infoCl',$cl->idClient)}}"><button type="button" class="btn btn-info btn-sm">Voir plus</button></a>
                                <a href="{{route('updateCl',$cl->idClient)}}"><button type="button" class="btn btn-primary btn-sm">Modifier</button></a>
                                <form action="{{route('deleteCl',$cl->idClient)}}" method="POST" class="d-inline" onsubmit="return confirm('Supprimer ce client ?');">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @if ($dbClient->isEmpty())
                        <tr><td colspan="6" class="text-center text-muted">Aucun client trouvé.</td></tr>
                    @endif
                 </tbody>
            </table>
            {{ $dbClient->links() }}
        </div>
    </div>
</div>
@endsection