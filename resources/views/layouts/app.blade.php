<!-- Stored in resources/views/layouts/app.blade.php -->
<html lang="en">
    <head>
        <title>Archerion  - @yield('title')</title>
        <meta charset="utf-8">
        <link rel="shortcut icon" type="image/png" href="/ARCHERION2.png"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="../../../js/Jquery/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="../../../js/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
        <script src="../../../js/jquery-ui-1.12.1/jquery-ui.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="../../../js/i18n/datepicker-es.js" type="text/javascript"></script>
        <link href="../../../css//jquery.fileupload.css" rel="stylesheet" type="text/css"/>
        <link href="../../../css//administracionarchivo.css?v={{ Cache::get('js_version_number') }}" rel="stylesheet" type="text/css"/>
        <script src="../../../js/JqueryFileUpload/jquery.fileupload.js" type="text/javascript"></script>
        <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.min.js" type="text/javascript"></script>
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="../../../css/app.css?v={{ Cache::get('js_version_number') }}" rel="stylesheet" type="text/css"/>
        <link href="../../../css/hover.css?v={{ Cache::get('js_version_number') }}" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="/css/font-awesome/css/font-awesome.min.css" type="text/css">
    </head>
    <body>
        <style>
            .hvr-sweep-to-right:hover:before, .hvr-sweep-to-right:focus:before, .hvr-sweep-to-right:active:before {
                -webkit-transform: scaleX(1);
                transform: scaleX(1);
            }
            .hvr-sweep-to-right:before {
                border: 1px solid #b2a6ce;
                background-color: #ffffff;
            }
        </style>
        @section('sidebar')
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header ">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ URL::to('welcome') }}"> <img src="/ARCHERION2.png" alt=""/></a>

                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav" >
                        <li class="dropdown links">
                            <a href="InformacionFinanciera.php" class="hvr-sweep-to-right dropdown-toggle" data-toggle="dropdown" >Gestión de Documentos
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a class="hvr-sweep-to-right" href="{{ URL::to('asociarArchivo') }}"><i class="fa fa-file-image-o" aria-hidden="true"></i> | Asociar Archivos</a></li>
                                <li><a class="hvr-sweep-to-right" href="{{ URL::to('asociarArchivo/create') }}"><i class="fa fa-cloud-upload" aria-hidden="true"></i> | Cargar Archivos</a></li>


                            </ul>
                        </li>
                        <li class="dropdown links">
                            <a href="#" class=" hvr-sweep-to-right dropdown-toggle" data-toggle="dropdown">Informes <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a  class="hvr-sweep-to-right" href="{{ URL::to('getInformeDocumentos/') }}"><i class="fa fa-download" aria-hidden="true"></i> | Consulta Documentos</a></li>
                                <li><a  class="hvr-sweep-to-right" href="{{ URL::to('getInformeDocumentosGen/') }}"><i class="fa fa-bars" aria-hidden="true"></i> | Informe General Documentos</a></li>


                            </ul>
                        </li>
                        <li class="dropdown links">
                            <a class="dropdown-toggle hvr-sweep-to-right" data-toggle="dropdown" href="#">Configuración
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a class="hvr-sweep-to-right" href="{{ URL::to('tercero/') }}"><i class="fa fa-users" aria-hidden="true"></i> | Asociados</a></li>                            
                                <li><a class="hvr-sweep-to-right" href="{{ URL::to('tipoDocumento/') }}"><i class="fa fa-file-o" aria-hidden="true"></i> | Tipo Documentos</a></li>
                                <li><a class="hvr-sweep-to-right" href="{{ URL::to('pagaduria/') }}"><i class="fa fa-list-ol" aria-hidden="true"></i> | Pagadurías</a></li>
                                @if(Session::has('administrador'))
                                @if(Session::get('administrador')==true)
                                <li><a class="hvr-sweep-to-right" href="{{ URL::to('usuario/') }}"><i class="fa fa-user" aria-hidden="true"></i> | Usuarios</a></li>

                                @endif
                                @endif
                            </ul>
                        </li>



                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="links">
                            <a href="#" class="hvr-sweep-to-right"><i class="fa fa-user-o" aria-hidden="true"></i> 
                                @if(Session::has('idUsuario'))
                                {{ Session::get('nombreUsuario')}}
                                @endif
                                @if(Session::has('administrador'))
                                @if(Session::get('administrador')==true)
                                (Admin)
                                @else
                                (User)
                                @endif

                                @endif
                            </a>

                        </li>
                        <li class="links" ><a class="hvr-sweep-to-right" href="{{ URL::to('login/create') }}" id="lnkLogOut"><i class="fa fa-power-off" aria-hidden="true"></i> Salir</a></li>


                    </ul>
                </div>

            </div>
        </nav>
        @show

        <div class="container">
            @yield('content')
        </div>
        <hr>
        <footer>


            <div class="row">
                <div  class="col-sm-4" ></div>
                <div  class="col-sm-4" ><p>Copyright © <span itemprop="name">
                            <a href="http:\\www.rolavsp.com"> ROLAVSP</a></span> <?php echo date("Y"); ?></p></div>
                <div  class="col-sm-4" ></div>
            </div>

        </footer>

        <script src="../../../js/App/rolavspSecurity.js?v={{ Cache::get('js_version_number') }}" type="text/javascript"></script>
        <script src="../../../js/App/Util/Util.js?v={{ Cache::get('js_version_number') }}" type="text/javascript"></script>
        <script>
$(function () {
    var server = '<?php echo $_SERVER['SERVER_NAME']; ?>';
    var url = '<?php echo $_SERVER['REQUEST_URI']; ?>';

    rolavsp.sendVisit(url, server);

    $("#lnkLogOut").click(
            function ()
            {
                var url = $(this).attr("href");
                Util.Confirm("Alerta", "Desea salir de Archerion?", function () {
                    $(location).attr('href', url);
                }, function () {
                    return false;
                });
                return false;
            }
    );
});

        </script>
        @yield('scriptsPage')
    </body>
</html>