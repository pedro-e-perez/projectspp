@extends('layouts.app')

@section('title', 'Inicio')

@section('sidebar')
@parent

@endsection

@section('content')



<h1>Consulta de documentos</h1> 
{!! Form::open(array('url' => 'getInformeDocumentos'))!!}
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
                <input type="text" class="form-control" id="filtersDocumento" name ="filtersDocumento" placeholder="Filtre la información por Tipo Documento" value="{{$filtersDocumento}}">
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
<div class="row ">
    {!! Form::close()!!}
    <div class="col-lg-12">
        <hr>
    </div>
    <div class="col-lg-12">  </small><strong>Ruta</strong> <ul id="dvRuta" class="breadcrumbs"> <li>Raiz</li></ul>

    </div>
    <div class="col-lg-6 dvfiles">
        <div  id="contFiles">
            @if ($informe!= null) 
            <?php $counter = 0; ?>
            <?php
            $idter = 0;
            $ano = -1;
            $mes = -1;
            ?>
            @foreach ($informe as $arch) 



            @if($idter!=$arch->NumeroId)


            @if($idter!=0)
        </div>
    </div>
    <!-- fin mes -->
</div>
<!-- fin año -->
</div>
<!-- fin asocioado -->

<?php
$ano = -1;
$mes = -1;
?>
@endif
<!-- inicio asocioado -->
<div id="contAsc" ident="{{$arch->NumeroId}}" >
    <div class="col-lg-12 asociadoEnc" ident="{{$arch->NumeroId}}"> <strong>Asociado</strong> {{$arch->nombreAsociado}} <strong>Numero Identificación</strong> {{$arch->NumeroId}}</div>


    @endif

    @if($ano!=$arch->ano)
    @if( $ano!=-1)
</div>
</div>
</div>
<?php
$mes = -1;
?>
<!-- fin año -->
@endif
<!-- inicio año -->
<div id="contAno" ident="{{$arch->NumeroId}}" year="{{$arch->ano}}" >
    <div class="col-lg-2 folderView  hvr-pop" id="contFolderYear<?php echo $counter; ?>" ident="{{$arch->NumeroId}}" >  
        <div>
            <i class="fa fa-folder-o fa-5x" aria-hidden="true"></i><br> 
            <p class="textItemFile" id="textItemFile"> Año  @if($arch->ano==0)
                (Sin definir)
                @else
                {{$arch->ano}}
                @endif</p>
            <input type="hidden" id="paramfolder" value="{{$arch->ano}}">
        </div>

    </div>
    @endif

    @if($mes!=$arch->mes)
    @if($mes!=-1)
</div>
</div>
<!-- fin Mes -->
@endif
<!-- Inicio Mes -->
<div id="ContMes" ident="{{$arch->NumeroId}}" year="{{$arch->ano}}" month="{{$arch->mes}}" style="display:none;" >
    <div class="col-lg-2 folderView  hvr-pop" id="contFolderMonth_{{$counter}}" ident="{{$arch->NumeroId}}" year="{{$arch->ano}}" month="{{$arch->mes}}"  >  
        <div>
            <i class="fa fa-folder-o fa-5x" aria-hidden="true"></i><br> 
            <p class="textItemFile" id="textItemFile">  Mes @if($arch->mes==0)
                (Sin definir)
                @else
                {{$arch->mesName}}
                @endif</p>
            <input type="hidden" id="paramfolder" value="{{$arch->mes}}">
        </div>

    </div>
    <div id="archivos" style="display:none;">
        @endif

        <!-- archivo -->
        <div class="col-lg-2 fileView itemfile  hvr-pop" id="contFile<?php echo $counter; ?>" ident="{{$arch->NumeroId}}" year="{{$arch->ano}}" month="{{$arch->mes}}"  >  
            <div>
                <i class="fa fa-file-image-o fa-5x" aria-hidden="true"></i><br> 
                <p class="textItemFile" id="textItemFile"> {{ $arch->nombre_archivo }}</p>
                <input type="hidden" id="rutafile" value="{{ $arch->id_archivo }}">
            </div>

        </div>

        <?php
        $idter = $arch->NumeroId;
        $ano = $arch->ano;
        $mes = $arch->mes;
        ?>

        @endforeach
        @if($mes!=-1)
    </div>
</div>
<!-- fin Mes -->
@endif

@if($ano!=-1)

</div> 
<!-- fin año -->
@endif
@if($idter!=0)

</div> 
<!-- fin asocioado -->
@endif
@endif
</div>
</div>
<div class="col-lg-6">
    <div class="col-lg-12">
        <div class="pull-right">
            <button type="button" id="btninfo" class="btn btn-default">Información <i class="fa fa-info" aria-hidden="true"></i></button>
            | <a href="" id="lnkDescargar" title="Descargar" class="btn btn-default" >Descargar <i class="fa fa-cloud-download" aria-hidden="true" ></i></a>
        </div>
    </div> 
    <span id="nopreview" style="display: none;">El archivo seleccionado no tiene vista previa</span>
    <img src="" class="img-responsive" id="imagePreview">
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalAsociar" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Información Archivo  </h4>
            </div>
            <div class="modal-body">
                <div class="form-horizontal">

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="asociado">Asociado</label>
                        <div class="col-sm-10">
                            <label id="asociado" ></label>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pagaduria">Nombre Archivo</label>
                        <div class="col-sm-10"> 
                            <label id="archivo" ></label>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pagaduria">Pagaduria</label>
                        <div class="col-sm-10"> 
                            <label id="pagaduria" ></label>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="mes">Mes</label>
                        <div class="col-sm-10"> 
                            <label id="mes" ></label>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="ano">Año</label>
                        <div class="col-sm-10"> 
                            <label id="ano" ></label>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="tipoDoc">Tipo Documento</label>
                        <div class="col-sm-10"> 
                            <label id="tipoDoc" ></label>

                        </div>
                    </div>


                </div>
            </div>
            <div class="modal-footer">
              
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>

    </div>
</div>
@endsection
@section('scriptsPage')


<script src="../../../js/App/Informes/GetInformeDocumentos.js?v={{ Cache::get('js_version_number') }}" type="text/javascript"></script>
<script>
$(document).ready(page.init());

</script>
@endsection
