
function consultar(){
   if(document.getElementById('nombreBien').value!=""){
      $.ajax
      ({
         type: "POST",url:"../C/cConsultarBienFlotante.php",
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
            
            var respuesta='<tr><th>Resultado Nº</th><th>Bienes Registrados</th><th>Serial</th><th>Código de Barras</th></tr>';
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
               respuesta+=msg[index]["nombre_bien"];
               respuesta+='<input type="hidden" id=';
               respuesta+="nombreBien2"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["nombre_bien"];
               respuesta+="\'"+">";
               respuesta+='<input type="hidden" id=';
               respuesta+="idBien2"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["id_bien"];
               respuesta+="\'"+">";
               respuesta+='<input type="hidden" id=';
               respuesta+="valorBien2"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["valor_bien"];
               respuesta+="\'"+">";
               respuesta+='<input type="hidden" id=';
               respuesta+="subgrupoBien2"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["id_subgrupo"];
               respuesta+="\'"+">";
               respuesta+='<input type="hidden" id=';
               respuesta+="grupoBien2"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["id_grupo"];
               respuesta+="\'"+">";
               respuesta+='<input type="hidden" id=';
               respuesta+="serialBien2"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["serial_bien"];
               respuesta+="\'"+">";
               respuesta+='<input type="hidden" id=';
               respuesta+="imgBien2"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["ruta_imagen"];
               respuesta+="\'"+">";
               respuesta+='<input type="hidden" id=';
               respuesta+="pdfBien2"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["ruta_pdf"];
               respuesta+="\'"+">";
               respuesta+='<input type="hidden" id=';
               respuesta+="descripcionBien2"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["descripcion_bien"];
               respuesta+="\'"+">";
               respuesta+='<input type="hidden" id=';
               respuesta+="fechaAdquisicionBien2"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["fecha_adquisicion_bien"];
               respuesta+="\'"+">";
               respuesta+='</td>';                 
               respuesta+='<td>';
               respuesta+=msg[index]["serial_bien"];
               respuesta+='</td>';             
               respuesta+='<td><a href="barcode/samplephp/sample-fpdf.php?var=';
               respuesta+=msg[index]["id_bien"];
               respuesta+='">';
               respuesta+=msg[index]["id_bien"];
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
