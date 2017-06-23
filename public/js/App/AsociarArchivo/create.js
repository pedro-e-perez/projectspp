/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var page = {
    init: function ()
    {
        page.cargarArchivo();
        page.autoCompleteFilters();
        $('#anoMes').datepicker({

            changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
            dateFormat: 'MM yy',
            beforeShow: function (e, t) {
                $("#ui-datepicker-div").addClass("hideCalendar");
            },
            onClose: function (dateText, inst) {
                page.yearSel = inst.selectedYear;
                page.montSel = inst.selectedMonth;
                $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
            }
        });
        $("#btnGuardar").click(page.guardarArchivo);
    }
    , autoCompleteFilters: function ()
    {
        $("#filtersaAsociado")
                // don't navigate away from the field on tab when selecting an item
                .on("keydown", function (event) {
                    if (event.keyCode === $.ui.keyCode.TAB &&
                            $(this).autocomplete("instance").menu.active) {
                        event.preventDefault();
                    }
                })
                .autocomplete({
                    minLength: 0,
                    source: function (request, response) {
                        // delegate back to autocomplete, but extract the last term

                        $.ajax({
                            url: "/GetFiltersInfo",
                            dataType: "json",
                            data: {
                                token: request.term,
                                type: 'Asociado'
                            },
                            success: function (data) {
                                response($.map(data, function (item) {
                                    return {
                                        label: item.tag,
                                        value: item.id
                                        , desc: item.tipo
                                    };
                                }));
                            }
                        });




                    },
                    focus: function () {
                        // prevent value inserted on focus

                        return false;
                    },
                    select: function (event, ui) {
                        page.asociado = ui.item.value;
                        event.preventDefault();

                        $("#filtersaAsociado").val(ui.item.label);
                    },

                    html: true, // optional (jquery.ui.autocomplete.html.js required)

                    // optional (if other layers overlap autocomplete list)
                    open: function (event, ui) {
                        $(".ui-autocomplete").css("z-index", 1000);
                    }
                })
                .focus(function () {
                    page.setText(this);
                    $(this).autocomplete("search");
                })
                .autocomplete("instance")._renderItem = function (ul, item) {
            return $("<li>")
                    .append("<div> <strong> Nombres </strong>" + item.label + " <strong>N° Identificación </strong>" + item.desc + "</div>")
                    .appendTo(ul);
        };

        $("#filtersPagaduria")
                // don't navigate away from the field on tab when selecting an item
                .on("keydown", function (event) {
                    if (event.keyCode === $.ui.keyCode.TAB &&
                            $(this).autocomplete("instance").menu.active) {
                        event.preventDefault();
                    }
                })
                .autocomplete(
                        {
                            minLength: 0,
                            source: function (request, response) {
                                // delegate back to autocomplete, but extract the last term

                                $.ajax({
                                    url: "/GetFiltersInfo",
                                    dataType: "json",
                                    data: {
                                        token: request.term,
                                        type: 'Pagaduria'
                                    },
                                    success: function (data) {
                                        response($.map(data, function (item) {
                                            return {
                                                label: item.tag,
                                                value: item.id
                                                , desc: item.tipo
                                            };
                                        }));
                                    }
                                });




                            },
                            focus: function () {
                                // prevent value inserted on focus
                                return false;
                            },
                            select: function (event, ui) {
                                page.pagaduria = ui.item.value;
                                event.preventDefault();

                                $("#filtersPagaduria").val(ui.item.label);
                            },

                            html: true, // optional (jquery.ui.autocomplete.html.js required)

                            // optional (if other layers overlap autocomplete list)
                            open: function (event, ui) {
                                $(".ui-autocomplete").css("z-index", 1000);
                            }
                        }).focus(function () {
            page.setText(this);
            $(this).autocomplete("search");
        })
                .autocomplete("instance")._renderItem = function (ul, item) {
            return $("<li>")
                    .append("<div> <strong> Nombre </strong>" + item.label + "</div>")
                    .appendTo(ul);
        };
        $("#filtersDocumento")
                // don't navigate away from the field on tab when selecting an item
                .on("keydown", function (event) {
                    if (event.keyCode === $.ui.keyCode.TAB &&
                            $(this).autocomplete("instance").menu.active) {
                        event.preventDefault();
                    }
                })
                .autocomplete({
                    minLength: 0,
                    source: function (request, response) {
                        // delegate back to autocomplete, but extract the last term

                        $.ajax({
                            url: "/GetFiltersInfo",
                            dataType: "json",
                            data: {
                                token: request.term,
                                type: 'Documento'
                            },
                            success: function (data) {
                                response($.map(data, function (item) {
                                    return {
                                        label: item.tag,
                                        value: item.id
                                        , desc: item.tipo
                                    };
                                }));
                            }
                        });




                    },
                    focus: function () {
                        // prevent value inserted on focus
                        return false;
                    },
                    select: function (event, ui) {
                        $("#hdffiltersDocumento").val(ui.item.value);
                        event.preventDefault();

                        $("#filtersDocumento").val(ui.item.label);
                    },

                    html: true, // optional (jquery.ui.autocomplete.html.js required)

                    // optional (if other layers overlap autocomplete list)
                    open: function (event, ui) {
                        $(".ui-autocomplete").css("z-index", 1000);
                    }
                }).focus(function () {
            page.setText(this);
            $(this).autocomplete("search");
        })
                .autocomplete("instance")._renderItem = function (ul, item) {
            return $("<li>")
                    .append("<div> <strong> Desc </strong>" + item.label + "</div>")
                    .appendTo(ul);
        };


    }
    , setText: function ($txt)
    {
        $($txt).val("");
        $($txt).closest("div").find("input[type=hidden]").val("");

    }
    , cargarArchivo: function ()
    {
        var url = '/uploadArchivos';
        $('#uploadFile').fileupload({
            url: url,
            dataType: 'json',
            acceptFileTypes: /(\.|\/)(pdf)$/i,
            done: function (e, data) {
                $('#files').append(page.appendfile(data.result.Ruta,data.result.FileName));

            },
            progressall: function (e, data) {
                var progress = parseInt(data.loaded / data.total * 100, 10);
                $('#progress .progress-bar').css(
                        'width',
                        progress + '%'
                        );
            }
        }).prop('disabled', !$.support.fileInput)
                .parent().addClass($.support.fileInput ? undefined : 'disabled')
                .bind('fileuploadsubmit', function (e, data) {
                    $("form").valid();
                    var maxSize = $("#FileSize").val();
                    var actualSize = data.files[0].size / 1024 / 1024;
                    var fname = data.files[0].name;
                    var regex = new RegExp("(.*?)\.(pdf)$");
                    if (actualSize > maxSize)
                    {
                        console.log('This file size is: ' + data.files[0].size / 1024 / 1024 + "MB");
                        $("label[for*=uploadFile]").text("Seleccione un archivo con un tamaño menor o igual a " + maxSize + " MB.");
                        $("label[for*=uploadFile]").css("display", "");
                        return false;
                    } else {
                        $("label[for*=uploadFile]").css("display", "none");
                        return true;
                    }

                });

        $('#uploadFile').bind('change', function () {

        });

    }
    , appendfile: function ( ruta,nombre)
    {
        var $div = '<div class="col-lg-2 fileView itemfile highlighted" id="contFile<?php echo $counter; ?>" >  '
                + '<div>'
                + '<i class="fa fa-file-image-o fa-5x" aria-hidden="true"></i><br> '
                + '<p class="textItemFile" id="textItemFile">'+ nombre+'</p>'
                + '<input type="hidden" id="rutafile" value="'+ruta+'">'
                + '</div>'

                + '</div>';
        return $div;


    }
    , guardarArchivo: function ()
    {
        $archivosSeleccionados = $(".highlighted");
        $archivosdata = [];
        $.each($archivosSeleccionados, function (i, obj) {

            $archivosdata.push({nombre: $(obj).find("#rutafile").val()
                , idCont:0
                , eliminado: false});
        });
        Util.Loading(true);
        $.ajax({
            url: "/guardarArchivos",
            type: "POST",
            dataType: "json",
            data: {
                searchText: JSON.stringify($archivosdata)
                , idAsociado: page.asociado
                , idPagaduria:page.pagaduria
                , ano: page.yearSel == null ? 0 : page.yearSel
                , mes: page.montSel == null ? 0 : page.montSel + 1
                , _token: $('input[name=_token]').val()
            },
            success: function (data) {
              
                Util.Loading(false);
                Util.Alerta("Archivos asociados con exito", "success", 800);
                  $(location).attr('href', '/getInformeDocumentosGen');
            }
            , error: function (jqXHR, textStatus, errorThrown)
            {
                Util.Alerta("Se ha producido un error", "danger", 800);
            }
        });
    }

};