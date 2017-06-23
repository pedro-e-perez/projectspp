@extends('layouts.app')

@section('title', 'Inicio')

@section('sidebar')
@parent

@endsection

@section('content')




<h1>Cargar Archivos a Asociado</h1>

{!! Form::open(array('url' => 'pagaduria'))!!}



<div class="form-group">
    <label for="filtersaAsociado">Asociado</label>
    <input type="text" class="form-control" id="filtersaAsociado" name="filtersaAsociado" >
</div>
<div class="form-group">
    <label for="anoMes">Fecha</label>
    <input type="text" class="form-control" id="anoMes" name="anoMes" >
</div>
<div class="form-group">
    <label for="filtersPagaduria">Pagaduría</label>
    <input type="text" class="form-control" id="filtersPagaduria" name="filtersPagaduria" >
</div>

<div class="form-group">
    <label for="filtersDocumento">Tipo Documento</label>
    <input type="text" class="form-control" id="filtersDocumento" name="filtersDocumento" >
</div>
<div class="form-group">
    <span class="fileinput-button btn btn-default">
        <span class="glyphicon glyphicon-upload"></span> Cargar Archivo
        <input type="file" id="uploadFile" name="uploadFile[]" multiple />

    </span>
   
    <div id="progress" class="progress">
        <div class="progress-bar progress-bar-success"></div>
    </div>
   
</div>

 <div id="files" class='row'></div>
<button type="button" class="btn btn-default" id='btnGuardar'>Guardar <i class="fa fa-floppy-o" aria-hidden="true"></i></button>

{!! Form::close()!!}

<div>
    <a href="{{ URL::to('getInformeDocumentosGen/') }}" title="Eliminar">Volver<i class="fa fa-arrow-left" aria-hidden="true"></i></a>
</div>
@endsection

@section('scriptsPage')


<script src="../../../js/App/AsociarArchivo/create.js?v={{ Cache::get('js_version_number') }}" type="text/javascript"></script>
<script>
$(document).ready(page.init());

</script>
@endsection