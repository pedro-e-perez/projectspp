@extends('layouts.app')

@section('title', 'Inicio')

@section('sidebar')
@parent

@endsection

@section('content')



<h1>Consulta General de Documentos</h1> 
{!! Form::open(array('url' => 'getInformeDocumentosGen'))!!}

<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="row ">

    <div class="col-lg-4">
        <div class="form-group">
            <label for="filtersaAsociado" class="col-lg-3">Asociado</label>
            <div class="col-lg-9">
                <input type="text" class="form-control" id="filtersaAsociado" name="filtersaAsociado" placeholder="Filtre la información por asociado" value="{{$filtersaAsociado}}">
                <input type="hidden" id='hdffiltersaAsociado' name='hdffiltersaAsociado' value="{{$hdffiltersaAsociado}}">
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <label for="filtersPagaduria" class="col-lg-3">Pagaduría</label>
            <div class="col-lg-9">
                <input type="text" class="form-control" id="filtersPagaduria" name="filtersPagaduria" placeholder="Filtre la información por pagaduría" value="{{$filtersPagaduria}}">
                <input type="hidden" id='hdffiltersPagaduria' name='hdffiltersPagaduria' value="{{$hdffiltersPagaduria}}">
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="form-group">
            <label for="filtersDocumento" class="col-lg-3">Documento</label>
            <div class="col-lg-9">
                <input type="text" class="form-control" id="filtersDocumento" placeholder="Filtre la información por Tipo Documento" value="{{$filtersDocumento}}">
                <input type="hidden" id='hdffiltersDocumento' name='hdffiltersDocumento' value="{{$hdffiltersDocumento}}">
            </div>
        </div>
    </div>


    <div class="col-lg-12">
        <hr>
    </div>
</div>
<div class="row ">
    <div class="col-lg-4">
        <label for="filtersano" class="col-lg-3">Año</label>
        <div class="col-lg-9">
            <input type="text" class="form-control" id="filtersano" name="filtersano" placeholder="Filtre la información por año" value="{{$filtersano}}">
            <input type="hidden" id='hdffiltersano' name='hdffiltersano' value="{{$hdffiltersano}}">
        </div>
    </div>
    <div class="col-lg-4">
        <label for="filtersMes" class="col-lg-3">Mes</label>
        <div class="col-lg-9">
            <input type="text" class="form-control" id="filtersMes"  name="filtersMes" placeholder="Filtre la información por mes" value="{{$filtersMes}}">
            <input type="hidden" id='hdffiltersMes' name='hdffiltersMes' value="{{$hdffiltersMes}}">
        </div>
    </div>
    <div class="col-lg-4">
        <label  class="col-lg-3"></label>
        <div class="col-lg-9">
            <button type="submit" class="btn btn-default pull-right" id="btnGuardar">Consultar <i class="fa fa-floppy-o" aria-hidden="true"></i></button>
        </div>
    </div>
</div>
{!! Form::close()!!}
<div class="row ">
    @if ($informe!= null) 
    <small> Numero de registros <?php echo count($informe); ?></small>
    <table class="table table-responsive">
        <tr>
            <th>Asociado</th>
            <th>Numero Identificación</th>
            <th>Año</th>
            <th>Mes</th>
            <th>Pagaduría</th>            
            <th>Archivo</th>
            <th></th>

        </tr>
        @foreach ($informe as $arch) 
        <tr>
            <td>
                {{$arch->nombreAsociado}}
            </td>
            <td>
                {{$arch->NumeroId}}
            </td>
            <td>

                {{$arch->ano}}
            </td>
            <td>
                {{$arch->mes}}
            </td>
            <td>
                {{$arch->nombrePagaduria}}
            </td>
            <td>
                <a href="/downLoadFileByID?file={{$arch->id_archivo}}" >{{$arch->nombre_archivo}}</a>
            </td>
            <td>
                <a href="{{ URL::to('archivo/' . $arch->id_archivo. '/edit') }}"title="Editar Archivo">
                    <i class="fa fa-pencil-square-o" title="Editar" aria-hidden="true"></i></a>
            </td>
        </tr>
        @endforeach
    </table>
    @endif
</div>
@endsection
@section('scriptsPage')


<script src="../../../js/App/Informes/GetInformeDocumentos.js?v={{ Cache::get('js_version_number') }}" type="text/javascript"></script>
<script>
$(document).ready(page.init());

</script>
@endsection
