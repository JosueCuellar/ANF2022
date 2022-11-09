@extends('finanzasViews.ratios.individual_padre', ['pageSlug' => 'ratios'])

@section('ratios')
<div class="table-responsive">
    <table class="table">
        <tr>
            <th colspan="3" class="text-center">Razones de actividad</th>
        </tr>
        <tr>
            <th width = "25%">Razón</th>
            <th width = "25%" class="text-center">Resultado</th>
        </tr>
        <tr>
            <td>Razón de rotacion de inventario</td>
            <td class="text-center">{{$rri[0]}}</td>
        </tr>
        <tr>
            <td>Razón de días de inventario</td>
            <td class="text-center">{{$rdi[0]}}</td>
        </tr>
        <tr>
            <td>Rentabilidad por Acción</td>
            <td class="text-center">{{$rpa[0]}}</td>
        </tr>
        
    </table>
</div>

@endsection