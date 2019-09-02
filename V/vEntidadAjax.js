
function cargar(){
   $("#divDatos").hide();


}

function consultar(){
   if(document.getElementById('nombreEntidad').value!=""){
      $.ajax
      ({
         type: "POST",url:"../C/cConsultarEntidad.php",
         data:"nombreEntidad="+document.getElementById('nombreEntidad').value,
         dataType : 'json',
         success:function(msg)
         {
            if(msg.length <=0){         
               var campo;
               campo="No existen entidades registradas con el nombre de "+document.getElementById('nombreEntidad').value;
               $("#tablaResultados").html(campo);
               $("#tablaResultados1").hide();

            }else
            $("#tablaResultados1").hide();
            var respuesta='<tr><th>Resultado Nº</th><th>Entidades Registradas</th></tr>';
            var contador=-1;
            var contador1=0;
            $(msg).each(function(index, value)
            {
               contador++;
               contador1++;

               respuesta+='<tr onclick=transferirValores2(';
               respuesta+=contador;
               respuesta+=')><td>';
               respuesta+=contador1;
               respuesta+='</td><td>';
               respuesta+=msg[index]["nombre_entidad_propietaria"];
               respuesta+='<input type="hidden" id=';
               respuesta+="nombreEntidad2"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["nombre_entidad_propietaria"];
               respuesta+="\'"+">";
               respuesta+='</td></tr>';                 
               $("#tablaResultados").html(respuesta);
            })
         },
         error: function(xhr, status, error) {
          alert("Error de AJAX");
          }
      }
      )

   }else{
   $("#tablaResultados").html("");
   $("#tablaResultados1").show();
}
}

function transferirValores(cont){
   var idNombre="nombreEntidad"+cont;
   document.getElementById("txtNombreEntidad").value=document.getElementById(idNombre).value;
   document.getElementById("txtNombreEntidadOriginal").value=document.getElementById(idNombre).value;
   $("#divConsulta").hide();
   $("#divDatos").show();
}
function transferirValores2(cont){
   var idNombre="nombreEntidad2"+cont;
   document.getElementById("txtNombreEntidad").value=document.getElementById(idNombre).value;
   document.getElementById("txtNombreEntidadOriginal").value=document.getElementById(idNombre).value;
   $("#divConsulta").hide();
   $("#divDatos").show();
}

function atras(){
   $("#txtNombreEntidad").val("");
   $("#divDatos").hide();
   $("#divConsulta").show();

}