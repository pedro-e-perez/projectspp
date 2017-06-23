@extends('layouts.app')

@section('title', 'Inicio')

@section('sidebar')
@parent

@endsection

@section('content')




<h1>Eliminar Usuario</h1>

{!! Form::model($usuario, array('route' => array('usuario.destroy', $usuario->id), 'method' => 'DELETE')) !!}



<div class="form-group">
    <label >Nombres</label>
    <label >{{$usuario->Nombre}}</label>

</div>
<div class="form-group">
    <label >Apellidos</label>
    <label >{{$usuario->Apellidos}}</label>
</div>
<div class="form-group">
    <label >Correo Electrónico</label>
    <label >{{$usuario->email}}</label>
</div>
<div class="form-group">
    <label>Teléfonos</label>
    <label >{{$usuario->telefono}}</label>
</div>

<button type="submit" class="btn btn-default">Guardar <i class="fa fa-floppy-o" aria-hidden="true"></i></button>

{!! Form::close()!!}
<div>
    <a href="{{ URL::to('usuario/') }}" title="Eliminar">Volver <i class="fa fa-arrow-left" aria-hidden="true"></i></a>
</div>
@endsection