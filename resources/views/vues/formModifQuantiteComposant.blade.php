@extends('layouts.master')
@section('content')
    {!! Form::open(['url' => 'composant/modifComposant/']) !!}

    <div class="col-md-12  col-sm-12 well well-md">
        <center><h1> Modification de la quantité du composant : </h1><br><br></center>
        <div class="form-horizontal">
            <br><br>
            <input type="hidden" name="id_medicament" value="{{$id_medicament}}"/>
            <input type="hidden" name="id_composant" value="{{$id_composant}}"/>
            <div class="row">
                <label class="col-md-3 col-sm-3 control-label">Quantité composant : </label>
                <div class="col-md-2  col-sm-2">
                    <input type="text" name="qte_composant" class="form-control" placeholder="Quantité de composant dans le médicament"  value="{{$unComposant[0]->qte_composant}}" required>
                </div>
            </div>
            <br><br>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                    <button type="submit" class="btn btn-default btn-primary">
                        <span class="glyphicon glyphicon-ok"></span> Valider
                    </button>
                    &nbsp;<a href={{url('medicament/composantMedicament')}}/{{ $id_medicament }}>
                    <button type="button" class="btn btn-default btn-primary">Annuler</button>
                    </a>
                </div>
            </div>
            <div class="col-md-6 col-md-offset-3  col-sm-6 col-sm-offset-3">
            </div>
        </div>
    </div>
@stop
