var Util = {

    MostrarAlerta: function (msg, tipo) {

        if (tipo == 'error') {
            $("#snoAlertBox").attr("class", "");
            $("#snoAlertBox").attr("class", "alert alert-warning");
            $("#snoAlertBox").fadeIn(300)
            $("#snoAlertBox label").text(msg);
        } else if (tipo == 'ok') {
            $("#snoAlertBox").attr("class", "");
            $("#snoAlertBox").attr("class", "alert alert-success");
            $("#snoAlertBox").fadeIn(300)
            $("#snoAlertBox label").text(msg);
            $("#snoAlertBox").fadeOut(4000)
        } else {

            $("#snoAlertBox").attr("class", "");
            $("#snoAlertBox").attr("class", "alert alert-info");
            $("#snoAlertBox").fadeIn(300)
            $("#snoAlertBox label").text(msg);
            $("#snoAlertBox").fadeOut(8000)

        }

    },
    MostrarLoading: function (estado) {
        if (estado) {
            $("#snoAlertBox").attr("class", "");
            $("#snoAlertBox").attr("class", "alert alert-info");
            $("#snoAlertBox label").before("<span class=\"glyphicon glyphicon-refresh glyphicon-refresh-animate glyphicon-spin\"></span>");
            $("#snoAlertBox").fadeIn(300)
            $("#snoAlertBox label").text("Accion en Proceso..");

        } else {

            $("#snoAlertBox").find(".glyphicon-spin").remove();

            $("#snoAlertBox").fadeOut(40)

        }
    }

    , Confirm: function (titulo, msg, fncok, cancel) {
        var modal = '<div class="modal fade" id="modalConfirm" role="dialog">'
                + ' <div class="modal-dialog">'
                + '<!-- Modal content-->'
                + '<div class="modal-content">'
                + '<div class="modal-header">'
                + (cancel ? '<button type="button" class="close" data-dismiss="modal">&times;</button>' : '')
                + '<h4 class="modal-title">' + titulo
                + '</h4>'
                + '</div>'
                + '<div class="modal-body">'
                + '<p>' + msg + '</p>'
                + '</div>'
                + '<div class="modal-footer">'
                + '<button type="button" id="btnAceptarConfirm"class="btn btn-default" data-dismiss="modal">Aceptar</button>'
                + (cancel ? '<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>' : '')
                + '</div>'
                + '</div>'
                + '</div>'
                + '</div>';

        $(modal).appendTo('body');
        $("#btnAceptarConfirm").click(
                fncok
                );
        $("#modalConfirm").modal({show: true, backdrop: 'static'});
        $("#modalConfirm").on('hide.bs.modal', function () {

            $("#modalConfirm").remove();
        });
        // $("#myModal").modal('show');

    }
    , Alerta: function (message, alert, timeout) {

        $('<div style="top:' + ($(window).scrollTop() + ($(window).height() * 0.2)) + 'px;" id="floating_alert" class="alert alert-'
                + alert
                + ' fade in"><button type="button" class="close" data-dismiss="alert" '
                + 'aria-hidden="true">×</button>' + message
                + '&nbsp;&nbsp;</div>').appendTo('body');


        setTimeout(function () {
            $(".alert").alert('close');
        }, timeout);


    }
    , Loading: function (estado)
    {
        if (estado) {
            $('<div  id="idloading" style="top:' + ($(window).scrollTop() + ($(window).height() * 0.2)) + 'px;" id="floating_alert" '
                    + 'class="alert alert-info'
                    + ' fade in"><button type="button" class="close" data-dismiss="alert" '
                    + 'aria-hidden="true">×</button>'
                    + "Procesando <i class=\"fa fa-spinner fa-2x fa-spin\"></i>"
                    + '&nbsp;&nbsp;</div>').appendTo('body');

        } else {
            $("#idloading").remove();

        }



    }
    , blockBackground: function (estado)
    {
        if (estado) {
            $('<div class="modal-block"></div>').appendTo('body');
        } else {
            $(".modal-block").remove();

        }

    }


};