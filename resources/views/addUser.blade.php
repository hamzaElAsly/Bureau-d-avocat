@extends('layout')
@section("titre")Users @endsection
@section('content')
<div class="container mt-4">
    <!-- Section d'ajout d'un utilisateur -->
    <div class="mt-2 h-100">
        <div class="bg-light rounded h-100 p-4">
            <h5 class="mb-4">Ajout d'un utilisateur</h5>
            <div class="d-flex justify-content-between">
                <form class="w-100 mb-3">
                    <div class="d-flex justify-content-around mb-3">
                            <input type="text" class="form-control w-25" placeholder="Nom de la personne">
                            <select class="form-select w-25">
                                <option selected>Choisir sa catégorie</option>
                                <option value="1">Admin</option>
                                <option value="2">Associé</option>
                                <option value="3">Utilisateur</option>
                            </select>
                            <select class="form-select w-25">
                                <option selected>Choisir son cabinet</option>
                                <option value="1">Goma</option>
                                <option value="2">Kinshasa</option>
                                <option value="3">Lubumbashi</option>
                            </select>
                    </div>
                    <div class="row mb-3 d-flex justify-content-around">
                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-text">+243 (RDC)</span>
                                <input type="text" class="form-control" placeholder="numéro sans 0 ici...">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <input type="email" class="form-control" placeholder="Email de la personne">
                        </div>
                    </div>
                    <div class="d-flex justify-content-around">
                        <button type="submit" class="btn btn-info">Ajouter l'utilisateur</button>
                    </div>
                </form>
            </div>
        </div>            
    </div>

    <!-- Section des utilisateurs enregistrés -->
    <div class="mt-2 h-100">
        <div class="bg-light rounded h-100 p-4">
            <h5 class="mb-4 ">Les utilisateurs enregistrés ici</h5>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Type</th>
                        <th scope="col">Cabinet</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Me Aimé Bucko</td>
                        <td>Admin</td>
                        <td>Goma</td>
                        <td>817647472</td>
                        <td>bashilwangohermans@gmail.com</td>
                        <td>
                            <button class="btn btn-danger btn-sm">Bloquer</button>
                            <a href="#"><button class="btn btn-primary btn-sm">Modifier</button></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Me Hermans Bashilwango</td>
                        <td>Associé</td>
                        <td>Goma</td>
                        <td>817151442</td>
                        <td>bashilwangohermans@kbh-services.org</td>
                        <td>
                            <button class="btn btn-danger btn-sm">Bloquer</button>
                            <a href="#"><button class="btn btn-primary btn-sm">Modifier</button></a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <button class="btn btn-secondary">Exporter sous excel</button>
        </div>
    </div>
</div>
@endsection