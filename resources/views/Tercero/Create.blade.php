@extends('layouts.app')

@section('title', 'Inicio')

@section('sidebar')
@parent

@endsection

@section('content')




<h1>Crear Asociado</h1>

{!! Form::open(array('url' => 'tercero'))!!}



<div class="form-group">
    <label for="nombre">Nombres</label>
    <input type="text" class="form-control" id="nombre" name="nombre" >
</div>
<div class="form-group">
    <label for="apellidos">Apellidos</label>
    <input type="text" class="form-control" id="apellidos" name="apellidos" >
</div>
<div class="form-group">
    <label for="noIdentificacion">Número Identificación</label>
    <input type="text" class="form-control" id="noIdentificacion" name="noIdentificacion" >
</div>
<div class="form-group">
    <label for="tipoDoc">Tipo Documento</label>
    
    <select class="form-control" id="tipoDoc" name="tipoDoc">
        <option value="CC">Cédula de Ciudadanía</option>
        <option value="CE">Cedula Extranjeria</option>
        <option value="TI">Tarjeta de identidad</option>
        <option value="RC">Registro civil</option>
        <option value="NI">Nit</option>
        <option value="PB">Pasaporte</option>

    </select>
</div>
<div class="form-group">
    <label for="Telefonos">Telefonos</label>
    <input type="text" class="form-control" id="Telefonos" name="Telefonos" >
</div>
<div class="form-group">
    <label for="Email">Correo Electrónico</label>
    <input type="email" class="form-control" id="Email" name="Email" >
</div>



<button type="submit" class="btn btn-default">Guardar <i class="fa fa-floppy-o" aria-hidden="true"></i></button>

{!! Form::close()!!}

<div>
    <a href="{{ URL::to('tercero/') }}" title="Eliminar">Volver <i class="fa fa-arrow-left" aria-hidden="true"></i></a>
</div>
@endsection