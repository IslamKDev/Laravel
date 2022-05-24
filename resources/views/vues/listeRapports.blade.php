@extends('layouts.master')
@section('content')

<div class="container">
    <div>
        <h1>Liste des rapports</h1>
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
                <th>Nom praticien</th>
                <th>Date rapport</th>
                <th>Bilan</th>
                <th>Motif</th>
            </tr>
        </thead>
        @foreach($mesRapports as $unRapport)
            <tr>
                <td class="search"> {{ $unRapport->nom_praticien }}  </td>
                <td class="search"> {{ $unRapport->date_rapport }}  </td>
                <td> {{ $unRapport->bilan }}  </td>
                <td> {{ $unRapport->motif }}  </td>
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
