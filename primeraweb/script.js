var urlWS = "";
$(document).ready(function(){
   urlWS = "http://localhost/sae/server/";
   leer(0);
});


function limpiar(){
    document.getElementById("id").value = "";
    document.getElementById("descripcion").value = "";
}

function leerfiltrado(){
    filtro = document.getElementById("descripcionBuscar").value;
    urltorequest = urlWS +"genero/leer_filtrado";
    $.ajax({
        type: "get",
        url: urltorequest+"?columna=descripcion&tipo_filtro=contiene&filtro="+filtro,
        async:true,
        success:  function (respuesta) {
           toshow = JSON.parse(respuesta);
           cabeceraTabla = "<table class=\"table table-condensed\"><thead><tr><th>id</th><th>Descripcion</th></tr></thead><tbody>";
           pieTabla = "</tbody></table>";
           contenidoTabla = "";
           $(toshow).each(function(key,value){
                contenidoTabla=contenidoTabla+"<tr><td>"+value.id+"</td><td>"+value.descripcion+"</td></tr>";
           });
           document.getElementById("respuesta").innerHTML=cabeceraTabla+contenidoTabla+pieTabla;
        }
    });
}

function leer(id){
    if(id==0){
        urltorequest = urlWS +"genero/leer";
    }else{
        urltorequest = urlWS +"genero/leer?id="+id;
    }
    $.ajax({
        type: "get",
        url: urltorequest,
        async:true,
        success:  function (respuesta) {
           toshow = JSON.parse(respuesta);
           cabeceraTabla = "<table class=\"table table-condensed\"><thead><tr><th>id</th><th>Descripcion</th></tr></thead><tbody>";
           pieTabla = "</tbody></table>";
           contenidoTabla = "";
           $(toshow).each(function(key,value){
                contenidoTabla=contenidoTabla+"<tr><td>"+value.id+"</td><td>"+value.descripcion+"</td></tr>";
           });
           document.getElementById("respuesta").innerHTML=cabeceraTabla+contenidoTabla+pieTabla;
        }
    });
    limpiar();
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
    leer(0);
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
    leer(0);
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
                alert("Error al actualizar el registro");
            }else{
                alert("Registro actualizado.");
            }
        }
    });
    leer(0);
}