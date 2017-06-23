@extends('layouts.app')

@section('title', 'Inicio')

@section('sidebar')
@parent

@endsection

@section('content')




<h1>Editar Usuario</h1>

{!! Form::model($usuario, array('route' => array('usuario.update', $usuario->id), 'method' => 'PUT')) !!}



<div class="form-group">
    <label for="nombres">Nombres</label>
    <input type="text" class="form-control" id="nombres" name="nombres" value="{{$usuario->Nombre}}">
</div>
<div class="form-group">
    <label for="apellidos">Apellidos</label>
    <input type="text" class="form-control" id="apellidos" name="apellidos" value="{{$usuario->Apellidos}}">
</div>
<div class="form-group">
    <label for="mail">Correo Electrónico</label>
    <input type="email" class="form-control" id="mail" name="mail" value="{{$usuario->email}}">
</div>
<div class="form-group">
    <label for="telefonos">Teléfonos</label>
    <input type="text" class="form-control" id="telefonos" name="telefonos" value="{{$usuario->telefono}}">
</div>

<div class="form-group">
    <label for="chkAdmin">Administrador</label>
    <input type="checkbox" id="chkAdmin" name="chkAdmin"          
           @if($usuario->Administrador==1) checked @endif         >
</div>

<button type="submit" class="btn btn-default">Guardar <i class="fa fa-floppy-o" aria-hidden="true"></i></button>

{!! Form::close()!!}
<div>
    <a href="{{ URL::to('usuario/') }}" title="Eliminar">Volver <i class="fa fa-arrow-left" aria-hidden="true"></i></a>
</div>
@endsection