
function cargar(){
   $("#divDatos").hide();


}

function consultar(){
   if(document.getElementById('nombreSeccion').value!=""){
      $.ajax
      ({
         type: "POST",url:"../C/cConsultarSeccion.php",
         data:"nombreSeccion="+document.getElementById('nombreSeccion').value,
         dataType : 'json',
         success:function(msg)         
         {
            if(msg.length <=0){         
               var campo;
               
               campo="No existen Secciones Registradas con el nombre de "+document.getElementById('nombreSeccion').value;
               $("#tablaResultados").html(campo);
               $("#tablaResultados1").hide();

            }else
            $("#tablaResultados1").hide();
            var respuesta='<tr><th>Resultado Nº</th><th>Secciones Registradas</th><th>Código</th></tr>';
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
               respuesta+=msg[index]["nombre_seccion"];
               respuesta+='<input type="hidden" id=';
               respuesta+="nombreSeccion2"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["id_entidad_propietaria"];
               respuesta+="\'"+">";
               respuesta+='<input type="hidden" id=';
               respuesta+="nombreEntidad2"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["nombre_seccion"];
               respuesta+="\'"+">";
               respuesta+='</td>';                 
               respuesta+='<td>';                 
               respuesta+=msg[index]["codigo_seccion"];
               respuesta+='<input type="hidden" id=';
               respuesta+="codigoSeccion2"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["codigo_seccion"];
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
   var idNombre2="nombreSeccion"+cont;
   var idNombre="nombreEntidad"+cont;
   var idCodigo="codigoSeccion"+cont;

   document.getElementById("txtNombreSeccion").value=document.getElementById(idNombre).value;
   document.getElementById("txtNombreSeccionOriginal").value=document.getElementById(idNombre).value;
   var valor=document.getElementById(idNombre2).value;
   document.getElementById("txtCodigoSeccion").value=document.getElementById(idCodigo).value;
   document.getElementById("txtCodigoSeccionOriginal").value=document.getElementById(idCodigo).value;
$("#id_entidad2 option[value="+ valor +"]").attr("selected",true);
   $("#divConsulta").hide();
   $("#divDatos").show();
}

function transferirValores2(cont){
   var idNombre2="nombreSeccion2"+cont;
   var idNombre="nombreEntidad2"+cont;
   var idCodigo="codigoSeccion2"+cont;

   document.getElementById("txtNombreSeccion").value=document.getElementById(idNombre).value;
   document.getElementById("txtNombreSeccionOriginal").value=document.getElementById(idNombre).value;
   var valor=document.getElementById(idNombre2).value;
   document.getElementById("txtCodigoSeccion").value=document.getElementById(idCodigo).value;
   document.getElementById("txtCodigoSeccionOriginal").value=document.getElementById(idCodigo).value;
$("#id_entidad2 option[value="+ valor +"]").attr("selected",true);
   $("#divConsulta").hide();
   $("#divDatos").show();
}

function atras(){
   $("#txtNombreSeccion").val("");
	$("#divDatos").hide();
   $("#divConsulta").show();

}