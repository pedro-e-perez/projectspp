<!DOCTYPE html>
<!--
     _/_/_/_/    _/_/_/   _/          _/_/_/      _/    _/      _/_/_/     _/_/_/
    _/     _/  _/    _/  _/        _/      _/     _/   _/    _/         _/      _/
   _/     _/  _/    _/  _/        _/      _/      _/  _/    _/_/_/     _/      _/
  _/_/_/_/   _/    _/  _/        _/_/_/_/_/       _/ _/          _/   _/_/_/_/
 _/     _/  _/    _/  _/        _/      _/        _/_/          _/   _/
_/      _/  _/_/_/   _/_/_/_/  _/      _/         _/     _/_/_/     _/              _/

Acerca de nosostros www.rolavsp.com
Bogota Colombia 2016
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="shortcut icon" type="image/png" href="/ARCHERION2.png"/>
        <title>Archerion</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../../../css/app.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="Js/Jquery/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="Js/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
        <script src="Js/jquery-ui-1.12.1/jquery-ui.min.js" type="text/javascript"></script>
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <script src="Js/i18n/datepicker-es.js" type="text/javascript"></script>
        <link href="css/jquery.fileupload.css" rel="stylesheet" type="text/css"/>
        <link href="css/administracionarchivo.css" rel="stylesheet" type="text/css"/>
        <script src="Js/JqueryFileUpload/jquery.fileupload.js" type="text/javascript"></script>
        <link href="css/login.css" rel="stylesheet" type="text/css"/>
        <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="/css/font-awesome/css/font-awesome.min.css" type="text/css">
        <script src="/js/Validation/jqBootstrapValidation.js" type="text/javascript"></script>
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-top: 30px;
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-lg-12 ">
                    <hr>
                </div>
                <div class="col-lg-6 content">
                    <img class="imglogin" src="/ARCHERION2.png" alt=""/>
                </div>  <div class="col-md-4 col-sm-6">
                    <div class="wp-block default user-form"> 
                        <div class="form-header base-alt">
                            <h2>Iniciar sesión con su cuenta
                            </h2>
                        </div>
                        <div class="form-body">
                            <form action="login" method="post" id="frmLogin" class="sky-form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <fieldset>                  
                                    <section>
                                        <div class="form-group">
                                            <label class="label">Usuario</label>
                                            <label class="input">
                                                <i class="icon-append fa fa-user"></i>
                                                <input id="txtUser" name="txtUser" type="text" name="email" placeholder="Usuario">
                                            </label>
                                        </div>     
                                    </section>
                                    <section>
                                        <div class="form-group">
                                            <label class="label">Password</label>
                                            <label class="input">
                                                <i class="icon-append fa fa-lock"></i>
                                                <input id="txtPwr" name="txtPwr" type="password" name="email" placeholder="Password">
                                            </label>
                                        </div>     
                                    </section> 
                                    <section >
                                        <label class="alert-danger"><?php echo $error . "<br>"; ?></label>  


                                    </section>

                                    <section>
                                        <button class="btn btn-alt btn-icon btn-icon-right btn-sign-in pull-right" type="submit">
                                            <span>Ingresar</span>
                                        </button>
                                    </section>
                                </fieldset>  
                            </form>    
                        </div>
                        <div class="form-footer base-alt">
                            <p>Conoce mas productos <a href="http://www.rolavsp.com">RolavSP</a> </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div style="margin: 10px;">
                        <h4>Licencia para:</h4><br>


                        <h4 align="justify">Derechos de Autor
                            <small>La información producida por RolavSp y publicada a través de
                                este sitio web es de su propiedad intelectual. Está prohibida su reproducción total o
                                parcial, su traducción, inclusión, transmisión, almacenamiento o acceso a través de
                                medios analógicos, digitales o de cualquier otro sistema o tecnología creada, sin
                                autorización previa y escrita de RolavSp. Es responsabilidad de nuestro cliente <strong>(<?php echo $_SERVER['SERVER_NAME']; ?>)</strong>  
                                validar el buen uso del mismo y custodia del código fuente.  Para conocer más acerca de
                                nuestras condiciones de uso visite nuestro sitio<a href="www.rolavsp.com"> www.rolavsp.com </a>
                            </small>
                        </h4>

                    </div>

                </div>    
                <div class="col-lg-4">
                    <img class="logoRolav" src="/logorolavsp.png" alt=""/>
                </div>
            </div>
        </div>
        <script>
$(document).ready(function () {
    $("form").validate({
        rules: {
            "txtUser": {
                required: true
            },
            "txtPwr": {
                required: true
                
            }
        },
        messages: {
            "txtUser": {
                required: "Por favor, digite un usuario."
            },
            "txtPwr": {
                required: "Por favor, digite un password."
            }
        }
    });

});
        </script>
    </body>
</html>
