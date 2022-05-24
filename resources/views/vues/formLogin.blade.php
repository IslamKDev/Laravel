@extends('layouts.master')
@section('content')
    {!! Form::open(['url' => 'getConnexion']) !!}
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../resources/css/connexion.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <script src="https://kit.fontawesome.com/cf4cc24cc7.js" crossorigin="anonymous"></script>
    <title>Connexion</title>
</head>
<body>
<br />
<br />
<h1 style="color: #1a202c; text-align: center;"><u>Authentification</u> : </h1>
<div class="col-md-12 well well-md login-form">
    <div class="wrapper">
        <div class="logo">
            <img src="../resources/img/profilGsb.png" alt="">
        </div>
        <div class="text-center mt-4 name">
            GSB
        </div>
        <form class="p-3 mt-3">
            <label class="col-md-6 control-label">Identifiant : </label>
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="login" id="login" class="form-control" placeholder="Votre identifiant" required autofocus>
            </div>
            <br />
            <label class="col-md-6 control-label">Mot de passe : </label>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="pwd" id="pwd" class="form-control" placeholder="Votre mot de passe" required>
            </div>
            <button type="submit" class="btn btn-default btn-primary btn mt-3">
                <span class="glyphicon glyphicon-log-in "></span>
                Valider
            </button>
        </form>
        <div class="text-center fs-6">
            <a href="#">Mot de passe oublié ?</a> ou <a href="#">S'inscrire</a>
        </div>
    </div>
    <div class="col-md-6 col-md-offset-3">
        @include('vues/error')
    </div>
</div>
</div>
{{ Form::close() }}
@stop
</body>
</html>
