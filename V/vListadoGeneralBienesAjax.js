  
function consultar(){
   if(document.getElementById('nombreBien').value!=""){
      $.ajax
      ({
         type: "POST",url:"../C/cConsultarGeneralBienes.php",
         data:"nombreBien="+document.getElementById('nombreBien').value,
         dataType : 'json',
         success:function(msg)         
         {
            if(msg.length <=0){         
               var campo;
               
               campo="No existen bienes registrados con el nombre de "+document.getElementById('nombreBien').value;
               $("#tablaResultados").html(campo);
               $("#tablaResultados1").hide();

            }else
            $("#tablaResultados1").hide();
            
            var respuesta='<tr><th>Resultado Nº</th><th>Bienes Registrados</th><th>ID del Bien</th><th>Serial</th><th>Estatus del Bien</th></tr>';
            var contador=-1;
            var contador1=0;
            $(msg).each(function(index, value)
            {
               contador++;
               contador1++;

               respuesta+='<tr>';
               respuesta+=contador;
               respuesta+='<td>';
               respuesta+=contador1;
               respuesta+='</td><td>';
               respuesta+=msg[index]["nombre_bien"];
               respuesta+='</td>';                 
               respuesta+='<td>';
               respuesta+=msg[index]["id_bien"];
               respuesta+='</td>'; 
               respuesta+='<td>'; 
               respuesta+=msg[index]["serial_bien"];
               respuesta+='</td>';     
               respuesta+='<td>'; 
               respuesta+=msg[index]["nombre_concepto"];
               respuesta+='</td>';             
               respuesta+='</tr>';             
               $("#tablaResultados").html(respuesta);
            })
         },
         error: function(xhr, status, error) {
          alert("Error de AJAX2");
          }
      }
      )

   }else{
   $("#tablaResultados").html("");
   $("#tablaResultados1").show();
}
}
