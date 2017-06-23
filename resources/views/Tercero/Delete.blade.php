@extends('layouts.app')

@section('title', 'Inicio')

@section('sidebar')
@parent

@endsection

@section('content')

<h1>Eliminar Asociado</h1>

{!! Form::model($tercero, array('route' => array('tercero.destroy', $tercero->id), 'method' => 'DELETE')) !!}



<div class="form-group">
    <label >Nombre</label>
    <label >{{$tercero->Nombre}}</label>

</div>
<div class="form-group">
    <label >Apellidos</label>
    <label >{{$tercero->Apellidos}}</label>
</div>
<div class="form-group">
    <label >Número Identificación</label>
    <label >{{$tercero->NumeroId}}</label>
</div>

<div class="form-group">
    <label >Tipo Documento</label>
    <label >{{$tercero->TipoDoc}}</label>
</div>
<div class="form-group">
    <label >Telefonos</label>
    <label >{{$tercero->Telefonos}}</label>
</div>
<div class="form-group">
    <label >Correo Electrónico</label>
    <label >{{$tercero->Email}}</label>
</div>



<button type="submit" class="btn btn-default">Guardar <i class="fa fa-floppy-o" aria-hidden="true"></i></button>

{!! Form::close()!!}
<div>
    <a href="{{ URL::to('tercero/') }}" title="Eliminar">Volver <i class="fa fa-arrow-left" aria-hidden="true"></i></a>
</div>
@endsection