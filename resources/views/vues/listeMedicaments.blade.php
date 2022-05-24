@extends('layouts.master')
@section('content')

<div class="container">
    <br />
    <div>
        <h1>Liste des medicaments : </h1>
        <br><br><br>
    </div>
    <div class="input_container">
        <input class="awsome_input" id='myInput' style="width:100%;" onkeyup='searchTable()' type='text' placeholder="Rechercher un nom de medicament...">
        <span class="awsome_input_border"/>
    </div>
    <br>
    <div class="overflow-auto" style="max-height: 600px">
    <table class="table table-active table-bordered table-striped table-responsive " id="myTable">
        <thead>
            <tr id="tableHeader">
                <th>Nom</th>
                <th>Effet</th>
                <th>Contre indication</th>
                <th>Composants</th>
            </tr>
        </thead>
        @foreach($mesMedicaments as $unMedicament)
            <tr>
                <td class="search"> {{ $unMedicament->nom_commercial }}  </td>
                <td> {{ $unMedicament->effets }}  </td>
                <td> {{ $unMedicament->contre_indication }}  </td>
                <td style="text-align:center;">
                    <a href="{{url('medicament/composantMedicament')}}/{{ $unMedicament->id_medicament }}">
                        <button type="button" class="btn btn-outline-success"> Voir les composants </button>
                    </a>
                </td>
            </tr>
        @endforeach


    </table>
    </div>
</div>
<script>
    function searchTable() {
        var input, filter, found, table, tr, td, i, j;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByClassName("search");
            for (j = 0; j < td.length; j++) {
                if (td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
                    found = true;
                }
            }
            if (found) {
                tr[i].style.display = "";
                found = false;
            } else {
                if (tr[i].id !== 'tableHeader'){
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>
@stop
