@extends('layouts.master')
@section('content')
    {!! Form::open(['url' => 'medicament/validerModifRapport/']) !!}

    <div class="col-md-12  col-sm-12 well well-md">
        <center><h1> Modification du medicament offert : {{$monMedicament[0]->nom_commercial}}</h1><br><br></center>
        <div class="form-horizontal">
            <br><br>
            <input type="hidden" name="id_rapport" value="{{$id_rapport}}"/>
            <input type="hidden" name="id_medicament" value="{{$id_medicament}}"/>
            <div class="row">
                <label class="col-md-3 col-sm-3 control-label">Quantité offerte </label>
                <div class="col-md-2  col-sm-2">
                    <input type="number" name="quantite_medicament" class="form-control" placeholder="date rapport" value="{{$qteMedicament[0]->qte_offerte}}" required>
                </div>
            </div>
            <br><br>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                    <button type="submit" class="btn btn-default btn-primary">
                        <span class="glyphicon glyphicon-ok"></span> Valider
                    </button>
                    &nbsp;
                    <button type="button" class="btn btn-default btn-primary"
                            onclick="javascript:window.location = '{{url('medicament/getlisteMedicamentOffert')}}';">
                        <span class="glyphicon glyphicon-remove"></span> Annuler</button>
                </div>
            </div>
            <div class="col-md-6 col-md-offset-3  col-sm-6 col-sm-offset-3">
            </div>
        </div>
    </div>
@stop
