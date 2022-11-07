@extends('finanzasViews.analisisSector.layout_analisis', ['pageSlug' => 'analisis_horizontal'])

@section('contenido_navbar')

<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h2 class="card-title">Análisis Horizontal</h2>
            </div>
            <div class="col-md-3">
                <select class="form-control"  id="selector1" >
                    <option value=-1>Seleccionar el período A...</option>
                    @foreach ($periodos as $periodo)                            
                        <option value="{{$periodo->id}}">{{$periodo->year}}</option>                            
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <select  class="form-control" id="selector2" style="display:none" >
                    <option value=-1>Seleccionar el período B...</option>
                    @foreach ($periodos as $periodo)                            
                        <option value="{{$periodo->id}}">{{$periodo->year}}</option>                            
                    @endforeach
                </select>
                
            </div>                    
        </div>
    </div>
    <div class="card-body">
        @yield('cuerpo_analisis')
    </div>
    <div class="card-footer">
        
    </div>
</div>			  		

<script>
    // function activarSelector(){
    //     alert("Hola");

    //     let selector2 = $("#selector2");
    //     selector2.show();
    // }
    // function analisisHorizontal(){
    //     alert('Hola');
    //     let selector1 = $("#selector1");
    //     let selector2 = $("#selector2");
    //     //selector2.show();
        // if(selector1!=-1 && selector2!=-1){
        //     window.location.href = window.location.href + selector1.val() + "/" + selector2.val() + "/analisissdfsd_horizontal";
        // }
    // }
    $(document).ready(function(){
        $('#selector1').on('change', function() {
        let selector2 = $("#selector2");
        selector2.show();
    });

    $('#selector2').on('change', function() {
        
        let selector1 = $("#selector1");
        let selector2 = $("#selector2");
        if(selector1!=-1 && selector2!=-1){
            window.location.href = selector1.val() + "/" + selector2.val() + "/analisis_horizontal";
        }
    });
    });


    
</script>

@endsection

