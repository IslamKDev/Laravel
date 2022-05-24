<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <script src="https://kit.fontawesome.com/cf4cc24cc7.js" crossorigin="anonymous"></script>
</head>
<style>
    /* Modify the background color */
    .navbar-custom {
        background: #ecf0f3;
        /*background-color: #171923;*/
        box-shadow: 1px 1px 12px #555;
        border-radius: 0px;
        height: 70px;
    }
    .boutonCustom{
        border-radius: 25% 10%;

    }

</style>
<body>
<header>
    <nav  class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid" >
            <a style="/*color: #e7e8f2*/ color: #1a202c" class="navbar-brand" href="{{url('/')}}">Galaxy Swiss Bourdin</a>
            @if(Session::get('id') == 0)
                <div>
                    <ul style="background-color: #ef3b2d"class="nav navbar-nav navbar-right boutonCustom">
                        <li>
                            <a href="{{url('/formLogin')}}">
                                <button class="btn btn-sm btn-outline boutonCustom" style="background-color:#8bed4f ">Se connecter</button>
                            </a>
                        </li>
                    </ul>
                </div>
            @endif
            @if (Session::get('id') > 0)
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-light fa-list"></i>
                                Liste
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{url('medicament/getlisteMedicamentOffert')}}">Liste des medicaments</a></li>
                                <li><a class="dropdown-item" href="{{url('medicament/getlisteMedicamentFamille')}}">Liste par famille</a></li>
                            </ul>

                        </li>
                        <li>
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <i class="fa-regular fa-magnifying-glass"></i>
                                Recherche
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{url('rapport/rechercheRapport')}}">Recherche un rapport de visite</a></li>
                                <li><a class="dropdown-item" href="{{url('medicament/rechercheMedicament')}}"> <i class="fa-solid fa-capsules"></i>Recherche un composants</a></li>
                            </ul>
                        </li>
                        <li>
                           <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                               Ajouter
                           </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{url('rapport/formRapport')}}">Ajouter un rapport</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul style="background-color: red" class="nav navbar-nav navbar-right boutonCustom">
                        <li><a href="{{url('getLogout')}}">
                                <button class="btn btn-sm btn-outline">Se deconnecter</button>
                            </a>
                        </li>
                    </ul>
                </div>
            @endif

        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>
</header>
<session>

</session>
<footer>

</footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
</html>
