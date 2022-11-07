@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="title"><h1>Épsilon - Sistema Informático de Análisis Financiero</h1></div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-10">
                            <img class="img" src="{{ asset('black') }}/img/4393 (1).png" >
                        </div>
                    </div>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('black') }}/js/plugins/chartjs.min.js"></script>
    <script>
        $(document).ready(function() {
          demo.initDashboardPageCharts();
        });
    </script>
@endpush
