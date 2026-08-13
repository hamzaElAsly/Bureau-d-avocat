@extends('layout')
@section("titre")Modifier Client @endsection
@section('content')
<div class="container mt-4">
    <div class="mt-2 h-100 d-flex justify-content-center" style="text-align:center">
        <div class="bg-light rounded w-50 h-100 p-4">
            <h2 class="mb-4">Modifier un client</h2>
            <form action="{{route('updateCl.store',$upCl->idClient)}}" method="post">
              @csrf @method('POST')
              @if ($errors->any())
                <div class="alert alert-danger text-start">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
              @endif
              <input type="text" name="id" value="{{$upCl->idClient}}" class="d-none form-control" placeholder="Id Client"/>
              <div class="mb-3">
                <input type="text" name="prenom" value="{{ old('prenom', $upCl->prenomClient)}}" class="form-control" placeholder="Prénom"/>
              </div>
              <div class="mb-3">
                <input type="text" name="nom" value="{{ old('nom', $upCl->nomClient)}}" class="form-control" placeholder="Nom"/>
              </div>
              <div class="mb-3">
                <input type="text" name="adrs" value="{{ old('adrs', $upCl->adressClient)}}" class="form-control" placeholder="Adresse"/>
              </div>
              <div class="mb-3">
                <input type="text" name="t1" value="{{ old('t1', $upCl->tel1)}}" class="form-control" placeholder="Nombre 1"/>
              </div>
              <div class="mb-3">
                <input type="text" name="t2" value="{{ old('t2', $upCl->tel2)}}" class="form-control" placeholder="Nombre 2"/>
              </div>
              <div class="mb-3">
                <input type="email" name="mail" value="{{ old('mail', $upCl->emailClient)}}" class="form-control" placeholder="Email"/>
              </div>
              <div class="mb-3">
                <input type="file" name="photo" class="form-control"/>
              </div>
              <div class="mb-3">
                <button type="submit" class="btn btn-info">Modifier</button>
              </div>
            </form>
        </div>
    </div>
    <a href="{{route('clients')}}"><button type="button" class="btn btn-warning">Retour</button></a>
</div>
@endsection