@extends('layouts.app')

@section('title', 'Inicio')

@section('sidebar')
@parent

@endsection

@section('content')




<h1>Tipo Documento</h1>
<p>
    <a href="{{ URL::to('tipoDocumento/' .'create') }}" title="Eliminar">Crear Nuevo <i class="fa fa-plus" aria-hidden="true"></i></a>
</p>
<table class="table table-bordered" id="informeArchivos">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Nomenclatura</th>
       
            <th></th>

        </tr>
    </thead>
    <tbody>




        @if ($tipoDocumentos != null) 
        @foreach ($tipoDocumentos as $arc) 
        <tr>
            <td>{{ $arc->Nombre }}</td>
            <td>{{$arc->Nomenclatura }}</td>
            <td> <a href="{{ URL::to('tipoDocumento/' . $arc->id. '/edit') }}"title="Editar Insumos">
                    <i class="fa fa-pencil-square-o" title="Editar" aria-hidden="true"></i></a>
                <a href="{{ URL::to('tipoDocumento/' . $arc->id. '') }}"
                   title="Eliminar"><i class="fa fa-times" aria-hidden="true"></i></a></td>
        </tr>


        @endforeach
        @endif
    </tbody>

</table>
@endsection