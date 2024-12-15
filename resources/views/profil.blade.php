@extends('layout')
@section("titre")Mon Profil @endsection
@section('content')

<div class="container mt-5">
    <!-- Infos de Profil -->
    <div class="mt-2 h-100">
        <div class="bg-light rounded h-100 p-4">
            <div class="w-100 d-flex justify-content-between">
                <img src="avatar_placeholder.png" alt="Avatar" class="img-fluid w-25" style="max-width: 100px;">
                <div class="w-75">
                    <h5 class="mb-4">Infos sur vous</h5>
                    <ul class="list-unstyled">
                        <li><strong>NOM:</strong> Me Aimé Bucko</li>
                        <li><strong>TYPE:</strong> Admin</li>
                        <li><strong>DATE CREATION:</strong> 25-10-2022 10h53min54s (GMT)</li>
                        <li><strong>MAISON:</strong> Goma</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Modification du mot de passe -->
    <div class="mt-2 h-100">
        <div class="bg-light rounded h-100 p-4">
            <h4 class="mb-4">Modification de votre mot de passe</h4>
            <form class="w-75 d-flex justify-content-around">
                <input type="password" class="form-control w-50" placeholder="Nouveau mot de passe">
                <button type="submit" class="btn btn-primary w-25">Modifier</button>
            </form>
        </div>
    </div>
</div>
@endsection