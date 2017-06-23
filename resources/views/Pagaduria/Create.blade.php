@extends('layouts.app')

@section('title', 'Inicio')

@section('sidebar')
@parent

@endsection

@section('content')




<h1>Crear Pagaduría</h1>

{!! Form::open(array('url' => 'pagaduria'))!!}



<div class="form-group">
    <label for="nombre">Nombres</label>
    <input type="text" class="form-control" id="nombre" name="nombre" >
</div>

<button type="submit" class="btn btn-default">Guardar <i class="fa fa-floppy-o" aria-hidden="true"></i></button>

{!! Form::close()!!}

<div>
    <a href="{{ URL::to('pagaduria/') }}" title="Eliminar">Volver <i class="fa fa-arrow-left" aria-hidden="true"></i></a>
</div>
@endsection