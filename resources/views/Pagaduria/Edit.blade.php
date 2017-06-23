@extends('layouts.app')

@section('title', 'Inicio')

@section('sidebar')
@parent

@endsection

@section('content')




<h1>Editar Pagaduría</h1>


{!! Form::model($pagaduria, array('route' => array('pagaduria.update', $pagaduria->id), 'method' => 'PUT')) !!}


<div class="form-group">
    <label for="nombre">Nombres</label>
    <input type="text" class="form-control" id="nombre" name="nombre"  value='{{$pagaduria->nombre}}'>
</div>


<button type="submit" class="btn btn-default">Guardar <i class="fa fa-floppy-o" aria-hidden="true"></i></button>

{!! Form::close()!!}
<div>
    <a href="{{ URL::to('pagaduria/') }}" title="Eliminar">Volver <i class="fa fa-arrow-left" aria-hidden="true"></i></a>
</div>
@endsection