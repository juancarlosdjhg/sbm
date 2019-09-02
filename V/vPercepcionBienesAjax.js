
function cargar(){
   $("#divDatos").hide();


$(function (activar_pestanya) {
  // llamamos a la función y la nombramos
    var tabContainerssup = $('div.contenedor > div');
    // Convertimos una ruta en una variable, así la llamada a esa ruta será más fácil
 
        $('div.pestana a').click(function () {
    // ahora le estamos diciendo que active la siguiente 
    // función cada vez que clickamos dentro de los a situados dentro del div tab
 
    tabContainerssup.hide().filter(this.hash).show();
    // con la variable que hemos creado antes, le decimos que oculte todo su contenido, y que sólo muestre el contenido del anchor que hemos clickado
 
            return false;
    // ponemos esta linia para que no se nos desplace al hacer click arriba de la página
 
    }).filter(':first').click();
    // esta sentencia indica que lo primero que mostrará sera el primer anchor de la lista, si pusiéramos :last en vez de :first mostraría el último en un principio
  });


}

function crearCampos(cantidad){
    if(cantidad<500){
var div = document.getElementById("tablaSeriales");
while(div.firstChild)div.removeChild(div.firstChild); // remover elementos;
    for(var i = 1, cantidad = Number(cantidad); i <= cantidad; i++){
    var salto = document.createElement("tr");
    var salto2 = document.createElement("td");
    var salto3 = document.createElement("td");
    var input = document.createElement("input");
    var input2 = document.createElement("input");
    var text = document.createTextNode("Serial del Bien Nº " + i + ": ");
    var text2 = document.createTextNode("Descripcion Propia del Bien Nº " + i + ": ");
    input.setAttribute("name", "serialBien[]");
    input.setAttribute("type", "text");
    input.setAttribute("required", "required");
    input.className = "text";    

    input2.setAttribute("name", "descripcionPropiaBien[]");
    input2.setAttribute("type", "text");
    input2.setAttribute("required", "required");
    input2.className = "text";    
    div.appendChild(salto);    
    salto.appendChild(salto2);
    salto.appendChild(salto3);
    salto2.appendChild(text);
    salto2.appendChild(input);
    salto3.appendChild(text2);
    salto3.appendChild(input2);

//    div.appendChild(salto2);
    }
    }else
    alert("Cantidad no Soportada");
}


function llenarSelectSubgrupo(){

if(document.getElementById('idGrupo').value!=""){
  $.ajax
    ({

         type: "POST",url:"../C/cLlenarSelectSubgrupo.php",
         data:"idGrupo="+document.getElementById('idGrupo').value,
         dataType : 'json',
         success:function(msg) {

          var contenido='<option value="">Seleccione</option>';
            $(msg).each(function(index, value)
            {
              contenido+="<option value=";
              contenido+=msg[index]["id_subgrupo"];
              contenido+=">";
              contenido+=msg[index]["nombre_subgrupo"];
              contenido+="</option>";                            
              $("#idSubgrupo").html(contenido);              
            })

         },
         error: function(xhr, status, error) {
          alert("Error de AJAX1");
          }


  })
}else{                   
    var vaciar="";
        $("#idSubgrupo").html(vaciar); 
}

}
function llenarSelectSubgrupo2(){

if(document.getElementById('id_grupo').value!=""){
  $.ajax
    ({

         type: "POST",url:"../C/cLlenarSelectSubgrupo.php",
         data:"idGrupo="+document.getElementById('id_grupo').value,
         dataType : 'json',
         success:function(msg) {

          var contenido='<option value="">Seleccione</option>';
            $(msg).each(function(index, value)
            {
              contenido+="<option value=";
              contenido+=msg[index]["id_subgrupo"];
              contenido+=">";
              contenido+=msg[index]["nombre_subgrupo"];
              contenido+="</option>";                            
              $("#id_subgrupo").html(contenido);              
            })

         },
         error: function(xhr, status, error) {
          alert("Error de AJAX1");
          }


  })
}else{                   
    var vaciar="";
        $("#id_subgrupo").html(vaciar); 
}

}

function llenarSelectSubcategoriaEspecifica(){
if(document.getElementById('idSubgrupo').value!=""){
  $.ajax
    ({

         type: "POST",url:"../C/cLlenarSelectSubcategoria.php",
         data:"idSubgrupo="+document.getElementById('idSubgrupo').value,
         dataType : 'json',
         success:function(msg) {

          var contenido='<option value="">Seleccione</option>';
            $(msg).each(function(index, value)
            {
              contenido+="<option value=";
              contenido+=msg[index]["id_sub_categoria_especifica"];
              contenido+=">";
              contenido+=msg[index]["nombre_sub_categoria_especifica"];
              contenido+="</option>";                            
              $("#idSubCategoriaEspecifica").html(contenido);              
            })

         },
         error: function(xhr, status, error) {
          alert("Error de AJAX1");
          }


  })
}else{                   
    var vaciar="";
        $("#idSubCategoriaEspecifica").html(vaciar); 
}

}



