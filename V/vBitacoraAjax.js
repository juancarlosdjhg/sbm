
function consultar(){
   if(document.getElementById('nombreUsuario').value!=""){
      $.ajax
      ({
         type: "POST",url:"../C/cConsultarBitacora.php",
         data:"nombreUsuario="+document.getElementById('nombreUsuario').value,
         dataType : 'json',
         success:function(msg)         
         {
            if(msg.length <=0){         
               var campo;
               
               campo="No existen usuarios registrados con el nombre de "+document.getElementById('nombreUsuario').value;
               $("#tablaResultados").html(campo);
               $("#tablaResultados1").hide();

            }else
            $("#tablaResultados1").hide();
            var respuesta='<tr><th>Usuario</th><th>Tabla Afectada</th><th>Acción Realizada</th><th>Fecha</th><th>Hora</th><th>Antiguo Valor</th><th>Nuevo Valor</th></tr>';
            var contador=-1;
            var contador1=0;
            $(msg).each(function(index, value)
            {
               contador++;
               contador1++;

               respuesta+='<tr>';
                  respuesta+='<td>';
                  respuesta+=msg[index]["usuario"];
                  respuesta+='</td>';
                  respuesta+='<td>';
                  respuesta+=msg[index]["nombre_tabla"];
                  respuesta+='</td>';
                  respuesta+='<td>';
                  respuesta+=msg[index]["tipo_operacion"];
                  respuesta+='</td>';
                  respuesta+='<td>';
                  respuesta+=msg[index]["fecha"];
                  respuesta+='</td>';
                  respuesta+='<td>';
                  respuesta+=msg[index]["hora"];
                  respuesta+='</td>';
                  respuesta+='<td>';
                  respuesta+=msg[index]["viejo_valor"];
                  respuesta+='</td>';
                  respuesta+='<td>';
                  respuesta+=msg[index]["nuevo_valor"];
                  respuesta+='</td>';
               respuesta+='</tr>';                 
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
   var idNombre="nombreBitacora"+cont;
   document.getElementById("txtNombreBitacora").value=document.getElementById(idNombre).value;
   document.getElementById("txtNombreBitacoraOriginal").value=document.getElementById(idNombre).value;
   $("#divConsulta").hide();
   $("#divDatos").show();
}
function transferirValores2(cont){
   var idNombre="nombreBitacora2"+cont;
   document.getElementById("txtNombreBitacora").value=document.getElementById(idNombre).value;
   document.getElementById("txtNombreBitacoraOriginal").value=document.getElementById(idNombre).value;
   $("#divConsulta").hide();
   $("#divDatos").show();
}

function atras(){
   $("#txtNombreBitacora").val("");
	$("#divDatos").hide();
   $("#divConsulta").show();

}