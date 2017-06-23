@extends('layouts.app')

@section('title', 'Inicio')

@section('sidebar')
@parent

@endsection

@section('content')




<h1>Crear Tipo Documento</h1>


{!! Form::model($tipoDocumento, array('route' => array('tipoDocumento.update', $tipoDocumento->id), 'method' => 'PUT')) !!}



<div class="form-group">
    <label for="nombres">Nombre</label>
    <input type="text" class="form-control" id="nombre" name="nombre" value="{{$tipoDocumento->Nombre}}">
</div>
<div class="form-group">
    <label for="apellidos">Nomenclatura</label>
    <input type="text" class="form-control" id="nomenclatura" name="nomenclatura" value="{{$tipoDocumento->Nomenclatura}}" >
</div>


<button type="submit" class="btn btn-default">Guardar <i class="fa fa-floppy-o" aria-hidden="true"></i></button>

{!! Form::close()!!}
<div>
    <a href="{{ URL::to('tipoDocumento/') }}" title="Eliminar">Volver <i class="fa fa-arrow-left" aria-hidden="true"></i></a>
</div>
@endsection