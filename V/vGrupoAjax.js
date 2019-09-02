function cargar(){
   $("#divDatos").hide();


}

function consultar(){
   if(document.getElementById('nombreGrupo').value!=""){
      $.ajax
      ({
         type: "POST",url:"../C/cConsultarGrupo.php",
         data:"nombreGrupo="+document.getElementById('nombreGrupo').value,
         dataType : 'json',
         success:function(msg)
         {
            if(msg.length <=0){         
               var campo;
               campo="No existen Categorías registradas con el nombre de "+document.getElementById('nombreGrupo').value;
               $("#tablaResultados").html(campo);
               $("#tablaResultados1").hide();

            }else{
            $("#tablaResultados1").hide();
            var respuesta='<tr><th>Resultado Nº</th><th>Categorías Registrados</th><th>Código</th></tr>';
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
               respuesta+=msg[index]["nombre_grupo"];
               respuesta+='<input type="hidden" id=';
               respuesta+="nombreGrupo2"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["nombre_grupo"];
               respuesta+="\'"+">";
               respuesta+='</td>';
               respuesta+='<td>';
               respuesta+=msg[index]["codigo_grupo"];
               respuesta+='<input type="hidden" id=';
               respuesta+="codigoGrupo2"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["codigo_grupo"];
               respuesta+="\'"+">";
               respuesta+='</td></tr>';



                                
               $("#tablaResultados").html(respuesta);
            });
         }},
         error: function(xhr, status, error) {
          alert("Error de AJAX");
          }
      }
      );

   }else{
   $("#tablaResultados").html("");
   $("#tablaResultados1").show();
}
}

function consultarSubgrupos(){
      $.ajax
      ({
         type: "POST",url:"../C/cConsultarGrupoSubgrupo.php",
         data:"nombreGrupoOriginal="+document.getElementById('txtNombreGrupoOriginal').value,
         dataType : 'json',
         success:function(msg)
         {         
            if(msg.length <=0){         
               var campo;
               campo="No existen SubCategoría registradas a la Categoría "+document.getElementById('txtNombreGrupoOriginal').value;
               $("#tablaResultados2").html(campo);
            }else{
               var cont=0;
               var respuesta='<tr><th>Resultado Nº</th><th>SubCategoría registradas a la Categoría: ';               
               respuesta+=document.getElementById('txtNombreGrupoOriginal').value;
               respuesta+='</th></tr>';
               $(msg).each(function(index, value){
                  cont++;               
                  respuesta+='<tr><td>';
                  respuesta+=cont;
                  respuesta+='</td><td>';
                  respuesta+=msg[index]["nombre_subgrupo"];
                  respuesta+='</td></tr>'; 
                  $("#tablaResultados2").html(respuesta);                 
            })

            }

         },
         error: function(xhr, status, error) {
          alert("Error de AJAX");
          }

      })
   }//Fin consultarSubGrupos

function transferirValores(cont){
   var idNombre="nombreGrupo"+cont;
   var idCodigo="codigoGrupo"+cont;
   document.getElementById("txtNombreGrupo").value=document.getElementById(idNombre).value;
   document.getElementById("txtNombreGrupoOriginal").value=document.getElementById(idNombre).value;
   document.getElementById("txtCodigoGrupo").value=document.getElementById(idCodigo).value;
   document.getElementById("txtCodigoGrupoOriginal").value=document.getElementById(idCodigo).value;
   $("#divConsulta").hide();
   $("#divDatos").show();
   consultarSubgrupos();
}

function transferirValores2(cont){
   var idNombre="nombreGrupo2"+cont;
   var idCodigo="codigoGrupo2"+cont;
   document.getElementById("txtNombreGrupo").value=document.getElementById(idNombre).value;
   document.getElementById("txtNombreGrupoOriginal").value=document.getElementById(idNombre).value;
   document.getElementById("txtCodigoGrupo").value=document.getElementById(idCodigo).value;
   document.getElementById("txtCodigoGrupoOriginal").value=document.getElementById(idCodigo).value;
   $("#divConsulta").hide();
   $("#divDatos").show();
   consultarSubgrupos();
}

function atras(){
   $("#txtNombreGrupo").val("");
	$("#divDatos").hide();
   $("#divConsulta").show();

}