@extends('layouts.master')
@section('content')
<div class="container">
    <br />
    <br />
        <div class="blanc">
            <h1>Liste des medicaments :</h1>
        <br><br>
        </div>

        <table class="table table-bordered table-striped table-responsive">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Effet</th>
                    <th>Contre indication</th>
                    <th>Quantité offerte</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            @foreach($mesMedicaments as $unMedicament)
            <tr>
                <td> {{ $unMedicament->nom_commercial }} </td>
                <td> {{ $unMedicament->effets }} </td>
                <td> {{ $unMedicament->contre_indication }} </td>
                <td style="text-align: center"> {{ $unMedicament->qte_offerte }} </td>
                <td style="text-align:center;">
                    <a href="{{url('medicament/modifierMedicaments')}}/{{ $unMedicament->id_medicament }}/{{ $unMedicament->id_rapport }}">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                </td>
                <td style="text-align:center;">
                    <a data-toggle="tooltip" data-placement="top" title="Supprimer" href="{{ url('medicament/supprimerMedicamentOffert') }}/{{$unMedicament->id_medicament}}/{{$unMedicament->id_rapport}}"
                       onclick="if(!confirm('Voulez-vous vraiment supprimer ce medicament ?')) return false;">
                        <i style="color: red;"class="fa-solid fa-trash-can"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </table>
    @include('vues/error')
</div>
@stop

