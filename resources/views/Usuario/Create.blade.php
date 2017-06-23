@extends('layouts.app')

@section('title', 'Inicio')

@section('sidebar')
@parent

@endsection

@section('content')




<h1>Crear Usuario</h1>

{!! Form::open(array('url' => 'usuario'))!!}



<div class="form-group">
    <label for="nombres">Nombres</label>
    <input type="text" class="form-control" id="nombres" name="nombres" >
</div>
<div class="form-group">
    <label for="apellidos">Apellidos</label>
    <input type="text" class="form-control" id="apellidos" name="apellidos" >
</div>
<div class="form-group">
    <label for="mail">Correo Electrónico</label>
    <input type="email" class="form-control" id="mail" name="mail" >
</div>
<div class="form-group">
    <label for="telefonos">Teléfonos</label>
    <input type="text" class="form-control" id="telefonos" name="telefonos" >
</div>

<button type="submit" class="btn btn-default">Guardar <i class="fa fa-floppy-o" aria-hidden="true"></i></button>

{!! Form::close()!!}
<div>
    <a href="{{ URL::to('usuario/') }}" title="Eliminar">Volver <i class="fa fa-arrow-left" aria-hidden="true"></i></a>
</div>
@endsection