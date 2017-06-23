@extends('layouts.app')

@section('title', 'Inicio')

@section('sidebar')
@parent

@endsection

@section('content')




<h1>Editar Password</h1>

{!! Form::model($usuario, array('route' => array('usuario.update', $usuario->id), 'method' => 'PUT')) !!}


<div class="form-group">
    <label for="nombres">Nombres</label>
    <span  id="nombres" >{{$usuario->Usuario}}</span>
</div>
<div class="form-group">
    <label for="nombres">Nombres</label>
    <span  id="nombres" >{{$usuario->Nombre}}</span>
</div>
<div class="form-group">
    <label for="apellidos">Apellidos</label>
    <span  id="nombres" >{{$usuario->Apellidos}}</span>
</div>
<div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password" value="{{$usuario->Pwr}}">
</div>
<input type="hidden" id="editpwr" name="editpwr" value="1">
<button type="submit" class="btn btn-default">Guardar <i class="fa fa-floppy-o" aria-hidden="true"></i></button>

{!! Form::close()!!}
<div>
    <a href="{{ URL::to('usuario/') }}" title="Eliminar">Volver <i class="fa fa-arrow-left" aria-hidden="true"></i></a>
</div>
@endsection