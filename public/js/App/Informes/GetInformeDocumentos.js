/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var page = {
    init: function ()
    {

        page.autoCompleteFilters();
        page.eventselectano();
        page.eventselectmes();
        $("div[id*=archivos]").on('click', '.fileView', page.seleccionarArchivo);
        $("#imagePreview").on('load', function () {
            Util.Loading(false);
            Util.blockBackground(false);
        });
        $("#btninfo").click(page.getInfo);
    },
    autoCompleteFilters: function ()
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
                        $("#hdffiltersaAsociado").val(ui.item.value);
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
                .autocomplete({
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
                        $("#hdffiltersPagaduria").val(ui.item.value);
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
        $("#filtersano")
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
                                type: 'Año'
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
                        $("#hdffiltersano").val(ui.item.value);
                        event.preventDefault();

                        $("#filtersano").val(ui.item.label);
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
                    .append("<div> <strong> Año </strong>" + item.label + "</div>")
                    .appendTo(ul);
        };
        $("#filtersMes")
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
                                type: 'Mes'
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
                        $("#hdffiltersMes").val(ui.item.value);
                        event.preventDefault();

                        $("#filtersMes").val(ui.item.label);
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
                    .append("<div> <strong> Mes </strong>" + item.label + "</div>")
                    .appendTo(ul);
        };

    }
    , setText: function ($txt)
    {
        $($txt).val("");
        $($txt).closest("div").find("input[type=hidden]").val("");

    }
    , seleccionarArchivo: function ()
    {
        $(".highlighted").removeClass("highlighted");
        $(this).toggleClass("highlighted");

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
    , previewFile: function (src, imageload)
    {
        page.idArchivo = src;
        var $rutabase = "/getFileById?file=" + src;
        var $rutabaseD = "/downLoadFileByID?file=" + src;
        if (imageload)
        {
            Util.Loading(true);
            Util.blockBackground(true);
            $("#imagePreview").attr("src", $rutabase);
        } else {
            $("#nopreview").fadeIn();
            $("#imagePreview").attr("src", "");
        }
        $("#lnkDescargar").attr("href", $rutabaseD);
        $("#contImg").fadeIn();
    }
    , eventselectano: function ()
    {
        $("div[id*=contFolderYear]").on("click", page.selectAno);
        $("#dvRuta").on("click", ".anoselect", page.unselectAno);
    }
    , selectAno: function ()
    {
        Util.Loading(true);
        Util.blockBackground(true);
        page.ano = $(this).find("#paramfolder").val();
        page.ident = $(this).attr("ident");
        page.$contAno = $(this).closest("#contAno");
        $(page.$contAno).addClass("selectAno");



        $("div[id=contAsc][ident=" + page.ident + " ]").addClass("selectedAsociado");
        $(":not(.selectedAsociado)div[id=contAsc]").css("display", "none");
        $("#dvRuta").append("<li class='anoselect'>" + page.ano + "</li>");
        if ($(":not(.selectAno)div[id*=contAno]").length > 0)
        {
            $(":not(.selectAno)div[id*=contAno]").fadeOut(function () {
                page.$contAno.find("div[id*=contFolderYear]").css("display", "none");
                page.$contAno.find("div[id*=ContMes]").fadeIn(function () {
                    $(page.$contAno).css("display", " ");
                    Util.blockBackground(false);
                    Util.Loading(false);
                });
            });


        } else {
            page.$contAno.find("div[id*=contFolderYear]").css("display", "none");
            page.$contAno.find("div[id*=ContMes]").fadeIn(function () {
                $(page.$contAno).css("display", " ");
                Util.blockBackground(false);
                Util.Loading(false);
            });

        }

        //alert('ano:'+$(this).find("#paramfolder").val()+' idento'+$(this).attr("ident"));

    }
    , unselectAno: function ()
    {
        Util.Loading(true);
        Util.blockBackground(true);
        $objli = $(this);


        $(":not(.selectedAsociado)div[id=contAsc]").css("display", "");


        $("div[id*=ContMes]").fadeOut(function () {
            $("div[id*=contFolderYear]").css("display", "");
            $(":not(.selectAno)div[id*=contAno]").fadeIn(function () {
                $(page.$contAno).css("display", "");
                $(page.$contAno).find("div[id*=contFolderMonth]").css("display", "");
                page.$contMes.find("#archivos").css("display", "none");
                $("#dvRuta .messelect").remove();
                $objli.remove();
                $(page.$contAno).removeClass("selectAno");
                Util.Loading(false);
                Util.blockBackground(false);
            });
        });

        //alert('ano:'+$(this).find("#paramfolder").val()+' idento'+$(this).attr("ident"));

    }

    , eventselectmes: function ()
    {
        $("div[id*=contFolderMonth]").on("click", page.selectmes);
        $("#dvRuta").on("click", ".messelect", page.unSelectMes);
    }
    , selectmes: function ()
    {
        Util.Loading(true);
        Util.blockBackground(true);
        page.mes = $(this).find("#paramfolder").val();
        $contano = $(this).closest("#contAno");
        page.$contMes = $(this).closest("#ContMes");
        $("#dvRuta").append("<li class='messelect'>" + page.mes + "</li>");
        $contano.find("div[id*=contFolderMonth]").fadeOut(function () {
            page.$contMes.find("#archivos").fadeIn(function () {

                Util.blockBackground(false)
                Util.Loading(false);
                ;
            });
            //alert('ano:'+$(this).find("#paramfolder").val()+' idento'+$(this).attr("ident"));
        });
    }
    , unSelectMes: function ()
    {

        Util.blockBackground(true);
        $objli = $(this);
        //$("#dvRuta").append("<li>" + page.mes + "</li>");
        page.$contMes.find("#archivos").fadeOut(function () {
            $contano.find("div[id*=contFolderMonth]")
                    .fadeIn(function () {
                        page.mes = 0;
                        Util.blockBackground(false);
                        $objli.remove();
                    });
            //alert('ano:'+$(this).find("#paramfolder").val()+' idento'+$(this).attr("ident"));
        });
    }
    , getInfo: function ()
    {
        $.ajax({
            url: "/getArchivoByiD",
            dataType: "json",
            data: {
                idArchivo:  page.idArchivo
            },
            success: function (data) {
                $("#asociado").text(data.nombreAsociado);
                $("#archivo").text(data.nombre_archivo);
                $("#pagaduria").text(data.nombrePagaduria);
                $("#mes").text(data.mesName);
                $("#ano").text(data.ano);
                $("#tipoDoc").text(data.NombreTipoDoc);
                $("#modalAsociar").modal();

            }
        });

    }
};