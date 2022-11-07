@extends('finanzasViews.ratios.sector_padre')

@section('ratios')
<div class="table-responsive">
    <table class="table">
        <tr>
            <th width = "25%">Razón</th>
            <th width = "14%" class="text-right">Resultado</th>
            <th width = "14%" class="text-right">Promedio</th>
            <th width = "2%"></th>
        </tr>
        @for ($i = 0; $i < count($ratios); $i++)
            @if ($ratios[$i]->double != null)
                <tr>
                    <td>{{$ratios[$i]->parametro}}</td>
                    <td class="text-right">{{$ratios[$i]->double}}</th>
                    <td class="text-right">{{number_format($promedios[$i]->prom, 2)}}</td>
                    <td></td>
                </tr>
            @else
                @if($promedios[$i]->prom != null)
                    <tr>
                        <td>{{$ratios[$i]->parametro}}</td>
                        <td class="text-right">---</td>
                        <td class="text-right">{{number_format($promedios[$i]->prom, 2)}}</td>
                        <td></td>
                    </tr>
                @else
                    <tr>
                        <td>{{$ratios[$i]->parametro}}</td>
                        <td class="text-right">---</td>
                        <td class="text-right">---</td>
                        <td></td>
                    </tr>
                @endif
            @endif
        @endfor        
    </table>
</div>

@endsection