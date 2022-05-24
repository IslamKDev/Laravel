@extends('layouts.master')
@section('content')
<div class="container">
    <div class="blanc">
        <br><br><br>
        <h1>Liste des medicaments de la famille @foreach($maFamille as $famille) {{$famille->lib_famille}} @endforeach</h1>
        <br><br><br>
    </div>

    <table class="table table-bordered table-striped table-responsive">
        <thead>
        <tr>
            <th>Nom</th>
            <th>Effet</th>
            <th>Contre indication</th>
        </tr>
        </thead>
        @foreach($mesMedicamentsFamille as $unMedicament)
        <tr>
            <td> {{ $unMedicament->nom_commercial }}  </td>
            <td> {{ $unMedicament->effets }}  </td>
            <td> {{ $unMedicament->contre_indication }}  </td>

        </tr>
        @endforeach
    </table>
    <br><br><br>
    <div style="text-align: center">
        <a href={{url('medicament/getlisteMedicamentFamille')}}>
            <button type="button" class="btn btn-primary">Retour à la liste de famille</button>
        </a>
    </div>
    @include('vues/error')
</div>
@stop