function llenarSelectSubcategoriaEspecifica2(){
if(document.getElementById('id_subgrupo').value!=""){
  $.ajax
    ({

         type: "POST",url:"../C/cLlenarSelectSubcategoria.php",
         data:"idSubgrupo="+document.getElementById('id_subgrupo').value,
         dataType : 'json',
         success:function(msg) {

          var contenido='<option value="">Seleccione</option>';
            $(msg).each(function(index, value)
            {
              contenido+="<option value=";
              contenido+=msg[index]["id_sub_categoria_especifica"];
              contenido+=">";
              contenido+=msg[index]["nombre_sub_categoria_especifica"];
              contenido+="</option>";                            
              $("#id_sub_categoria_especifica").html(contenido);              
            })

         },
         error: function(xhr, status, error) {
          alert("Error de AJAX1");
          }


  })
}else{                   
    var vaciar="";
        $("#id_sub_categoria_especifica").html(vaciar); 
}

}






function consultar(){
   if(document.getElementById('nombreBien2').value!=""){
      $.ajax
      ({
         type: "POST",url:"../C/cConsultarBien.php",
         data:"nombreBien="+document.getElementById('nombreBien2').value,
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
            
            var respuesta='<tr><th>Bienes Registrados</th><th>ID del Bien</th><th>Serial</th><th>Estatus del Bien</th><th>Fecha de Adquisición</th></tr>';
            var contador=-1;
            var contador1=0;
            $(msg).each(function(index, value)
            {
               contador++;
               contador1++;

               respuesta+='<tr onclick=transferirValoresB(';
               respuesta+=contador;
               respuesta+=')><td>';
               respuesta+=msg[index]["nombre_bien"];
               respuesta+='<input type="hidden" id=';
               respuesta+="nombreBienB"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["nombre_bien"];
               respuesta+="\'"+">";
               respuesta+='<input type="hidden" id=';
               respuesta+="idBienB"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["id_bien"];
               respuesta+="\'"+">";
               respuesta+='<input type="hidden" id=';
               respuesta+="valorBienB"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["valor_bien"];
               respuesta+="\'"+">";
               respuesta+='<input type="hidden" id=';
               respuesta+="marcaBienB"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["marca_bien"];
               respuesta+="\'"+">";
               respuesta+='<input type="hidden" id=';
               respuesta+="modeloBienB"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["modelo_bien"];
               respuesta+="\'"+">";
               respuesta+='<input type="hidden" id=';
               respuesta+="colorBienB"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["color_bien"];
               respuesta+="\'"+">";
               respuesta+='<input type="hidden" id=';
               respuesta+="subgrupoBienB"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["id_subgrupo"];
               respuesta+="\'"+">";
               respuesta+='<input type="hidden" id=';
               respuesta+="grupoBienB"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["id_grupo"];
               respuesta+="\'"+">";
               respuesta+='<input type="hidden" id=';
               respuesta+="proveedorBienB"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["id_proveedor"];
               respuesta+="\'"+">";
               respuesta+='<input type="hidden" id=';
               respuesta+="serialBienB"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["serial_bien"];
               respuesta+="\'"+">";
               respuesta+='<input type="hidden" id=';
               respuesta+="imgBienB"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["ruta_imagen"];
               respuesta+="\'"+">";
               respuesta+='<input type="hidden" id=';
               respuesta+="pdfBienB"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["ruta_pdf"];
               respuesta+="\'"+">";
               respuesta+='<input type="hidden" id=';
               respuesta+="descripcionBienB"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["descripcion_bien"];
               respuesta+="\'"+">";
               respuesta+='<input type="hidden" id=';
               respuesta+="descripcionBienPropiaB"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["descripcion_bien_individual"];
               respuesta+="\'"+">";
               respuesta+='<input type="hidden" id=';
               respuesta+="fechaAdquisicionBienB"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["fecha_adquisicion_bien"];
               respuesta+="\'"+">";
               respuesta+='</td>';                 
               respuesta+='<td>';
               respuesta+=msg[index]["id_bien"];
               respuesta+='</td>';                 
               respuesta+='<td>';
               respuesta+=msg[index]["serial_bien"];
               respuesta+='</td>';                 
               respuesta+='<td>';
               respuesta+=msg[index]["nombre_tipo_concepto"];
               respuesta+='</td>';                 
               respuesta+='<td>';
               respuesta+=msg[index]["fecha_adquisicion_bien"];
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

function transferirValores(cont){
   var idNombre="nombreBien"+cont;
   var idId="idBien"+cont;
   var idValor="valorBien"+cont;
   var idMarca="marcaBien"+cont;
   var idModelo="modeloBien"+cont;
   var idColor="colorBien"+cont;
   var idSubgrupo="subgrupoBien"+cont;
   var idGrupo="grupoBien"+cont;
   var idProveedor="proveedorBien"+cont;
   var idSerial="serialBien"+cont;
   var idImg="imgBien"+cont;
   var idPdf="pdfBien"+cont;
   var idDescripcion="descripcionBien"+cont;
   var idDescripcionPropia="descripcionBienPropia"+cont;
   var idFecha="fechaAdquisicionBien"+cont;
   document.getElementById("txtNombreBien").value=document.getElementById(idNombre).value;
   document.getElementById("txtIdBien").value=document.getElementById(idId).value;
   document.getElementById("txtNombreBienOriginal").value=document.getElementById(idNombre).value;
   document.getElementById("txtValorBien").value=document.getElementById(idValor).value;
   document.getElementById("txtMarcaBien").value=document.getElementById(idMarca).value;
   document.getElementById("txtModeloBien").value=document.getElementById(idModelo).value;
   document.getElementById("txtColorBien").value=document.getElementById(idColor).value;
   document.getElementById("txtSerialBien").value=document.getElementById(idSerial).value;
   document.getElementById("txtDescripcionBien").value=document.getElementById(idDescripcion).value;
   document.getElementById("txtDescripcionPropiaBien").value=document.getElementById(idDescripcionPropia).value;
   document.getElementById("txtFechaAdquisicion").value=document.getElementById(idFecha).value;
   document.getElementById("imgBien").src=document.getElementById(idImg).value;
   document.getElementById("pdfBien").href="download_file.php?file="+document.getElementById(idPdf).value;
   document.getElementById("pdfBien").innerHTML=document.getElementById(idPdf).value;
   document.getElementById("pdfEtiqueta").href="barcode/samplephp/sample-fpdf.php?var="+document.getElementById(idId).value;
   document.getElementById("pdfActaControl").href="ConsultaActa.php?idBien="+document.getElementById(idId).value;


   var valorProveedor=document.getElementById(idProveedor).value;
$("#id_proveedor option[value="+ valorProveedor +"]").attr("selected",true);

   var valorGrupo=document.getElementById(idGrupo).value;
$("#id_grupo option[value="+ valorGrupo +"]").attr("selected",true);

llenarSelectSubgrupo2();

   var valorSubgrupo=document.getElementById(idSubgrupo).value;
$("#id_subgrupo option[value="+ valorSubgrupo +"]").attr("selected",true);



   //document.getElementById("pdfBien2").innerHTML=document.getElementById(idPdf).value;
   $("#divConsulta").hide();
   $("#divDatos").show();
}
function transferirValoresB(cont){
   var idNombre="nombreBienB"+cont;
   var idId="idBienB"+cont;
   var idValor="valorBienB"+cont;
   var idMarca="marcaBienB"+cont;
   var idModelo="modeloBienB"+cont;
   var idColor="colorBienB"+cont;
   var idSubgrupo="subgrupoBienB"+cont;
   var idGrupo="grupoBienB"+cont;
   var idProveedor="proveedorBienB"+cont;
   var idSerial="serialBienB"+cont;
   var idImg="imgBienB"+cont;
   var idPdf="pdfBienB"+cont;
   var idDescripcion="descripcionBienB"+cont;
   var idDescripcionPropia="descripcionBienPropiaB"+cont;
   var idFecha="fechaAdquisicionBienB"+cont;
   document.getElementById("txtNombreBien").value=document.getElementById(idNombre).value;
   document.getElementById("txtIdBien").value=document.getElementById(idId).value;
   document.getElementById("txtNombreBienOriginal").value=document.getElementById(idNombre).value;
   document.getElementById("txtValorBien").value=document.getElementById(idValor).value;
   document.getElementById("txtMarcaBien").value=document.getElementById(idMarca).value;
   document.getElementById("txtModeloBien").value=document.getElementById(idModelo).value;
   document.getElementById("txtColorBien").value=document.getElementById(idColor).value;
   document.getElementById("txtSerialBien").value=document.getElementById(idSerial).value;
   document.getElementById("txtDescripcionBien").value=document.getElementById(idDescripcion).value;
   document.getElementById("txtDescripcionPropiaBien").value=document.getElementById(idDescripcionPropia).value;
   document.getElementById("txtFechaAdquisicion").value=document.getElementById(idFecha).value;
   document.getElementById("imgBien").src=document.getElementById(idImg).value;
   document.getElementById("pdfBien").href=document.getElementById(idPdf).value;
   document.getElementById("pdfBien").innerHTML="download_file.php?file="+document.getElementById(idPdf).value;

   var valorGrupo=document.getElementById(idGrupo).value;
   var valorSubgrupo=document.getElementById(idSubgrupo).value;
$("#id_grupo option[value="+ valorGrupo +"]").attr("selected",true);

   var valorProveedor=document.getElementById(idProveedor).value;
$("#id_proveedor option[value="+ valorProveedor +"]").attr("selected",true);

llenarSelectSubgrupo2();
$("#id_subgrupo option[value="+ valorSubgrupo +"]").attr("selected",true);
   //document.getElementById("pdfBien2").innerHTML=document.getElementById(idPdf).value;
   $("#divConsulta").hide();
   $("#divDatos").show();
}

function atras(){
   $("#txtNombreSubgrupo").val("");
	$("#divDatos").hide();
   $("#divConsulta").show();

}