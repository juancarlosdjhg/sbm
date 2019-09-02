
function cargar(){
   $("#divDatos").hide();


}

function consultar(){



   if(document.getElementById('codigoProveedor').value!=""){
      $.ajax
      ({
         type: "POST",url:"../C/cConsultarProveedor.php",
         data:"codigoProveedor="+document.getElementById('codigoProveedor').value,
         dataType : 'json',
         success:function(msg)         
         {
            if(msg.length <=0){         
               var campo;
               
               campo="No existen Proveedores Registrados con el nombre de "+document.getElementById('codigoProveedor').value;
               $("#tablaResultados").html(campo);
               $("#tablaResultados1").hide();

            }else
            $("#tablaResultados1").hide();
            var respuesta='<tr><th>Resultado Nº</th><th>Proveedores Registrados</th><th>Rif</th></tr>';
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
               respuesta+=msg[index]["codigo_proveedor"];
               respuesta+='<input type="hidden" id=';
               respuesta+="codigoProveedorB"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["codigo_proveedor"];
               respuesta+="\'"+">";
               respuesta+='<input type="hidden" id=';
               respuesta+="rifProveedorB"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["rif"];
               respuesta+="\'"+">";
               respuesta+='<input type="hidden" id=';
               respuesta+="tipoProveedorB"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["tipo_proveedor"];
               respuesta+="\'"+">";
               respuesta+='<input type="hidden" id=';
               respuesta+="descripcionProveedorB"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["descripcion_proveedor"];
               respuesta+="\'"+">";
               respuesta+='<input type="hidden" id=';
               respuesta+="otraDescripcionB"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["otra_descripcion"];
               respuesta+="\'"+">";
               respuesta+='<input type="hidden" id=';
               respuesta+="idProveedorB"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["id_proveedor"];
               respuesta+="\'"+">";
               respuesta+='</td>';                 
               respuesta+='<td>';                 
               respuesta+=msg[index]["rif"];

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
   
   $("#divConsulta").hide();
   $("#divDatos").show();
   
   var idRif="rifProveedor"+cont;
   var idRifDelProveedor="rifDelProveedor"+cont;
   var idTipoRif="tipoRif"+cont;
   var idSufijoRif="sufijoRif"+cont;
   var idCodigo="codigoProveedor"+cont;
   var idTipoProveedor="tipoProveedor"+cont;
   var idDescripcion="descripcionProveedor"+cont;
   var idOtraDescripcion="otraDescripcion"+cont;
   var idProveedor="idProveedor"+cont;

   var valorTipo=document.getElementById(idTipoProveedor).value;
   document.getElementById("txtRifProveedor").value=document.getElementById(idRifDelProveedor).value;
   document.getElementById("txtSufijoRif").value=document.getElementById(idSufijoRif).value;
   document.getElementById("txtCodigoProveedor").value=document.getElementById(idCodigo).value;
   document.getElementById("txtDescripcionProveedor").value=document.getElementById(idDescripcion).value;
   document.getElementById("txtOtraDescripcionProveedor").value=document.getElementById(idOtraDescripcion).value;
   document.getElementById("txtIdProveedor").value=document.getElementById(idProveedor).value;
   $("#txtTipoProveedor option[value="+ valorTipo +"]").attr("selected",true); 
   
}

function transferirValoresB(cont){
   
   $("#divConsulta").hide();
   $("#divDatos").show();
   
   var idRif="rifProveedorB"+cont;
   var idRifDelProveedor="rifDelProveedorB"+cont;
   var idTipoRif="tipoRifB"+cont;
   var idSufijoRif="sufijoRifB"+cont;
   var idCodigo="codigoProveedorB"+cont;
   var idTipoProveedor="tipoProveedorB"+cont;
   var idDescripcion="descripcionProveedorB"+cont;
   var idOtraDescripcion="otraDescripcionB"+cont;
   var idProveedor="idProveedorB"+cont;

   var valorTipoB=document.getElementById(idTipoProveedor).value;
   document.getElementById("txtTipoRif").value=document.getElementById(idTipoRif).value;
   document.getElementById("txtRifProveedor").value=document.getElementById(idRifDelProveedor).value;
   document.getElementById("txtSufijoRif").value=document.getElementById(idSufijoRif).value;
   document.getElementById("txtCodigoProveedor").value=document.getElementById(idCodigo).value;
   document.getElementById("txtDescripcionProveedor").value=document.getElementById(idDescripcion).value;
   document.getElementById("txtOtraDescripcionProveedor").value=document.getElementById(idOtraDescripcion).value;
   document.getElementById("txtIdProveedor").value=document.getElementById(idProveedor).value;
   $("#txtTipoProveedor option[value="+ valorTipoB +"]").attr("selected",true); 
   
}


function atras(){
   $("#txtCodigoProveedor").val("");
	$("#divDatos").hide();
   $("#divConsulta").show();

}