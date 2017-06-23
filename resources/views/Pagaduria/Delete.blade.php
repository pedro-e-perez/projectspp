@extends('layouts.app')

@section('title', 'Inicio')

@section('sidebar')
@parent

@endsection

@section('content')

<h1>Eliminar Pagaduría</h1>

{!! Form::model($pagaduria, array('route' => array('pagaduria.destroy', $pagaduria->id), 'method' => 'DELETE')) !!}



<div class="form-group">
    <label >Nombre</label>
    <label >{{$pagaduria->nombre}}</label>

</div>


<button type="submit" class="btn btn-default">Guardar <i class="fa fa-floppy-o" aria-hidden="true"></i></button>

{!! Form::close()!!}
<div>
    <a href="{{ URL::to('pagaduria/') }}" title="Eliminar">Volver <i class="fa fa-arrow-left" aria-hidden="true"></i></a>
</div>
@endsection