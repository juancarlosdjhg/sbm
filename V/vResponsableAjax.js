
function cargar(){
   $("#divDatos").hide();


}

function consultar(){



   if(document.getElementById('nombreResponsable').value!=""){
      $.ajax
      ({
         type: "POST",url:"../C/cConsultarResponsable.php",
         data:"nombreResponsable="+document.getElementById('nombreResponsable').value,
         dataType : 'json',
         success:function(msg)         
         {
            if(msg.length <=0){         
               var campo;
               
               campo="No existen Responsables Registrados con el nombre de "+document.getElementById('nombreResponsable').value;
               $("#tablaResultados").html(campo);
               $("#tablaResultados1").hide();

            }else
            $("#tablaResultados1").hide();
            var respuesta='<tr><th>Resultado Nº</th><th>Responsables Registrados</th><th>Cédula</th></tr>';
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
               respuesta+=msg[index]["nombre"];
               respuesta+='<input type="hidden" id=';
               respuesta+="nombreResponsableB"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["nombre"];
               respuesta+="\'"+">";
               respuesta+='<input type="hidden" id=';
               respuesta+="cedulaResponsableB"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["cedula"];
               respuesta+="\'"+">";
               respuesta+='<input type="hidden" id=';
               respuesta+="apellidoResponsableB"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["apellido"];
               respuesta+="\'"+">";
               respuesta+='<input type="hidden" id=';
               respuesta+="sexoResponsableB"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["sexo"];
               respuesta+="\'"+">";
               respuesta+='<input type="hidden" id=';
               respuesta+="telefonoResponsableB"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["telefono"];
               respuesta+="\'"+">";
               respuesta+='<input type="hidden" id=';
               respuesta+="cargoResponsableB"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["id_cargo"];
               respuesta+="\'"+">";
               respuesta+='<input type="hidden" id=';
               respuesta+="tipoResponsableB"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["tipo_responsable"];
               respuesta+="\'"+">";
               respuesta+='<input type="hidden" id=';
               respuesta+="dependenciaAdministrativaB"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["id_entidad_propietaria"];
               respuesta+="\'"+">";
               respuesta+='<input type="hidden" id=';
               respuesta+="numeroResolucionB"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["resolucion"];
               respuesta+="\'"+">";
               respuesta+='<input type="hidden" id=';
               respuesta+="fechaResolucionB"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["fecha_resolucion"];
               respuesta+="\'"+">";
               respuesta+='<input type="hidden" id=';
               respuesta+="numeroDecretoB"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["decreto"];
               respuesta+="\'"+">";
               respuesta+='<input type="hidden" id=';
               respuesta+="fechaDecretoB"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["fecha_decreto"];
               respuesta+="\'"+">";
               respuesta+='<input type="hidden" id=';
               respuesta+="idResponsableB"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["id_responsable"];
               respuesta+="\'"+">";
               respuesta+='</td>';                 
               respuesta+='<td>';                 
               respuesta+=msg[index]["cedula"];

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
   
   var idCedula="cedulaResponsable"+cont;
   var idNombre="nombreResponsable"+cont;
   var idApellido="apellidoResponsable"+cont;
   var idSexo="sexoResponsable"+cont;
   var idTelefono="telefonoResponsable"+cont;
   var idCargo="cargoResponsable"+cont;
   var idResponsable="idResponsable"+cont;
   var idTipoResponsable="tipoResponsable"+cont;
   var idDependenciaAdministrativa="dependenciaAdministrativa"+cont;
   var idResolucion="numeroResolucion"+cont;
   var idFechaResolucion="fechaResolucion"+cont;
   var idDecreto="numeroDecreto"+cont;
   var idFechaDecreto="fechaDecreto"+cont;

   var valorSexo=document.getElementById(idSexo).value;
   var valorCargo=document.getElementById(idCargo).value;
   var valorTipo=document.getElementById(idTipoResponsable).value;
   var valorDependencia=document.getElementById(idDependenciaAdministrativa).value;
   document.getElementById("txtCedulaResponsable").value=document.getElementById(idCedula).value;
   document.getElementById("txtNombreResponsable").value=document.getElementById(idNombre).value;
   document.getElementById("txtApellidoResponsable").value=document.getElementById(idApellido).value;
   document.getElementById("txtTelefonoResponsable").value=document.getElementById(idTelefono).value;
   document.getElementById("txtIdResponsable").value=document.getElementById(idResponsable).value;
   document.getElementById("txtNumeroResolucion").value=document.getElementById(idResolucion).value;
   document.getElementById("txtFechaResolucion").value=document.getElementById(idFechaResolucion).value;
   document.getElementById("txtNumeroDecreto").value=document.getElementById(idDecreto).value;
   document.getElementById("txtFechaDecreto").value=document.getElementById(idFechaDecreto).value;
   $("#txtSexoResponsable option[value="+ valorSexo +"]").attr("selected",true); 
   $("#txtCargoResponsable option[value="+ valorCargo +"]").attr("selected",true); 
   $("#txtTipoResponsable option[value="+ valorTipo +"]").attr("selected",true); 
   $("#txtDependenciaAdministrativa option[value="+ valorDependencia +"]").attr("selected",true); 
   
}

function transferirValoresB(cont){
   
   $("#divConsulta").hide();
   $("#divDatos").show();
   var idCedula="cedulaResponsableB"+cont;
   var idNombre="nombreResponsableB"+cont;
   var idApellido="apellidoResponsableB"+cont;
   var idSexo="sexoResponsableB"+cont;
   var idTelefono="telefonoResponsableB"+cont;
   var idCargo="cargoResponsableB"+cont;
   var idResponsable="idResponsableB"+cont;
   var idTipoResponsable="tipoResponsableB"+cont;
   var idDependenciaAdministrativa="dependenciaAdministrativaB"+cont;
   var idResolucion="numeroResolucionB"+cont;
   var idFechaResolucion="fechaResolucionB"+cont;
   var idDecreto="numeroResolucionB"+cont;
   var idFechaDecreto="fechaResolucionB"+cont;


   var valorSexo=document.getElementById(idSexo).value;
   var valorCargo=document.getElementById(idCargo).value;
   var valorDependencia=document.getElementById(idDependenciaAdministrativa).value;

   document.getElementById("txtCedulaResponsable").value=document.getElementById(idCedula).value;
   document.getElementById("txtNombreResponsable").value=document.getElementById(idNombre).value;
   document.getElementById("txtApellidoResponsable").value=document.getElementById(idApellido).value;
   document.getElementById("txtTelefonoResponsable").value=document.getElementById(idTelefono).value;
   document.getElementById("txtIdResponsable").value=document.getElementById(idResponsable).value;
   document.getElementById("txtNumeroResolucion").value=document.getElementById(idResolucion).value;
   document.getElementById("txtFechaResolucion").value=document.getElementById(idFechaResolucion).value;
   document.getElementById("txtNumeroDecreto").value=document.getElementById(idDecreto).value;
   document.getElementById("txtFechaDecreto").value=document.getElementById(idFechaDecreto).value;
   $("#txtSexoResponsable option[value="+ valorSexo +"]").attr("selected",true); 
   $("#txtCargoResponsable option[value="+ valorCargo +"]").attr("selected",true); 
   $("#txtTipoResponsable option[value="+ valorTipo +"]").attr("selected",true); 
   $("#txtDependenciaAdministrativa option[value="+ valorDependencia +"]").attr("selected",true);    
}

function atras(){
   $("#txtNombreResponsable").val("");
	$("#divDatos").hide();
   $("#divConsulta").show();

}