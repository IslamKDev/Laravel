@extends('layouts.master')
@section('content')

    <div class="container">
        <br>
        <div>
            <h1>Liste des composant du medicament : @foreach($monMedicament as $medicament){{$id_medicament = $medicament->id_medicament}} {{$medicament->nom_commercial}} @endforeach</h1>
            <br><br><br>
        </div>
        <div class="overflow-auto" style="max-height: 600px">
            <table class="table table-active table-bordered table-striped table-responsive " id="myTable">
                <thead>
                <tr>
                    <th>Nom du composant</th>
                    <th>Quantité</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
                </thead>
                @foreach($mesComposants as $unComposant)
                    <tr>
                        <td>{{ $unComposant->lib_composant }}</td>
                        <td>{{ $unComposant->qte_composant }}</td>
                        <td style="text-align:center;max-width: 60px">
                            <a href="{{url('composant/formModifComposant')}}/{{ $id_medicament }}/{{$unComposant->id_composant}}">
                                <button type="button" class="btn btn-success"> Modifier </button>
                            </a>
                        </td>
                        <td style="text-align:center;max-width: 60px">
                            <a data-toggle="tooltip" data-placement="top" title="Supprimer" href="{{ url('composant/supprimerCoposantMedicament') }}/{{$unComposant->id_composant}}/{{$unComposant->id_medicament}}"
                               onclick="if(!confirm('Voulez-vous Supprimer ?')) return false;">
                                <button type="button" class="btn btn-danger"> Supprimer</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="button-ajout">
            <a href="{{url('composant/formComposant')}}/{{$id_medicament}}">
                <button type="button" class="btn btn-outline-primary"> Ajouter un composant </button>
            </a>
        </div>
    </div>
@stop
