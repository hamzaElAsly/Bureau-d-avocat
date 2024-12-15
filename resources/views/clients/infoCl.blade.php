@extends('layout')
@section("titre")Infos de Client @endsection
@section('content')
<div class="container mt-5">
    <div class="row">
        <!-- Infos client -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center" id="profilInfoCl">
                    <img src="{{ asset($client->imageClient) }}"   {{-- asset('img/profil.jpg')  --}}
                        style="width: 250px; height:250px; margin:auto; border-radius:50%;"
                        alt="Profil Client" class="mb-3">
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
                    <h4 class="text-black-50 mt-3">Ses dossiers en cours</h4>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Date</th>
                                <th>Défendeur</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>MR-17</td>
                                <td>09-12-2022 14h35min33s</td>
                                <td>Mr Oussama Hadaoui</td>
                                <td><button class="btn btn-primary">Ouvrir</button></td>
                            </tr>
                            <tr>
                                <td>MR-99</td>
                                <td>02-12-2022 10h25min18s</td>
                                <td>Mr Mohammed Masoudi</td>
                                <td><button class="btn btn-primary">Ouvrir</button></td>
                            </tr>
                        </tbody>
                    </table>
                    <button class="btn btn-secondary">Exporter sous excel</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection