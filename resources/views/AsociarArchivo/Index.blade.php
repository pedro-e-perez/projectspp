@extends('layouts.app')

@section('title', 'Inicio')

@section('sidebar')
@parent


@endsection

@section('content')




<h1>Asociar Archivos</h1>
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="row ">
    <div class="col-lg-6"><a class="btn btn-default" href="/asociarArchivo">
            Volver <i class="fa fa-arrow-left" aria-hidden="true"></i></a>  | Ruta {{ Cache::get('routefile') }} | </div>


    <div class="col-lg-6"><div class="form-inline"><div class="form-group"><label for="anoMes">Año y Mes </label>
            <input type="text" class="form-control " id="anoMes" name="anoMes" placeholder="Seleccione el Mes y el Año" required>
        </div> </div>
    </div>
    <div class="col-lg-12">
        <hr>
    </div>
    <div class="col-lg-6 dvfiles">
        <div  id="contFiles">
            <?php $counter = 0; ?>
            @foreach($archivos as $arch)

            <div class="col-lg-2 fileView itemfile" id="contFile<?php echo $counter; ?>" >  
                <div>
                    <i class="{{ $arch->GetTypeIcon() }} fa-5x" aria-hidden="true"></i><br> 
                    <p class="textItemFile" id="textItemFile"> {{ $arch->Nombre }}</p>
                    <input type="hidden" id="rutafile" value="{{ $arch->RutaGuardado }}">
                </div>

            </div>
            <?php $counter ++; ?>

            @endforeach
        </div>
    </div>
    <div class="col-lg-6">
        <div id="contImg">
            <div class="col-lg-12">
                <div class="pull-right">
                    <button type="submit" id="btnAsociar" class="btn btn-default">Asociar <i class="fa fa-random" aria-hidden="true"></i></button>
                    | <a href="" id="lnkDescargar" title="Descargar" class="btn btn-default" >Descargar <i class="fa fa-cloud-download" aria-hidden="true" ></i></a>
                </div>
            </div> 
            <span id="nopreview" style="display: none;">El archivo seleccionado no tiene vista previa</span>
            <img src="" class="img-responsive" id="imagePreview">
        </div>

    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalAsociar" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Asociar Archivos  (<span id="elementoNo"></span>) Elementos.</h4>
            </div>
            <div class="modal-body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="asociado">Asociado</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="asociado" placeholder="Digite el nombre o cedula del asociado">
                            <input type="hidden" id="hdfIdAsociado">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pagaduria">Pagaduria</label>
                        <div class="col-sm-10"> 
                            <input type="text" class="form-control" id="pagaduria" placeholder="Digite la pagaduria">
                            <input type="hidden" id="hdfIdPagaduria">
                        </div>
                    </div>


                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" id="btnGuardar">Guardar <i class="fa fa-floppy-o" aria-hidden="true"></i></button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>

    </div>
</div>
@endsection
@section('scriptsPage')


<script src="../../../js/App/AsociarArchivo/Index.js?v={{ Cache::get('js_version_number') }}" type="text/javascript"></script>
<script>
$(document).ready(page.init());

</script>
@endsection


