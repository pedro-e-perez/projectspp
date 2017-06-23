@extends('layouts.app')

@section('title', 'Inicio')

@section('sidebar')
@parent

@endsection

@section('content')



<h1>Asociados</h1>
<form method="GET" action="tercero">
    <div class="row ">

        <div class="col-lg-12">
            <div class="form-group">
                <label for="filtersaAsociado" class="col-lg-3">Asociado</label>
                <div class="col-lg-9">
                    <input type="text" class="form-control" id="filtersaAsociado" name="filtersaAsociado" placeholder="Filtre la información por asociado" value="{{$filtersaAsociado}}">
                    <input type="hidden" id='hdffiltersaAsociado' name='hdffiltersaAsociado' value="{{$hdffiltersaAsociado}}">
                </div>
            </div>
        </div>
      
        <div class="col-lg-12">
            <hr>
        </div>
        <div class="row">
            <div class="col-lg-12 pull-right">
                <label  class="col-lg-3"></label>
                <div class="col-lg-9">
                    <button type="submit" class="btn btn-default pull-right" id="btnGuardar">Consultar <i class="fa fa-floppy-o" aria-hidden="true"></i></button>
                </div>
            </div>

            <div class="col-lg-12">
                <hr>
            </div>
        </div>
</form>
<p>
    <a href="{{ URL::to('tercero/' .'create') }}" title="Eliminar">Crear Nuevo <i class="fa fa-plus" aria-hidden="true"></i></a>
</p>
Total {{count($terceros)}}
<table class="table table-bordered" id="informeArchivos">
    <thead>
        <tr>
            <th>Nombres y Apellidos</th>
            <th>Número Identificación</th>
            <th>Tipo Documento</th>
            <th>Telefonos</th>
            <th>Correo Electrónico</th>
            <th></th>

        </tr>
    </thead>
    <tbody>




        @if ($terceros != null) 
        @foreach ($terceros as $arc) 
        <tr>
            <td>{{ $arc->Nombre }} {{ $arc->Apellidos }}</td>
            <td>{{$arc->NumeroId }}</td>
            <td>{{$arc->TipoDoc }}</td>
            <td>{{$arc->Telefonos }}</td>
            <td>{{$arc->Email }}</td>
            <td> <a href="{{ URL::to('tercero/' . $arc->id. '/edit') }}"title="Editar Insumos">
                    <i class="fa fa-pencil-square-o" title="Editar" aria-hidden="true"></i></a>
                <a href="{{ URL::to('tercero/' . $arc->id. '') }}"
                   title="Eliminar"><i class="fa fa-times" aria-hidden="true"></i></a></td>
        </tr>


        @endforeach
        @endif
    </tbody>

</table>
{{ $terceros->links() }}
<script src="../../../js/App/Tercero/Index.js?v={{ Cache::get('js_version_number') }}" type="text/javascript"></script>
<script>
$(document).ready(page.init());

</script>
@endsection