@extends('layouts.app', ['pageSlug' => 'ratio general'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
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
                    </div>
                </div>
                <div class="card-body">
                    <div>
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
                            <td>
                                <a href="{{route('ratioPorSector.show',$item->id)}}" ><i class="fa fa-edit"></i></a>
                                <a href="{{route('ratioPorSector.destroy',$item)}}" data-toggle="modal" data-target="#deleteModal" data-sectorid="{{$item->id}}" ><i class="fas fa-trash-alt"></i></a>
                            </td>

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

@endsection
