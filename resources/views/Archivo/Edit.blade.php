@extends('layouts.app')

@section('title', 'Inicio')

@section('sidebar')
@parent

@endsection

@section('content')




<h1>Editar Archivo</h1>


{!! Form::model($archivo, array('route' => array('archivo.update', $archivo->id_archivo), 'method' => 'PUT')) !!}

<div class="form-group">
    <label for="filtersArchivo" class="col-lg-3">Nombre Archivo</label>
    <div class="col-lg-9">
        <label  id="filtersArchivo"  >{{$archivo->nombre_archivo}}</label>

    </div>
</div>
<div class="form-group">
    <label for="filtersaAsociado" class="col-lg-3">Asociado</label>
    <div class="col-lg-9">
        <input type="text" class="form-control" id="filtersaAsociado" name="filtersaAsociado" placeholder="Información por asociado" value="{{$archivo->nombreAsociado}}" >
        <input type="hidden" id='hdffiltersaAsociado' name='hdffiltersaAsociado' value="{{$archivo->ter_id}}" >
    </div>
</div>
<div class="form-group">
    <label for="filtersPagaduria" class="col-lg-3">Pagaduria</label>
    <div class="col-lg-9">
        <input type="text" class="form-control" id="filtersPagaduria" name="filtersPagaduria" placeholder="Información por pagaduria" value="{{$archivo->nombrePagaduria}}" >
        <input type="hidden" id='hdffiltersPagaduria' name='hdffiltersPagaduria' value="{{$archivo->pagaduria_id}}" >
    </div>
</div>
<div class="form-group">
    <label for="filtersDocumento" class="col-lg-3">Tipo Documento</label>
    <div class="col-lg-9">
        <input type="text" class="form-control" id="filtersDocumento" placeholder="Información por Tipo Documento" value="{{$archivo->NombreTipoDoc}}">
        <input type="hidden" id='hdffiltersDocumento' name='hdffiltersDocumento'  value="{{$archivo->idtipodoc}}">
    </div>
</div>
<div class="form-group">
    <label for="anoMes"  class="col-lg-3">Fecha</label>
    <div class="col-lg-9">
        <input type="text" class="form-control" id="anoMes" name="anoMes" value="{{$archivo->mesName}} {{$archivo->ano}}" >
        <input type="hidden" id='hdffiltersano' name='hdffiltersano' value="{{$archivo->ano}}" >
        <input type="hidden" id='hdffiltersmes' name='hdffiltersmes' value="{{$archivo->mes}}" >
    </div>
</div>
<button type="submit" class="btn btn-default">Guardar <i class="fa fa-floppy-o" aria-hidden="true"></i></button>

{!! Form::close()!!}
<div>
    <a href="{{ URL::to('getInformeDocumentosGen/') }}" title="volver">Volver <i class="fa fa-arrow-left" aria-hidden="true"></i></a>
</div>
@endsection
@section('scriptsPage')


<script src="../../../js/App/Archivo/Edit.js?v={{ Cache::get('js_version_number') }}" type="text/javascript"></script>
<script>
$(document).ready(page.init());

</script>
@endsection
