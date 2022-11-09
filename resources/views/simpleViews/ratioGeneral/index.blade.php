@extends('layouts.app', ['pageSlug' => 'ratioGeneral'])

@section('content')
<!--incluir el css de la barra de loading (está en style.css) sino llega a servir la importación-->
    <div class="row">
        <div class="col-md-12">
            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif
            @if (session('errores'))
                <div class="alert alert-dark">{{ session('errores') }}</div>
            @endif
            @if ($errors->any())
                <div class="alert alert-dark">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li class="alerta-error">
                        {{ $error }}&nbsp;&nbsp;<i class="tim-icons icon-alert-circle-exc"></i>
                        </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-5">
                            <h2 class="card-title">Ratios generales por sector</h2>
                        </div>
                        <div class="col-md-7 text-right">
                            <form action="">
                                <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#aniadir_manual">Agregar Ratio por sector</i></button>
                            </form>

                        </div>

                        <div class="modal fade" id="descarte" tabindex="-1" role="dialog" aria-labelledby="auto_label" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="auto_label">Descarte del catalogo</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3>¿Esta Seguro de descartar el catalogo de cuentas?</h3>
                                        <p>Recuerda que esta acción no podrá revertirse </p>
                                    </div>
                                </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <form action="{{route('cuenta.deleteall')}}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-primary " >SI</button>
                                    </form>

                                </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal de ingreso -->
                        <div class="modal fade" id="aniadir_manual" tabindex="-1" role="dialog" aria-labelledby="manual_label" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <form action="{{route('ratioGeneral_store')}}" method="post" id="formCuenta">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="manual_label">Añade una cuenta nueva a el catalogo</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">

                                                <div class="ml-auto col-md-12">
                                                    <select class="periodo_id form-control" name="periodo_id" id="periodo_id">
                                                        <option selected='true' disabled='disabled'>Seleccionar periodo contable</option>
                                                            @foreach( $anios as $item )
                                                                <option value="{{ $item->id }}">{{ $item->year }}</option>
                                                            @endforeach
                                                    </select>
                                                    <p><br></p>
                                                    <select class="ratio_id form-control" name="ratio_id" id="ratio_id">
                                                        <option selected='true' disabled='disabled'>Seleccionar ratio</option>
                                                            @foreach( $ratios as $item )
                                                                <option value="{{ $item->id }}">{{ $item->parametro}}</option>
                                                            @endforeach
                                                    </select>
                                                    <p><br></p>
                                                    <select class="sector_id form-control" name="sector_id" id="sector_id">
                                                        <option selected='true' disabled='disabled'>Seleccionar sector</option>
                                                            @foreach( $sectors as $item )
                                                                <option value="{{ $item->id }}">{{ $item->nombre}}</option>
                                                            @endforeach
                                                    </select>
                                                    <p><br></p>
                                                    <input id="valor" type="number" step="0.01" class="form-control" name="valor" placeholder="Ingrese valor del ratio" >
                                                </div>

                                            </div>


                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-warning" form="formCuenta">Registrar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                        <table class="table tablesorter" id="tabla_catalogo_cuentas">
                            <thead class=" text-primary">
                            <tr>
                                <th>Id</th>
                                <th>Periodo</th>
                                <th>Ratio</th>
                                <th>Sector</th>
                                <th>Valor</th>
                                <th>Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ratiosGen as $item)
                            <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->year}}</td>
                            <td>{{$item->parametro}}</td>
                            <td>{{$item->nombre}}</td>
                            <td>{{$item->valor}}</td>
                            <form id="formulario{{$item->id}}" action="{{route('ratioGeneral.destroy', $item->id)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <!--td class="text-right"-->
                                        <td>
                                            <!--input hidden name="id_cuenta" value=""/-->
                                            <div class="btn-group" role="group">
                                                <!--boton de eliminar-->
                                                <button type="button"  class="btn btn-sm btn-warning" onclick="confirmar('formulario{{$item->id}}')">
                                                Eliminar</button>
                                            </div>
                                        </td>
                            </form>
                            </tr>
                                @endforeach
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">

        </div>
        <div class="modal-body">
            <h6 class="text-center">Cargando...</h6>
            <div class="loader">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
              </div>
        </div>

      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript">
    $("#archivo").change(function(){

        $("#botonarchivo").prop("disabled", this.files.length == 0);
    });
</script>
@endsection
