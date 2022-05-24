@extends('layouts.master')
@section('content')
    {!! Form::open(['url' => 'rapport/validerRapport/']) !!}
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
    <div class="col-md-12  col-sm-12 well well-md">
        <h1 style="text-align: center">
            Ajout d'un rapport de visite
        </h1>
            <br />
            <br />
        <div class="col-md-12 well well-md login-form">
            <div class="wrapper">
                <form class="p-3 mt-3">
                    <div class="form-horizontal">
                        <div class="row">
                            <label class="col-md-3">
                                Liste des praticiens :
                            </label>
                            <select class="col-md-2" name="id_praticien" required>
                                <option>
                                    Selectionner un praticien
                                </option>
                                @foreach($mesPraticiens as $unPraticien)
                                    <option value="{{$unPraticien->id_praticien}}">
                                        {{$unPraticien->nom_praticien}} {{$unPraticien->prenom_praticien}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <br />
                        <br />
                        <div class="row">
                            <label class="col-md-3 col-sm-3 control-label">
                                Date rapport :
                            </label>
                            <div class="col-md-2  col-sm-2">
                                <input type="date" name="date_rapport" class="form-control" placeholder="date rapport" required>
                            </div>
                        </div>
                        <br />
                        <br />
                        <div class="row">
                            <label class="col-md-3 col-sm-3 control-label">
                                Bilan :
                            </label>
                            <div class="col-md-2  col-sm-2">
                                <input type="text" name="bilan" class="form-control" placeholder="Bilan du rapport" required>
                            </div>
                        </div>
                        <br />
                        <br />
                        <div class="row">
                            <label class="col-md-3 col-sm-3 control-label">
                                Motif :
                            </label>
                            <div class="col-md-2  col-sm-2">
                                <input type="text" name="motif" class="form-control" placeholder="Motif du rapport" required>
                            </div>
                        </div>
                        <br />
                        <br />
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                                <button type="submit" class="btn btn-default btn-primary">
                                    <span class="glyphicon glyphicon-ok">
                                    </span>
                                    Valider
                                </button>
                                &nbsp
                                <button type="button" class="btn btn-default btn-primary" onclick="javascript:window.location = '{{url('rapport/rechercheRapport')}}';">
                                    <span class="glyphicon glyphicon-remove">
                                    </span>
                                    Annuler
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
