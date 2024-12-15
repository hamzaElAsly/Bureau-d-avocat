<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <title>@yield('titre')</title>
    <link rel="icon" type="image/x-icon" href="{{asset('img/logoicon.png')}}">
</head>
<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Sidebar Start -->
    <div class="sidebar pe-2 pb-3">
        <nav class="navbar bg-light navbar-light">
            {{-- LOGO --}}
            <div class="d-flex align-items-center ms-4 mb-2">
                    <a href="/"><img class="nav-item nav-link active" src="{{ asset('img/LOGO.png')}}"alt="LOGO.png" style="width: 200px; height: 100px;"></a>
            </div>
            {{-- Sidebar --}}
            <div class="navbar-nav w-100">
                <a href="{{url('/')}}" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Acceuil</a>
                
                <span class="nav-link">GESTION DOSSIER</span>
                <a href="{{route('clients')}}" class="nav-item nav-link"><i class="fa fa-user"></i>Clients/Abonnées</a>
                <a href="{{route('dossiers')}}" class="nav-item nav-link"><i class="fa fa-folder-open me-2"></i>Tout les dossiers</a>
               
                <span class="nav-link">GESTION CAISSE</span>
                <a href="table.html" class="nav-item nav-link"><i class="fa fa-lock me-2"></i>Permission</a>
                <a href="table.html" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Caisse</a>
                
                <span class="nav-link">ACCESSIORES</span>
                <a href="{{route('addUse')}}" class="nav-item nav-link"><i class="fa fa-user me-2"></i>User de système</a><hr>
                <a href="{{route('singin')}}" class="dnx nav-link"><i class="fa fa-power-off me-2" style="background-color: rgb(218, 0, 0)"></i>Déconnexion</a>
            </div> 
        </nav>
    </div>
    <!-- Sidebar End -->

    <!-- Content Start -->
    <div class="content">
        <!-- Navbar Start -->
        <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
            <a href="#" class="sidebar-toggler flex-shrink-0">
                <i class="fa fa-bars"></i>
            </a>
            <form class="d-none d-md-flex ms-4">
                <input class="form-control border-0" type="search" placeholder="Search">
            </form>
            <div class="navbar-nav align-items-center ms-auto">
                <div class="d-flex align-items-center mt-2 mb-2" style="width:50%">
                    <div class="position-relative">
                        <img class="rounded-circle" src="{{asset('img/user.jpg')}}" alt="profil" style="width: 40px; height: 40px;">
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-2">Hamza El Asly</h6>
                    </div>
                </div>
                    <a href="{{route('profil')}}"><button type="button" class="btn btn-outline-primary m-2"><i class="fa fa-id-badge me-2"></i>Mon profile</button></a>
                </div>
        </nav>
        <!-- Navbar End -->

        <!-- Content Star -->
        @yield('content')
        <!-- Content Star -->

        <!-- Footer Start -->
        <div class="container-fluid pt-4 px-4 mt-2 d-block ">
            <div class="bg-light rounded-top p-4">
                <div class="row">
                    <div class="col-12 col-sm-12 text-center text-sm-start">
                        &copy; <i><a style="color: brown" href="#">mohami.ma</a></i> , All Right Reserved. 
                    </div>
                    <div class="col-12 col-sm-12 text-center text-sm-end">
                        Designed By <b><i>EL ASLY HAMZA</i></b>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->
    </div>
    <!-- Content End -->
    
    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>

<!-- JavaScript Libraries -->
<span>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/regular.min.js" integrity="sha512-s0L3HnrNgQ+MciZHcaAlCjhbT5/p8JnZRjuV9CA/4qhX5ywNGy/4j8K6UBkFw5fdt2RVvn6aP4AKfKHhpkrKyA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/solid.min.js" integrity="sha512-BR7kmAOY+DL7VrNcDauAY0nOqLp58prNOuwMmes8bd5ET13AAorhPqzbCtH8BsGGG0/TTs9W4Tokbj4tMhFUFw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/solid.min.js" integrity="sha512-86j9kj2hqje32NDU8p9TjZesB/4i7wIlE/2Lc4+sSfGmyTRbBzBspow38bzWtl1aiCPuNd0npEw+UiTHmyUOxQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</span>


</body>
</html>