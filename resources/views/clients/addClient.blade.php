@extends('layout')
@section("titre")Ajouter Client @endsection
@section('content')
<div class="container mt-4">
    <div class="mt-2 h-100 d-flex justify-content-center" style="text-align:center">
        <div class="bg-light rounded w-50 h-100 p-4">
            <h2 class="mb-4">Ajouter un client</h2>
            <form action="{{route('addCl.store')}}" method="post">@csrf
              @if ($errors->any())
                <div class="alert alert-danger text-start">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
              @endif
              <div class="mb-3">
                <input type="text" name="prenom" class="form-control" value="{{ old('prenom') }}" placeholder="Prénom"/>
              </div>
              <div class="mb-3">
                <input type="text" name="nom" class="form-control" value="{{ old('nom') }}" placeholder="Nom"/>
              </div>
              <div class="mb-3">
                <input type="text" name="adrs" class="form-control" value="{{ old('adrs') }}" placeholder="Adresse"/>
              </div>
              <div class="mb-3">
                <input type="text" name="t1" class="form-control" value="{{ old('t1') }}" placeholder="Nombre 1"/>
              </div>
              <div class="mb-3">
                <input type="text" name="t2" class="form-control" value="{{ old('t2') }}" placeholder="Nombre 2"/>
              </div>
              <div class="mb-3">
                <input type="email" name="mail" class="form-control" value="{{ old('mail') }}" placeholder="Email"/>
              </div>
              <div class="mb-3">
                <input type="file" name="photo" class="form-control"/>
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