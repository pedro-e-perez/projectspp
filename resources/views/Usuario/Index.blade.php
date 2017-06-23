@extends('layouts.app')

@section('title', 'Inicio')

@section('sidebar')
@parent

@endsection

@section('content')




<h1>Usuarios</h1>
<p>
    <a href="{{ URL::to('usuario/' .'create') }}" title="Eliminar">Crear Nuevo <i class="fa fa-plus" aria-hidden="true"></i></a>
</p>
<table class="table table-bordered" id="informeArchivos">
    <thead>
        <tr>
            <th>Usuario</th>
            <th>Nombres y apellidos</th>
            <th>Correo Electrónico</th>
            <th>Teléfono</th>
            <th></th>

        </tr>
    </thead>
    <tbody>




        @if ($usuarios != null) 
        @foreach ($usuarios as $arc) 
        <tr>
            <td>{{ $arc->Usuario }}</td>
            <td>{{$arc->Nombre }}{{$arc->Apellidos}}</td>
            <td>{{ $arc->email }}</td>
            <td>{{ $arc->telefono }}</td>
            <td> <a href="{{ URL::to('usuario/' . $arc->id. '/edit') }}"title="Editar Insumos">
                    <i class="fa fa-pencil-square-o" title="Editar" aria-hidden="true"></i></a>
                <a href="{{ URL::to('usuario/' . $arc->id. '') }}"
                   title="Eliminar"><i class="fa fa-times" aria-hidden="true"></i></a>
                    <a href="{{ URL::to('editPwr/' . $arc->id. '') }}"
                   title="Actualizar Password">            <i class="fa fa-lock" aria-hidden="true"></i>
</a>
            </td>
        </tr>


        @endforeach
        @endif
    </tbody>

</table>
@endsection