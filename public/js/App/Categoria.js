/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var page = {

    init: function () {
        page.ValidateForm();
        $("#informeArchivos").on("click", "#spnEliminar", function () {
            $("#modalEliminar").modal("show");
            page.treliminar=$(this).closest("tr");
            return false;
        });
        $("#informeArchivos").on("change", "input.form-control", page.ActualizarCategoria);
        $("#informeArchivos").on("change", "input[type='checkbox']", page.ActualizarCategoria);
        $("#btnEliminarArchivo").click(page.EliminarCategoria);
    }
    , ValidateForm: function ()
    {

        $("#formCategoria input").jqBootstrapValidation({
            preventSubmit: true,
            submitError: function ($form, event, errors) {
                // something to have when submit produces an error ?
                // Not decided if I need it yet
            },
            submitSuccess: function ($form, event) {

                $.ajax({
                    type: 'POST',
                    url: $form.attr('action'),
                    data: $form.serialize(),
                    success: function (data)
                    {
                        // just to confirm ajax submission
                        console.log('submitted successfully!');
                        location.reload();
                    }
                });
                event.preventDefault(); // prevent default submit behaviour

            },
            filter: function () {
                return $(this).is(":visible");
            }
        });


    }
    , EliminarCategoria: function ()
    {
        var formData = {};
        var trsel =  page.treliminar;
        formData.Id = trsel.find("#idCategoria").val();

        if (formData.Id != 0 && formData.Id != null)
        {
            $.ajax({
                url: "_Categoria.php",
                type: "DELETE",
                data: JSON.stringify(formData),
                success: function (data, textStatus, jqXHR)
                {
                    var obj = jQuery.parseJSON(data);
                    if (obj === 1)
                    {
                        trsel.remove();

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


        console.log("objeto eliminado");

    }
    , ActualizarCategoria: function ()
    {
        var formData = {};
        var trsel = $(this).closest("tr");
        formData.Id = trsel.find("#idCategoria").val();
        formData.Nombre = trsel.find("#Nombre").val();
        formData.Orden = trsel.find("#Orden").val();
        formData.CategoriaMesAno = trsel.find("#mesano").prop('checked') ? '1' : '0';

        if (formData.Id != 0 && formData.Id != null)
        {
            $.ajax({
                url: "_Categoria.php",
                type: "PUT",
                data: JSON.stringify(formData),
                success: function (data, textStatus, jqXHR)
                {
                    var obj = jQuery.parseJSON(data);
                    if (obj === 1)
                    {
                        $("#modalActualizar").modal("show");

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


        console.log("objeto eliminado");

    }
};