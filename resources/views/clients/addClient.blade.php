@extends('layout')
@section("titre")Ajouter Client @endsection
@section('content')
<div class="container mt-4">
    <div class="mt-2 h-100 d-flex justify-content-center" style="text-align:center">
        <div class="bg-light rounded w-50 h-100 p-4">
            <h2 class="mb-4">Ajouter un client</h2>
            <form action="{{route('addCl')}}" method="post">@csrf
              <input type="text" name="id" class="d-none form-control" placeholder="Id Client"/>
              <div class="mb-3">
                <input type="text" name="prenom" class="form-control" placeholder="Prénom"/>
                <div id="prénomHelp" class="form-text"></div>
              </div>
              <div class="mb-3">
                <input type="text" name="nom" class="form-control" placeholder="Nom"/>
                <div id="nameHelp" class="form-text"></div>
              </div>
              <div class="mb-3">
                <input type="text" name="adrs" class="form-control" placeholder="Adresse"/>
                <div id="adressHelp" class="form-text"></div>
              </div>
              <div class="mb-3">
                <input type="text" name="t1" class="form-control" placeholder="Nombre 1"/>
                <div id="nb1Help" class="form-text"></div>
              </div>
              <div class="mb-3">
                <input type="text" name="t2" class="form-control" placeholder="Nombre 2"/>
                <div id="nb2Help" class="form-text"></div>
              </div>
              <div class="mb-3">
                <input type="email" name="mail" class="form-control" placeholder="Email"/>
                <div id="mailHelp" class="form-text"></div>
              </div>
              <div class="mb-3">
                <input type="file" name="photo" class="form-control"/>
                <div id="fileHelp" class="form-text"></div>
              </div>
              <div class="mb-3">
                <button type="submit" class="btn btn-info">Ajouter</button>
              </div>
            </form>
        </div>
    </div>
    <a href="{{route('clients')}}"><button type="button" class="btn btn-warning">Retour</button></a>
</div>
@endsection