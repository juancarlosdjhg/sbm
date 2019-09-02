
function cargar(){
   $("#divDatos").hide();


}

function consultar(){
   if(document.getElementById('nombreSubgrupo').value!=""){
      $.ajax
      ({
         type: "POST",url:"../C/cConsultarSubgrupo.php",
         data:"nombreSubgrupo="+document.getElementById('nombreSubgrupo').value,
         dataType : 'json',
         success:function(msg)         
         {
            if(msg.length <=0){         
               var campo;
               
               campo="No existen subCategorías registradas con el nombre de "+document.getElementById('nombreSubgrupo').value;
               $("#tablaResultados").html(campo);
               $("#tablaResultados1").hide();

            }else
            $("#tablaResultados1").hide();
            var respuesta='<tr><th>Resultado Nº</th><th>SubCategorías Registradas</th><th>Código</tr>';
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
               respuesta+=msg[index]["nombre_subgrupo"];
               respuesta+='<input type="hidden" id=';
               respuesta+="nombreSubgrupo2"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["nombre_subgrupo"];
               respuesta+="\'"+">";
               respuesta+='<input type="hidden" id=';
               respuesta+="nombreGrupo2"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["id_grupo"];
               respuesta+="\'"+">";
               respuesta+='</td>';                 
               respuesta+='<td>';
               respuesta+=msg[index]["codigo_subgrupo"];
               respuesta+='<input type="hidden" id=';
               respuesta+="codigoSubgrupo2"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["codigo_subgrupo"];
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
   var idNombre2="nombreSubgrupo"+cont;
   var idNombre="nombreGrupo"+cont;
   var idCodigo="codigoSubGrupo"+cont;
   document.getElementById("txtNombreSubgrupo").value=document.getElementById(idNombre).value;
   document.getElementById("txtNombreSubgrupoOriginal").value=document.getElementById(idNombre).value;
   document.getElementById("txtCodigoSubgrupo").value=document.getElementById(idCodigo).value;
   document.getElementById("txtCodigoSubgrupoOriginal").value=document.getElementById(idCodigo).value;
   var valor=document.getElementById(idNombre2).value;
$("#id_grupo2 option[value="+ valor +"]").attr("selected",true);
   $("#divConsulta").hide();
   $("#divDatos").show();
}

function transferirValores2(cont){
   var idNombre2="nombreSubgrupo2"+cont;
   var idNombre="nombreGrupo2"+cont;
   var idCodigo="codigoSubgrupo2"+cont;
   document.getElementById("txtNombreSubgrupo").value=document.getElementById(idNombre2).value;
   document.getElementById("txtNombreSubgrupoOriginal").value=document.getElementById(idNombre2).value;
   document.getElementById("txtCodigoSubgrupo").value=document.getElementById(idCodigo).value;
   document.getElementById("txtCodigoSubgrupoOriginal").value=document.getElementById(idCodigo).value;
   var valor=document.getElementById(idNombre).value;
$("#id_grupo2 option[value="+ valor +"]").attr("selected",true);
   $("#divConsulta").hide();
   $("#divDatos").show();
}

function atras(){
   $("#txtNombreSubgrupo").val("");
	$("#divDatos").hide();
   $("#divConsulta").show();

}