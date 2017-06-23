@extends('layouts.app')

@section('title', 'Inicio')

@section('sidebar')
@parent

@endsection

@section('content')




<h1>Editar Asociado</h1>


{!! Form::model($tercero, array('route' => array('tercero.update', $tercero->id), 'method' => 'PUT')) !!}


<div class="form-group">
    <label for="nombre">Nombres</label>
    <input type="text" class="form-control" id="nombre" name="nombre"  value='{{$tercero->Nombre}}'>
</div>
<div class="form-group">
    <label for="apellidos">Apellidos</label>
    <input type="text" class="form-control" id="apellidos" name="apellidos" value='{{$tercero->Apellidos}}' >
</div>
<div    class="form-group">
    <label for="noIdentificacion">Número Identificación</label>
    <input type="text" class="form-control" id="noIdentificacion" name="noIdentificacion" value='{{$tercero->NumeroId}}' >
</div>
<div class="form-group">
    <label for="tipoDoc">Tipo Documento</label>

    <select class="form-control" id="tipoDoc" name="tipoDoc">
        <option <?php if ($tercero->TipoDoc == 'CC') echo 'selected'; ?> value="CC">Cédula de Ciudadanía</option>
        <option <?php if ($tercero->TipoDoc == 'CE') echo 'selected'; ?> value="CE">Cedula Extranjeria</option>
        <option  <?php if ($tercero->TipoDoc == 'TI') echo 'selected'; ?> value="TI">Tarjeta de identidad</option>
        <option <?php if ($tercero->TipoDoc == 'RC') echo 'selected'; ?>value="RC">Registro civil</option>
        <option <?php if ($tercero->TipoDoc == 'NI') echo 'selected'; ?> value="NI">Nit</option>
        <option <?php if ($tercero->TipoDoc  == 'PB') echo 'selected'; ?> value="PB">Pasaporte</option>

    </select>
</div>
<div class="form-group">
    <label for="Telefonos">Telefonos</label>
    <input type="text" class="form-control" id="Telefonos" name="Telefonos" value='{{$tercero->Telefonos}}' >
</div>
<div class="form-group">
    <label for="Email">Correo Electrónico</label>
    <input type="email" class="form-control" id="Email" name="Email" value='{{$tercero->Email}}' >
</div>


<button type="submit" class="btn btn-default">Guardar <i class="fa fa-floppy-o" aria-hidden="true"></i></button>

{!! Form::close()!!}
<div>
    <a href="{{ URL::to('tercero/') }}" title="Eliminar">Volver <i class="fa fa-arrow-left" aria-hidden="true"></i></a>
</div>
@endsection