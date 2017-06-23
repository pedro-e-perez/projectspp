/* 
 * Rolavsp(Http:www.rolavsp.com)
 * script para informacion finanaciera
 * Bogota Colombia  2016
 */


var page = {
    init: function ()
    {
        var lang = window.navigator.language;
        $.datepicker.setDefaults($.datepicker.regional[lang]);
        $("#categoria").change(function () {
            if($(this).find( "option:selected" ).attr("categoriamesano")=="null"||$(this).find( "option:selected" ).attr("categoriamesano")==0)
            {
                $("#dvanomes").css("display","none");
                
            }
            else{
                 $("#dvanomes").css("display","block");
            }
        });
        $.validator.addMethod(
                "ValidateFile",
                function (value, element) {
                    return ($("#nameFile").val() !== null && $("#nameFile").val() !== '');
                },
                "Debe seleccionar un archivo!"
                );


        $("#forminsert").validate({
            errorClass: "authError",
            rules: {
                categoria: {
                    required: true
                },
                descripcion: {
                    required: true,
                    minlength: 5
                },
                anoMes: {
                    required: true
                },
                uploadFile: {
                    ValidateFile: true



                }
            },
            messages: {
                categoria: {
                    required: "Este campo es requerido"
                },
                descripcion: {
                    required: "Este campo es requerido",
                    minlength: "this field must contain at least {0} characters",
                    digits: "this field can only contain numbers"
                },
                anoMes: {
                    required: "Este campo es requerido",
                    minlength: "this field must contain at least {0} characters",
                    digits: "this field can only contain numbers"
                }

            }

        });
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
        page.cargarArchivo();
        page.CargarCategoria();
        $("#btnGuardar").click(page.GuardarArchivo);

        $("#btnEliminarArchivo").click(page.EliminarArchivo);

        $("#informeArchivos").on("click", ".btnEliminar", function (e) {
            var trEliminar = $(this).closest("tr");
            page.idEliminar = trEliminar.find("#idArchivo").val();
        });
    }
    , cargarArchivo: function ()
    {
        var url = 'CargarArchivo.php';
        $('#uploadFile').fileupload({
            url: url,
            dataType: 'json',
            acceptFileTypes: /(\.|\/)(pdf)$/i,
            done: function (e, data) {
                $('<p/>').text(data.result.FileName).appendTo('#files');
                $("#nameFile").val(data.result.FileName);
                $("#nameFileNew").val(data.result.FileNameNew);
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
                    $("#forminsert").valid();
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
                    } else if (!(regex.test(fname)))
                    {

                        console.log("File extension not supported!");
                        $("label[for*=uploadFile]").text("Seleccione un archivo con extensión pdf.");
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
    , GuardarArchivo: function ()
    {
        if ($("#forminsert").valid())
        {
            var formData = {};
            formData.NombreArchivo = $("#nameFile").val();
            formData.NombreDescarga = $("#nameFileNew").val();
            formData.Ano = page.yearSel==null?0:page.yearSel;
            formData.Mes = page.montSel==null?0: page.montSel+ 1;
            formData.Descripcion = $("#descripcion").val();
            formData.CategoriaId = $("#categoria option:selected").val();
            $.ajax({
                url: "CargarArchivo.php",
                type: "PUT",
                data: JSON.stringify(formData),
                success: function (data, textStatus, jqXHR)
                {
                    var obj = jQuery.parseJSON(data);
                    if (obj.Id !== 0)
                    {

                        page.AgregarFila(obj);
                        $("#myModal").modal("hide");
                    } else
                    {
                        alert('Ha ocurrido un error ');

                    }
                    //data - response from server
                },
                error: function (jqXHR, textStatus, errorThrown)
                {

                }
            });
        }
        return false;
    }
    , CargarCategoria: function ()
    {

        $.ajax({
            url: "_Categoria.php",
            type: "GET",

            success: function (data, textStatus, jqXHR)
            {
                var list = jQuery.parseJSON(data);
                $("#categoria.rownew").remove();
                $.each(list, function (key, value) {
                    $("#categoria").append('<option class="rownew" value="'
                            + value.CategoriaId + '" CategoriaMesAno="'+ value.CategoriaMesAno + '">'
                            + value.CategoriaNombre + '</option>');
                });
                //data - response from server
            },
            error: function (jqXHR, textStatus, errorThrown)
            {

            }
        });

    }
    , AgregarFila: function (informacionFinanciera)
    {
        var tradd = $("<tr></tr>");
         tradd.append("<td>" + $("#categoria").find( "option:selected" ).text()+ "</td>");
        tradd.append("<td>" + informacionFinanciera.Descripcion + "</td>");
        tradd.append("<td>" + informacionFinanciera.NombreArchivo + "</td>");

        tradd.append("<td>" + informacionFinanciera.Mes + "</td>");
        tradd.append("<td>" + informacionFinanciera.Ano + "</td>");
        tradd.append("<td>"
                + "<a download=\"" + informacionFinanciera.NombreArchivo
                + "\" href=\"Images_adm/" + informacionFinanciera.NombreDescarga + "\">"
                + "<span class=\"glyphicon glyphicon-file\" aria-hidden=\"true\"></span>"
                + "</a>"
                + "</td>");
        tradd.append(" <td><span data-toggle=\"modal\" data-target=\"#modalEliminar\" class=\"optionSelect glyphicon glyphicon-remove-circle btnEliminar\" aria-hidden=\"true\"></span></td>");

        $("#informeArchivos").append(tradd);
        $(tradd).focus();

    }
    , EliminarArchivo: function ()
    {
        var formData = {};
        formData.Id = page.idEliminar;

        if (page.idEliminar != 0 && page.idEliminar != null)
        {
            $.ajax({
                url: "CargarArchivo.php",
                type: "DELETE",
                data: JSON.stringify(formData),
                success: function (data, textStatus, jqXHR)
                {
                    var obj = jQuery.parseJSON(data);
                    if (obj === 1)
                    {
                        page.RemoverFila();
                        $("#modalEliminar").modal("hide");
                    } else
                    {
                        alert('Ha ocurrido un error ');

                    }
                    //data - response from server
                },
                error: function (jqXHR, textStatus, errorThrown)
                {

                }
            });

        }


    }
    , RemoverFila: function ()
    {
        $("input[type=hidden][id=idArchivo][value=" + page.idEliminar + "]").closest("tr").remove();

    }

}