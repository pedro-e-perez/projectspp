@extends('layouts.app')

@section('title', 'Inicio')

@section('sidebar')
@parent

@endsection

@section('content')




<h1>Eliminar Usuario</h1>

{!! Form::model($tipoDocumento, array('route' => array('tipoDocumento.destroy', $tipoDocumento->id), 'method' => 'DELETE')) !!}



<div class="form-group">
    <label >Nombre</label>
    <label >{{$tipoDocumento->Nombre}}</label>

</div>
<div class="form-group">
    <label >Nomenclatura</label>
    <label >{{$tipoDocumento->Nomenclatura}}</label>
</div>


<button type="submit" class="btn btn-default">Guardar <i class="fa fa-floppy-o" aria-hidden="true"></i></button>

{!! Form::close()!!}
<div>
    <a href="{{ URL::to('tipoDocumento/') }}" title="Eliminar">Volver <i class="fa fa-arrow-left" aria-hidden="true"></i></a>
</div>
@endsection