@extends('layouts.master')
@section('content')

<div class="container">
    <div>
        <h1>Famille de medicaments</h1>
        <br><br><br>
    </div>
    <div class="overflow-auto" style="max-height: 600px">
    <table class="table table-active table-bordered table-striped table-responsive ">
        <thead>
            <tr>
                <th>Famille</th>
                <th>Voir</th>
            </tr>
        </thead>
        @foreach($mesFamilles as $uneFamille)
            <tr>
                <td>{{$uneFamille->lib_famille}}</td>
                <td style="text-align:center;">
                    <a href="{{url('medicament/medicamentFamille')}}/{{ $uneFamille->id_famille }}">
                        <button type="button" class="btn btn-outline-primary"> Voir les medicaments </button>
                    </a>
                </td>
            </tr>
        @endforeach


    </table>
    </div>
</div>

@stop
