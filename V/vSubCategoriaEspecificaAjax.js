
function cargar(){
   $("#divDatos").hide();


}

function consultar(){
   if(document.getElementById('nombreSubCategoriaEspecifica').value!=""){
      $.ajax
      ({
         type: "POST",url:"../C/cConsultarSubCategoriaEspecifica.php",
         data:"nombreSubCategoriaEspecifica="+document.getElementById('nombreSubCategoriaEspecifica').value,
         dataType : 'json',
         success:function(msg)         
         {
            if(msg.length <=0){         
               var campo;
               
               campo="No existen SubCategoria Especifica registrados con el nombre de "+document.getElementById('nombreSubCategoriaEspecifica').value;
               $("#tablaResultados").html(campo);
               $("#tablaResultados1").hide();

            }else
            $("#tablaResultados1").hide();
            var respuesta='<tr><th>Resultado Nº</th><th>SubCategoria Especifica Registradas</th><th>Código</tr>';
            var contador=-1;
            var contador1=0;
            $(msg).each(function(index, value)
            {
               contador++;
               contador1++;

               respuesta+='<tr onclick=transferirValoresB(';
               respuesta+=contador;
               respuesta+=')><td>';
               respuesta+=contador1;
               respuesta+='</td><td>';
               respuesta+=msg[index]["nombre_sub_categoria_especifica"];
               respuesta+='<input type="hidden" id=';
               respuesta+="nombreSubCategoriaEspecificaB"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["nombre_sub_categoria_especifica"];
               respuesta+="\'"+">";
               respuesta+='<input type="hidden" id=';
               respuesta+="nombreSubGrupoB"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["id_subgrupo"];
               respuesta+="\'"+">";
               respuesta+='</td>';                 
               respuesta+='<td>';
               respuesta+=msg[index]["codigo_sub_categoria_especifica"];
               respuesta+='<input type="hidden" id=';
               respuesta+="codigoSubCategoriaEspecificaB"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["codigo_sub_categoria_especifica"];
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
   var idNombre2="nombreSubCategoriaEspecifica"+cont;
   var idNombre="nombreSubGrupo"+cont;
   var idCodigo="codigoSubCategoriaEspecifica"+cont;   
   document.getElementById("txtNombreSubCategoriaEspecifica").value=document.getElementById(idNombre2).value;      
   document.getElementById("txtNombreSubgrupoOriginal").value=document.getElementById(idNombre2).value;   
   document.getElementById("txtCodigoSubCategoriaEspecifica").value=document.getElementById(idCodigo).value;
   
   var valor=document.getElementById(idNombre).value;
$("#id_subgrupo2 option[value="+ valor +"]").attr("selected",true);
   $("#divConsulta").hide();
   $("#divDatos").show();
}

function transferirValoresB(cont){
   var idNombre2="nombreSubCategoriaEspecificaB"+cont;
   var idNombre="nombreSubGrupoB"+cont;
   var idCodigo="codigoSubCategoriaEspecificaB"+cont;
   document.getElementById("txtNombreSubCategoriaEspecifica").value=document.getElementById(idNombre2).value;
   document.getElementById("txtNombreSubgrupoOriginal").value=document.getElementById(idNombre2).value; 
   document.getElementById("txtCodigoSubCategoriaEspecifica").value=document.getElementById(idCodigo).value;
   document.getElementById("txtCodigoSubCategoriaEspecificaOriginal").value=document.getElementById(idCodigo).value;
   var valor=document.getElementById(idNombre).value;
$("#id_subgrupo2 option[value="+ valor +"]").attr("selected",true);
   $("#divConsulta").hide();
   $("#divDatos").show();
}

function atras(){
   $("#txtNombreSubgrupo").val("");
   $("#divDatos").hide();
   $("#divConsulta").show();

}