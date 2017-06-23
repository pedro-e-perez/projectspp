@extends('layouts.app')

@section('title', 'Inicio')

@section('sidebar')
@parent

@endsection

@section('content')



<h1>Pagadurías</h1>
<p>
    <a href="{{ URL::to('pagaduria/' .'create') }}" title="Eliminar">Crear Nuevo <i class="fa fa-plus" aria-hidden="true"></i></a>
</p>
<table class="table table-bordered" id="informeArchivos">
    <thead>
        <tr>
            <th>Nombres </th>
            <th></th>

        </tr>
    </thead>
    <tbody>




        @if ($pagaduria!= null) 
        @foreach ($pagaduria as $arc) 
        <tr>
            <td>{{ $arc->nombre }} </td>
            <td> <a href="{{ URL::to('pagaduria/' . $arc->id. '/edit') }}"title="Editar Insumos">
                    <i class="fa fa-pencil-square-o" title="Editar" aria-hidden="true"></i></a>
                <a href="{{ URL::to('pagaduria/' . $arc->id. '') }}"
                   title="Eliminar"><i class="fa fa-times" aria-hidden="true"></i></a></td>
        </tr>


        @endforeach
        @endif
    </tbody>

</table>
@endsection