/* 
 _/_/_/_/    _/_/_/   _/          _/_/_/      _/    _/      _/_/_/     _/_/_/
 _/     _/  _/    _/  _/        _/      _/     _/   _/    _/         _/      _/
 _/     _/  _/    _/  _/        _/      _/      _/  _/    _/_/_/     _/      _/
 _/_/_/_/   _/    _/  _/        _/_/_/_/_/       _/ _/          _/   _/_/_/_/
 _/     _/  _/    _/  _/        _/      _/        _/_/          _/   _/
 _/	_/  _/_/_/   _/_/_/_/  _/      _/         _/     _/_/_/     _/              _/
 
 Acerca de nosostros www.rolavsp.com
 Bogota Colombia
 */


var page = {

    init: function ()
    {
        if (!String.prototype.includes) {
            String.prototype.includes = function () {
                'use strict';
                return String.prototype.indexOf.apply(this, arguments) !== -1;
            };
        }
        page.eventos();
    }
    , eventos: function ()
    {
        $(".fileView ").click(page.seleccionarArchivo);
        $("#imagePreview").on('load', function () {
            Util.Loading(false);
            Util.blockBackground(false);
        });
        page.calculaScroll();
        $("#contImg").css("display", "none  ");
        page.panzoomimage();
        $("#btnAsociar").click(page.modalAsociar);
        page.autoCompleteTerceros();
        page.autoCompletePagaduria();
        $("#btnGuardar").click(page.guardarArchivo);
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
    }
    , calculaScroll: function ()
    {
        var $hg = $(window).height();
        if ($hg > 270)
        {
            $("#contFiles").css("height", $hg - 270);
        }


    }
    , autoCompletePagaduria: function ()
    {
        $("#pagaduria").autocomplete({
            source: function (request, response) {
                $.ajax({
                    url: "/GetPagaduriaByNombre",
                    dataType: "json",
                    data: {
                        searchText: request.term
                    },
                    success: function (data) {
                        response($.map(data, function (item) {
                            return {
                                label: item.nombre,
                                value: item.id
                            };
                        }));
                    }
                });
            }
            ,
            minLength: 1,
            select: function (event, ui) {
                $("#hdfIdPagaduria").val(ui.item.value);
                event.preventDefault();
                $("#pagaduria").val(ui.item.label);
            }
            , focus: function (event, ui) {
                event.preventDefault();
                //$("#asociado").val(ui.item.label);
            }
            ,
            html: true, // optional (jquery.ui.autocomplete.html.js required)

            // optional (if other layers overlap autocomplete list)
            open: function (event, ui) {
                $(".ui-autocomplete").css("z-index", 1000);
            }
        }
        ).autocomplete("instance")._renderItem = function (ul, item) {
            return $("<li>")
                    .append("<div> <strong> Nombres </strong>" + item.label + "</div>")
                    .appendTo(ul);
        };
    }
    , autoCompleteTerceros: function ()

    {
        $("#asociado").autocomplete({
            source: function (request, response) {
                $.ajax({
                    url: "/GetTercerobyNombreIdentno",
                    dataType: "json",
                    data: {
                        searchText: request.term
                    },
                    success: function (data) {
                        response($.map(data, function (item) {
                            return {
                                label: item.Apellidos + ' ' + item.Nombre,
                                desc: item.NumeroId,
                                value: item.id
                            };
                        }));
                    }
                });
            }
            ,
            minLength: 1,
            select: function (event, ui) {
                $("#hdfIdAsociado").val(ui.item.value);
                event.preventDefault();

                $("#asociado").val(ui.item.label);
            }
            , focus: function (event, ui) {
                event.preventDefault();

                //$("#asociado").val(ui.item.label);
            }
            ,

            html: true, // optional (jquery.ui.autocomplete.html.js required)

            // optional (if other layers overlap autocomplete list)
            open: function (event, ui) {
                $(".ui-autocomplete").css("z-index", 1000);
            }
        }
        ).focus(function () {
                    page.setText(this,"_");
                    $(this).autocomplete("search");
                      page.setText(this,"");
                })
        .autocomplete("instance")._renderItem = function (ul, item) {
            return $("<li>")
                    .append("<div> <strong> Nombres </strong>" + item.label + " <strong>N° Identificación </strong>" + item.desc + "</div>")
                    .appendTo(ul);
        };

    }
     , setText: function ($txt,$sth)
    {
        $($txt).val($sth);
        $($txt).closest("div").find("input[type=hidden]").val("");

    }
    , panzoomimage: function ()
    {


    }
    , guardarArchivo: function ()
    {
        $archivosSeleccionados = $(".highlighted");
        $archivosdata = [];
        $.each($archivosSeleccionados, function (i, obj) {

            $archivosdata.push({nombre: $(obj).find("#rutafile").val()
                , idCont: $(obj).attr("id")
                , eliminado: false});
        });
        Util.Loading(true);
        $.ajax({
            url: "/guardarArchivos",
            type: "POST",
            dataType: "json",
            data: {
                searchText: JSON.stringify($archivosdata)
                , idAsociado: $("#hdfIdAsociado").val()
                , idPagaduria: $("#hdfIdPagaduria").val()
                , ano: page.yearSel == null ? 0 : page.yearSel
                , mes: page.montSel == null ? 0 : page.montSel + 1
                , _token: $('input[name=_token]').val()
            },
            success: function (data) {
                $.map(data, function (item) {
                    if (item.eliminado)
                    {
                        $("#" + item.idCont).remove();
                    }
                });
                $("#modalAsociar").modal('hide');
                Util.Loading(false);
                Util.Alerta("Archivos asociados con exito", "success", 800);
            }
            , error: function (jqXHR, textStatus, errorThrown)
            {
                Util.Alerta("Se ha producido un error", "danger", 800);
            }
        });
    }
    , modalAsociar: function ()
    {
        $("#elementoNo").text($(".highlighted").length);
        $("#modalAsociar").modal({backdrop: "static"});
    }
    , seleccionarArchivo: function ()
    {
        $(this).toggleClass("highlighted");
        $folder = $(this).find(".folderitem");
        if ($folder.length > 0)
        {
            if ($($folder).attr('class').includes('folderitem'))
            {
                page.navigateFolder($(this).find("#textItemFile").text());
            }
        } else {
            $extension = $(this).find("#textItemFile").text().split(".");
            $leng = $extension.length;
            if ($extension[$leng - 1] == "zip" || $extension[$leng - 1] == "pdf"
                    || $extension[$leng - 1] == "doc" || $extension[$leng - 1] == "docx"
                    || $extension[$leng - 1] == "xls" || $extension[$leng - 1] == "xlsx")
            {
                page.previewFile($(this).find("#rutafile").val(), false);
            } else
            {
                page.previewFile($(this).find("#rutafile").val(), true);
            }

        }
    }
    , previewFile: function (src, imageload)
    {

        var $rutabase = "/getFile?file=" + src;
        var $rutabaseD = "/downLoadFile?file=" + src;
        if (imageload)
        {
            Util.blockBackground(true);
            Util.Loading(true);
            $("#imagePreview").attr("src", $rutabase);
        } else {
            $("#nopreview").fadeIn();
            $("#imagePreview").attr("src", "");
        }
        $("#lnkDescargar").attr("href", $rutabaseD);
        $("#contImg").fadeIn();
    }
    , navigateFolder: function (src)
    {

        var $rutabase = "/asociarArchivo?folder=" + src;

        $(location).attr('href', $rutabase);




    }

}
;

