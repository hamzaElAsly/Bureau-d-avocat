<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Inscription | Cabinet d'avocat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="img/favicon.ico" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-md-6 col-lg-5 text-center mb-4 mb-md-0">
                    <a href="/"><img src="img/LOGO.png" alt="LOGO" style="max-width: 100%; width: 360px; height: auto;"></a>
                </div>
                <div class="col-12 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        <h3 class="mb-4">Register</h3>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach
                            </div>
                        @endif

                        <form method="POST" action="{{ route('register.store') }}">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingNom" name="nom" value="{{ old('nom') }}" placeholder="nom" required autofocus>
                                <label for="floatingNom">Nom</label>
                                @error('nom') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingPrenon" name="prenon" value="{{ old('prenon') }}" placeholder="prénom" required>
                                <label for="floatingPrenon">Prénom</label>
                                @error('prenon') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="tel" class="form-control" id="floatingTel" name="tel" value="{{ old('tel') }}" placeholder="0612345678" required>
                                <label for="floatingTel">Téléphone</label>
                                @error('tel') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingEmail" name="email" value="{{ old('email') }}" placeholder="nom@example.com" required>
                                <label for="floatingEmail">Email</label>
                                @error('email') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="mot de passe" required>
                                <label for="floatingPassword">Mot de passe</label>
                                @error('password') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" class="form-control" id="floatingPasswordConfirmation" name="password_confirmation" placeholder="confirmer le mot de passe" required>
                                <label for="floatingPasswordConfirmation">Confirmer le mot de passe</label>
                            </div>
                            <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Créer le compte</button>
                        </form>

                        <p class="text-center mb-0">Déjà un compte ? <a href="{{ route('login') }}">Connexion</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
