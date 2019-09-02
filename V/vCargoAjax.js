
function cargar(){
   $("#divDatos").hide();


}

function consultar(){
   if(document.getElementById('nombreCargo').value!=""){
      $.ajax
      ({
         type: "POST",url:"../C/cConsultarCargo.php",
         data:"nombreCargo="+document.getElementById('nombreCargo').value,
         dataType : 'json',
         success:function(msg)         
         {
            if(msg.length <=0){         
               var campo;
               
               campo="No existen cargos registrados con el nombre de "+document.getElementById('nombreCargo').value;
               $("#tablaResultados").html(campo);
               $("#tablaResultados1").hide();

            }else
            $("#tablaResultados1").hide();
            var respuesta='<tr><th>Resultado Nº</th><th>Cargos Registrados</th></tr>';
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
               respuesta+=msg[index]["nombre_cargo"];
               respuesta+='<input type="hidden" id=';
               respuesta+="nombreCargo2"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["nombre_cargo"];
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
   var idNombre="nombreCargo"+cont;
   document.getElementById("txtNombreCargo").value=document.getElementById(idNombre).value;
   document.getElementById("txtNombreCargoOriginal").value=document.getElementById(idNombre).value;
   $("#divConsulta").hide();
   $("#divDatos").show();
}
function transferirValores2(cont){
   var idNombre="nombreCargo2"+cont;
   document.getElementById("txtNombreCargo").value=document.getElementById(idNombre).value;
   document.getElementById("txtNombreCargoOriginal").value=document.getElementById(idNombre).value;
   $("#divConsulta").hide();
   $("#divDatos").show();
}

function atras(){
   $("#txtNombreCargo").val("");
	$("#divDatos").hide();
   $("#divConsulta").show();

}