@extends('layout')
@section("titre")Ajouter un dossier @endsection
@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Nouveau dossier</h1>
    <div class="bg-light m-2 pb-5 p-4">
        <form>
            <div class="mb-3">
                <input type="text" class="form-control" id="nomDossier" placeholder="Nom du dossier (Ex: RC-001)">
            </div>

            <div class="mb-3">
                <label for="choixAvocat" class="form-label">Choisissez l'avocat :</label>
                <select class="form-select" id="choixAvocat">
                    <option selected>Choisissez l'avocat</option>
                    <option value="1">Avocat 1</option>
                    <option value="2">Avocat 2</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Le défenseur est-il un client/abonné de la maison ?</label>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="clientMaison" id="ouiClient" value="oui">
                        <label class="form-check-label" for="ouiClient">Oui</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="clientMaison" id="nonClient" value="non">
                        <label class="form-check-label" for="nonClient">Non</label>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="choixClientPartenaire" class="form-label">Choisissez le Client partenaire</label>
                <select class="form-select" id="choixClientPartenaire">
                    <option selected>Choisissez le Client partenaire :</option>
                    <option value="1">Liste des Clients</option>
                </select>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Degré du dossier</label>
                    <div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="degreDossier" id="choisirDegre" value="choisir" checked>
                            <label class="form-check-label" for="choisirDegre">Choisir</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="degreDossier" id="autreDegre" value="autre">
                            <label class="form-check-label" for="autreDegre">Autre à préciser</label>
                        </div>
                    </div>
                    <select class="form-select mt-2">
                        <option selected>Choisissez le degré</option>
                        <option value="1">Degré 1</option>
                        <option value="2">Degré 2</option>
                        <option value="2">Degré ...</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Catégorie du dossier</label>
                    <div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="categorieDossier" id="choisirCategorie" value="choisir" checked>
                            <label class="form-check-label" for="choisirCategorie">Choisir</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="categorieDossier" id="autreCategorie" value="autre">
                            <label class="form-check-label" for="autreCategorie">Autre à préciser</label>
                        </div>
                    </div>
                    <select class="form-select mt-2">
                        <option selected>Choisissez la Catégorie</option>
                        <option value="1">Catégorie 1</option>
                        <option value="2">Catégorie 2</option>
                    </select>
                </div>
            </div>
            <!-- Description du dossier -->
            <div class="mb-3">
                <label for="descDoss" class="form-label">Décrivez le cas du dossier ici :</label>
                <textarea class="form-control" id="descDoss" rows="5" placeholder="Décrivez le dossier..."></textarea>
            </div>
            <button type="submit" class="m-4 btn btn-primary">Ajouter</button>
            <button type="reset" class="btn btn-info">Réinitialiser</button>
            
        </form>
        <a href="{{route('dossiers')}}"><button class="float-end btn btn-warning">Retour</button></a>
    </div>
</div>
@endsection