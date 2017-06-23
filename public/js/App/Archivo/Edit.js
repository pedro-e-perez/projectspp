/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var page = {

    init: function ()
    {
        page.eventos();
    }
    , eventos: function ()
    {
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
                $("#hdffiltersano").val(inst.selectedYear);
                $("#hdffiltersmes").val(inst.selectedMonth+1);
                $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
            }
        });
        page.autoCompleteFilters();

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
                })
                .focus(function () {
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
                })
                .focus(function () {
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
};

