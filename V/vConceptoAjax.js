
function cargar(){
   $("#divDatos").hide();


}

function consultar(){
   if(document.getElementById('nombreConcepto').value!=""){
      $.ajax
      ({
         type: "POST",url:"../C/cConsultarConcepto.php",
         data:"nombreConcepto="+document.getElementById('nombreConcepto').value,
         dataType : 'json',
         success:function(msg)         
         {
            if(msg.length <=0){         
               var campo;
               
               campo="No existen Conceptos registrados con el nombre de "+document.getElementById('nombreConcepto').value;
               $("#tablaResultados").html(campo);
               $("#tablaResultados1").hide();

            }else
            $("#tablaResultados1").hide();
            var respuesta='<tr><th>Resultado Nº</th><th>Conceptos Registrados</th><th>Tipo</th></tr>';
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
               respuesta+=msg[index]["nombre_concepto"];
               respuesta+='</td><td>';
               respuesta+=msg[index]["nombre_tipo_concepto"];
               respuesta+='<input type="hidden" id=';
               respuesta+="nombreConcepto2"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["nombre_concepto"];
               respuesta+="\'"+">";
               respuesta+='<input type="hidden" id=';
               respuesta+="nombreTipo2"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["id_tipo_concepto"];
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
   var idNombre2="nombreConcepto"+cont;
   var idNombre="nombreTipo"+cont;
   document.getElementById("txtNombreConcepto").value=document.getElementById(idNombre).value;
   document.getElementById("txtNombreConceptoOriginal").value=document.getElementById(idNombre).value;
   var valor=document.getElementById(idNombre2).value;
$("#id_tipo2 option[value="+ valor +"]").attr("selected",true);
   $("#divConsulta").hide();
   $("#divDatos").show();
}

function transferirValores2(cont){
   var idNombre="nombreConcepto2"+cont;
   var idNombre2="nombreTipo2"+cont;
   document.getElementById("txtNombreConcepto").value=document.getElementById(idNombre).value;
   document.getElementById("txtNombreConceptoOriginal").value=document.getElementById(idNombre).value;
   var valor=document.getElementById(idNombre2).value;
$("#id_tipo2 option[value="+ valor +"]").attr("selected",true);
   $("#divConsulta").hide();
   $("#divDatos").show();
}

function atras(){
   $("#txtNombreConcepto").val("");
	$("#divDatos").hide();
   $("#divConsulta").show();

}