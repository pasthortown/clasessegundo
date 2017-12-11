var urlWS = "";
$(document).ready(function(){
   urlWS = "http://lagercshop.byethost7.com/server";
   crearTablaKendo();
});

function crearTablaKendo(){
    $("#tablaKendo").kendoGrid({
        dataSource: {
           pageSize: 5,
           transport: {
              read: {
                    url: "https://demos.telerik.com/kendo-ui/service/Products",
                    dataType: "jsonp"
              }
           }
        },
        columns: [
           {field: "ProductID", title: "Nombres"},
           {field: "ProductName", title: "Apellidos"},
           {field: "UnitPrice", title: "Dirección Domicilio"}
        ],
        pageable:   true,
        selectable:   true,
        filterable: {
            mode: "row",
            extra: false,
            operators: {
               String: {
                  contains: "Contains"
               }
            }
        },
        change: itemSeleccionado
    });
}

function itemSeleccionado(){
   var datos = $("#tablaKendo").data("kendoGrid");
   var selectedItem = datos.dataItem(datos.select());
   alert('La Cédula de ' + selectedItem.nombre1 + ' ' + selectedItem.nombre2 + ' ' + selectedItem.apellido1 + ' ' + selectedItem.apellido2 + ' es: '+ selectedItem.identificacion);
}

function limpiar(){
    document.getElementById("id").value = "";
    document.getElementById("descripcion").value = "";
}

function leer(){
    crearTablaKendo();
}

function borrar(){
    id = document.getElementById("id").value;
    urltorequest = urlWS +"genero/borrar?id="+id;
    $.ajax({
        type: "get",
        url: urltorequest,
        async:false,
        success:  function (respuesta) {
            if(respuesta=="false"){
                alert("Error al borrar el registro " + id + ".");
            }else{
                alert("Registro borrado: " + id + ".");
            }
        }
    });
    leer();
}

function crear(){
    id = document.getElementById("id").value;
    descripcion = document.getElementById("descripcion").value;
    urltorequest = urlWS +"genero/crear";
    $.ajax({
        type: "post",
        url: urltorequest,
        data:JSON.stringify({id: id, descripcion: descripcion}),
        async:false,
        success:  function (respuesta) {
            if(respuesta=="false"){
                alert("Error al crear el registro");
            }else{
                alert("Registro creado.");
            }
        }
    });
    leer();
}

function actualizar(){
    id = document.getElementById("id").value;
    descripcion = document.getElementById("descripcion").value;
    urltorequest = urlWS +"genero/actualizar";
    $.ajax({
        type: "post",
        url: urltorequest,
        data:JSON.stringify({id: id, descripcion: descripcion}),
        async:false,
        success:  function (respuesta) {
            if(respuesta=="false"){
                swal("Error al actualizar el registro");
            }else{
                swal("Registro actualizado.");
            }
        }
    });
    leer();
}