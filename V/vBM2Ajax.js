
function cargar(){
   $("#divDatos").hide();
   $("#divDatos1").hide();
   $("#divDatos2").hide();
   $("#divDatos3").hide();
   $("#divDatos4").hide();

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
    var input = document.createElement("input");
    var text = document.createTextNode("Serial del Bien Nº " + i + ": ");
    input.setAttribute("name", "serialBien[]");
    input.setAttribute("type", "text");
    input.setAttribute("required", "required");
    input.className = "text";    
    div.appendChild(salto);
    salto.appendChild(salto2);
    salto2.appendChild(text);
    salto2.appendChild(input);

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
        $("#idSubgrupo").html(vaciar); 
}

}


function consultar(){
   if(document.getElementById('nombreBien').value!=""){
      $.ajax
      ({
         type: "POST",url:"../C/cConsultarBienSinIncorporar.php",
         data:"nombreBien="+document.getElementById('nombreBien').value,
         dataType : 'json',
         success:function(msg)         
         {
            if(msg.length <=0){         
               var campo;
               
               campo="No hay bienes incorporables con el nombre de "+document.getElementById('nombreBien').value;
               $("#tablaResultados").html(campo);
               $("#tablaResultados1").hide();

            }else
            $("#tablaResultados1").hide();
            
            var respuesta='<tr><th>Resultado Nº</th><th>Bienes Registrados</th><th>Serial</th><th>ID del Bien</th></tr>';
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
               respuesta+="descripcionBienB"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["descripcion_bien"];
               respuesta+="\'"+">";
               respuesta+='</td>';                 
               respuesta+='<td>';
               respuesta+=msg[index]["serial_bien"];
               respuesta+='</td>';                 
               respuesta+='<td>';
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

function consultar1(){
   if(document.getElementById('nombreBien1').value!=""){
      $.ajax
      ({
         type: "POST",url:"../C/cConsultarBienIncorporado.php",
         data:"nombreBien="+document.getElementById('nombreBien1').value,
         dataType : 'json',
         success:function(msg)         
         {
            if(msg.length <=0){         
               var campo;
               
               campo="No existen bienes registrados con el nombe de "+document.getElementById('nombreBien1').value;
               $("#tablaResultados3").html(campo);
               $("#tablaResultados4").hide();

            }else
            $("#tablaResultados4").hide();
            
            var respuesta='<tr><th>Resultado Nº</th><th>Bienes Registrados</th><th>Serial</th><th>Sección</th><th>ID del Bien</th></tr>';
            var contador=-1;
            var contador1=0;
            $(msg).each(function(index, value)
            {
               contador++;
               contador1++;

               respuesta+='<tr onclick=transferirValoresD(';
               respuesta+=contador;
               respuesta+=')><td>';
               respuesta+=contador1;
               respuesta+='</td><td>';
               respuesta+=msg[index]["nombre_bien"];
               respuesta+='<input type="hidden" id=';
               respuesta+="nombreBienD"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["nombre_bien"];
               respuesta+="\'"+">";
               respuesta+='<input type="hidden" id=';
               respuesta+="idBienD"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["id_bien"];
               respuesta+="\'"+">";
               respuesta+='<input type="hidden" id=';
               respuesta+="serialBienD"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["serial_bien"];
               respuesta+="\'"+">";
               respuesta+='<input type="hidden" id=';
               respuesta+="imgBienD"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["ruta_imagen"];
               respuesta+="\'"+">";
               respuesta+='<input type="hidden" id=';
               respuesta+="descripcionBienD"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["descripcion_bien"];
               respuesta+="\'"+">";
               respuesta+='</td>';                 
               respuesta+='<td>';
               respuesta+=msg[index]["serial_bien"];
               respuesta+='</td>';                 
               respuesta+='<td>';
               respuesta+=msg[index]["nombre_seccion"];
               respuesta+='</td>';
               respuesta+='<td>';
               respuesta+=msg[index]["id_bien"];
               respuesta+='</td>';                   

               respuesta+='</tr>';             
               $("#tablaResultados3").html(respuesta);
            })
         },
         error: function(xhr, status, error) {
          alert("Error de AJAX2");
          }
      }
      )

   }else{
   $("#tablaResultados3").html("");
   $("#tablaResultados4").show();
}
}
function consultar4(){
   if(document.getElementById('nombreBien4').value!=""){
      $.ajax
      ({
         type: "POST",url:"../C/cConsultarBienIncorporado.php",
         data:"nombreBien="+document.getElementById('nombreBien4').value,
         dataType : 'json',
         success:function(msg)         
         {
            if(msg.length <=0){         
               var campo;
               
               campo="No existen bienes registrados con el nombe de "+document.getElementById('nombreBien4').value;
               $("#tablaResultados9").html(campo);
               $("#tablaResultados10").hide();

            }else
            $("#tablaResultados10").hide();
            
            var respuesta='<tr><th>Resultado Nº</th><th>Bienes Registrados</th><th>Serial</th><th>Sección</th><th>ID del Bien</th></tr>';
            var contador=-1;
            var contador1=0;
            $(msg).each(function(index, value)
            {
               contador++;
               contador1++;

               respuesta+='<tr onclick=transferirValoresJ(';
               respuesta+=contador;
               respuesta+=')><td>';
               respuesta+=contador1;
               respuesta+='</td><td>';
               respuesta+=msg[index]["nombre_bien"];
               respuesta+='<input type="hidden" id=';
               respuesta+="nombreBienJ"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["nombre_bien"];
               respuesta+="\'"+">";
               respuesta+='<input type="hidden" id=';
               respuesta+="idBienJ"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["id_bien"];
               respuesta+="\'"+">";
               respuesta+='<input type="hidden" id=';
               respuesta+="serialBienJ"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["serial_bien"];
               respuesta+="\'"+">";
               respuesta+='<input type="hidden" id=';
               respuesta+="imgBienJ"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["ruta_imagen"];
               respuesta+="\'"+">";
               respuesta+='<input type="hidden" id=';
               respuesta+="descripcionBienJ"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["descripcion_bien"];
               respuesta+="\'"+">";
               respuesta+='</td>';                 
               respuesta+='<td>';
               respuesta+=msg[index]["serial_bien"];
               respuesta+='</td>';                 
               respuesta+='<td>';
               respuesta+=msg[index]["nombre_seccion"];
               respuesta+='</td>';
               respuesta+='<td>';
               respuesta+=msg[index]["id_bien"];
               respuesta+='</td>';                   

               respuesta+='</tr>';             
               $("#tablaResultados9").html(respuesta);
            })
         },
         error: function(xhr, status, error) {
          alert("Error de AJAX2");
          }
      }
      )

   }else{
   $("#tablaResultados9").html("");
   $("#tablaResultados10").show();
}
}

function consultar2(){
   if(document.getElementById('nombreBien2').value!=""){
      $.ajax
      ({
         type: "POST",url:"../C/cConsultarBienIncorporado.php",
         data:"nombreBien="+document.getElementById('nombreBien2').value,
         dataType : 'json',
         success:function(msg)         
         {
            if(msg.length <=0){         
               var campo;
               
               campo="No existen bienes registrados con el nombre de "+document.getElementById('nombreBien2').value;
               $("#tablaResultados5").html(campo);
               $("#tablaResultados6").hide();

            }else
            $("#tablaResultados6").hide();
            
            var respuesta='<tr><th>Resultado Nº</th><th>Bienes Registrados</th><th>Serial</th><th>Sección</th><th>ID del Bien</th></tr>';
            var contador=-1;
            var contador1=0;
            $(msg).each(function(index, value)
            {
               contador++;
               contador1++;

               respuesta+='<tr onclick=transferirValoresF(';
               respuesta+=contador;
               respuesta+=')><td>';
               respuesta+=contador1;
               respuesta+='</td><td>';
               respuesta+=msg[index]["nombre_bien"];
               respuesta+='<input type="hidden" id=';
               respuesta+="nombreBienF"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["nombre_bien"];
               respuesta+="\'"+">";
               respuesta+='<input type="hidden" id=';
               respuesta+="idBienF"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["id_bien"];
               respuesta+="\'"+">";
               respuesta+='<input type="hidden" id=';
               respuesta+="serialBienF"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["serial_bien"];
               respuesta+="\'"+">";
               respuesta+='<input type="hidden" id=';
               respuesta+="seccionBienF"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["id_seccion"];
               respuesta+="\'"+">";
               respuesta+='<input type="hidden" id=';
               respuesta+="imgBienF"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["ruta_imagen"];
               respuesta+="\'"+">";
               respuesta+='<input type="hidden" id=';
               respuesta+="descripcionBienF"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["descripcion_bien"];
               respuesta+="\'"+">";
               respuesta+='</td>';                 
               respuesta+='<td>';
               respuesta+=msg[index]["serial_bien"];
               respuesta+='</td>';                 
               respuesta+='<td>';
               respuesta+=msg[index]["nombre_seccion"];
               respuesta+='</td>';
              respuesta+='<td>';
               respuesta+=msg[index]["id_bien"];
               respuesta+='</td>';


               respuesta+='</tr>';             
               $("#tablaResultados5").html(respuesta);
            })
         },
         error: function(xhr, status, error) {
          alert("Error de AJAX3");
          }
      }
      )

   }else{
   $("#tablaResultados5").html("");
   $("#tablaResultados6").show();
}
}

function consultar3(){
   if(document.getElementById('nombreBien3').value!=""){
      $.ajax
      ({
         type: "POST",url:"../C/cConsultarBienIncorporado.php",
         data:"nombreBien="+document.getElementById('nombreBien3').value,
         dataType : 'json',
         success:function(msg)         
         {
            if(msg.length <=0){         
               var campo;
               
               campo="No existen bienes incorporados con el nombre de "+document.getElementById('nombreBien3').value;
               $("#tablaResultados7").html(campo);
               $("#tablaResultados8").hide();

            }else
            $("#tablaResultados8").hide();
            
            var respuesta='<tr><th>Resultado Nº</th><th>Bienes Registrados</th><th>Serial</th><th>Sección</th><th>ID del Bien</th></tr>';
            var contador=-1;
            var contador1=0;
            $(msg).each(function(index, value)
            {
               contador++;
               contador1++;

               respuesta+='<tr onclick=transferirValoresH(';
               respuesta+=contador;
               respuesta+=')><td>';
               respuesta+=contador1;
               respuesta+='</td><td>';
               respuesta+=msg[index]["nombre_bien"];
               respuesta+='<input type="hidden" id=';
               respuesta+="nombreBienH"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["nombre_bien"];
               respuesta+="\'"+">";
               respuesta+='<input type="hidden" id=';
               respuesta+="idBienH"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["id_bien"];
               respuesta+="\'"+">";
               respuesta+='<input type="hidden" id=';
               respuesta+="serialBienH"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["serial_bien"];
               respuesta+="\'"+">";
               respuesta+='<input type="hidden" id=';
               respuesta+="seccionBienH"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["id_seccion"];
               respuesta+="\'"+">";
               respuesta+='<input type="hidden" id=';
               respuesta+="imgBienH"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["ruta_imagen"];
               respuesta+="\'"+">";
               respuesta+='<input type="hidden" id=';
               respuesta+="descripcionBienH"+contador;
               respuesta+=" ";
               respuesta+="value="
               respuesta+="\'";
               respuesta+=msg[index]["descripcion_bien"];
               respuesta+="\'"+">";
               respuesta+='</td>';                 
               respuesta+='<td>';
               respuesta+=msg[index]["serial_bien"];
               respuesta+='</td>';  
               respuesta+='<td>';  
               respuesta+=msg[index]["nombre_seccion"];
               respuesta+='</td>';
               respuesta+='<td>';  
               respuesta+=msg[index]["id_bien"];
               respuesta+='</td>';                  
                    

               respuesta+='</tr>';             
               $("#tablaResultados7").html(respuesta);
            })
         },
         error: function(xhr, status, error) {
          alert("Error de AJAX4");
          }
      }
      )

   }else{
   $("#tablaResultados7").html("");
   $("#tablaResultados8").show();
}
}

function transferirValores(cont){
   var idNombre="nombreBien"+cont;
   var idId="idBien"+cont;
   var idSerial="serialBien"+cont;
   var idImg="imgBien"+cont;
   var idDescripcion="descripcionBien"+cont;
   document.getElementById("txtNombreBien").value=document.getElementById(idNombre).value;
   document.getElementById("txtIdBien").value=document.getElementById(idId).value;
   document.getElementById("txtSerialBien").value=document.getElementById(idSerial).value;
   document.getElementById("txtDescripcionBien").value=document.getElementById(idDescripcion).value;
   document.getElementById("imgBien").src=document.getElementById(idImg).value;

   //document.getElementById("pdfBien2").innerHTML=document.getElementById(idPdf).value;
   $("#divConsulta").hide();
   $("#divDatos").show();
}
function transferirValoresB(cont){
   var idNombre="nombreBienB"+cont;
   var idId="idBienB"+cont;
   var idSerial="serialBienB"+cont;
   var idImg="imgBienB"+cont;
   var idDescripcion="descripcionBienB"+cont;
   document.getElementById("txtNombreBien").value=document.getElementById(idNombre).value;
   document.getElementById("txtIdBien").value=document.getElementById(idId).value;
   document.getElementById("txtSerialBien").value=document.getElementById(idSerial).value;
   document.getElementById("txtDescripcionBien").value=document.getElementById(idDescripcion).value;
   document.getElementById("imgBien").src=document.getElementById(idImg).value;

   //document.getElementById("pdfBien2").innerHTML=document.getElementById(idPdf).value;
   $("#divConsulta").hide();
   $("#divDatos").show();
}


function transferirValoresC(cont){
   var idNombre="nombreBienC"+cont;
   var idId="idBienC"+cont;
   var idSerial="serialBienC"+cont;
   var idImg="imgBienC"+cont;
   var idDescripcion="descripcionBienC"+cont;
   document.getElementById("txtNombreBien1").value=document.getElementById(idNombre).value;
   document.getElementById("txtIdBien1").value=document.getElementById(idId).value;
   document.getElementById("txtSerialBien1").value=document.getElementById(idSerial).value;
   document.getElementById("txtDescripcionBien1").value=document.getElementById(idDescripcion).value;
   document.getElementById("imgBien1").src=document.getElementById(idImg).value;

   //document.getElementById("pdfBien2").innerHTML=document.getElementById(idPdf).value;
   $("#divConsulta1").hide();
   $("#divDatos1").show();
}
function transferirValoresD(cont){
   var idNombre="nombreBienD"+cont;
   var idId="idBienD"+cont;
   var idSerial="serialBienD"+cont;
   var idImg="imgBienD"+cont;
   var idDescripcion="descripcionBienD"+cont;
   document.getElementById("txtNombreBien1").value=document.getElementById(idNombre).value;
   document.getElementById("txtIdBien1").value=document.getElementById(idId).value;
   document.getElementById("txtSerialBien1").value=document.getElementById(idSerial).value;
   document.getElementById("txtDescripcionBien1").value=document.getElementById(idDescripcion).value;
   document.getElementById("imgBien1").src=document.getElementById(idImg).value;

   //document.getElementById("pdfBien2").innerHTML=document.getElementById(idPdf).value;
   $("#divConsulta1").hide();
   $("#divDatos1").show();
}


function transferirValoresE(cont){
   var idNombre="nombreBienE"+cont;
   var idId="idBienE"+cont;
   var idSerial="serialBienE"+cont;
   var idSeccion="seccionBienE"+cont;
   var idImg="imgBienE"+cont;
   var idDescripcion="descripcionBienE"+cont;
   document.getElementById("txtNombreBien2").value=document.getElementById(idNombre).value;
   document.getElementById("txtIdBien2").value=document.getElementById(idId).value;
   document.getElementById("txtSerialBien2").value=document.getElementById(idSerial).value;
   document.getElementById("txtDescripcionBien2").value=document.getElementById(idDescripcion).value;
   document.getElementById("imgBien2").src=document.getElementById(idImg).value;
   
   var valorSeccion=document.getElementById(idSeccion).value;
$("#seccionPerteneciente option[value="+valorSeccion+"]").attr("selected",true);


   //document.getElementById("pdfBien2").innerHTML=document.getElementById(idPdf).value;
   $("#divConsulta2").hide();
   $("#divDatos2").show();
}
function transferirValoresF(cont){
   var idNombre="nombreBienF"+cont;
   var idId="idBienF"+cont;
   var idSerial="serialBienF"+cont;
   var idSeccion="seccionBienF"+cont;
   var idImg="imgBienF"+cont;
   var idDescripcion="descripcionBienF"+cont;
   document.getElementById("txtNombreBien2").value=document.getElementById(idNombre).value;
   document.getElementById("txtIdBien2").value=document.getElementById(idId).value;
   document.getElementById("txtSerialBien2").value=document.getElementById(idSerial).value;
   document.getElementById("imgBien2").src=document.getElementById(idImg).value;
   document.getElementById("txtDescripcionBien2").value=document.getElementById(idDescripcion).value;

   //document.getElementById("pdfBien2").innerHTML=document.getElementById(idPdf).value;

   var valorSeccion=document.getElementById(idSeccion).value;
$("#seccionPerteneciente option[value="+valorSeccion+"]").attr("selected",true);

   $("#divConsulta2").hide();
   $("#divDatos2").show();
}

function transferirValoresG(cont){
   var idNombre="nombreBienG"+cont;
   var idId="idBienG"+cont;
   var idSerial="serialBienG"+cont;
   var idImg="imgBienG"+cont;
   var idDescripcion="descripcionBienG"+cont;
   document.getElementById("txtNombreBien3").value=document.getElementById(idNombre).value;
   document.getElementById("txtIdBien3").value=document.getElementById(idId).value;
   document.getElementById("txtSerialBien3").value=document.getElementById(idSerial).value;
   document.getElementById("imgBien3").src=document.getElementById(idImg).value;
   document.getElementById("txtDescripcionBien3").value=document.getElementById(idDescripcion).value;

   //document.getElementById("pdfBien2").innerHTML=document.getElementById(idPdf).value;

   $("#divConsulta3").hide();
   $("#divDatos3").show();
}

function transferirValoresH(cont){
   var idNombre="nombreBienH"+cont;
   var idId="idBienH"+cont;
   var idSerial="serialBienH"+cont;
   var idImg="imgBienH"+cont;
   var idDescripcion="descripcionBienH"+cont;
   document.getElementById("txtNombreBien3").value=document.getElementById(idNombre).value;
   document.getElementById("txtIdBien3").value=document.getElementById(idId).value;
   document.getElementById("txtSerialBien3").value=document.getElementById(idSerial).value;
   document.getElementById("imgBien3").src=document.getElementById(idImg).value;
   document.getElementById("txtDescripcionBien3").value=document.getElementById(idDescripcion).value;

   //document.getElementById("pdfBien2").innerHTML=document.getElementById(idPdf).value;

   $("#divConsulta3").hide();
   $("#divDatos3").show();
}

function transferirValoresI(cont){
   var idNombre="nombreBienI"+cont;
   var idId="idBienI"+cont;
   var idSerial="serialBienI"+cont;
   var idImg="imgBienI"+cont;
   var idDescripcion="descripcionBienI"+cont;
   document.getElementById("txtNombreBien4").value=document.getElementById(idNombre).value;
   document.getElementById("txtIdBien4").value=document.getElementById(idId).value;
   document.getElementById("txtSerialBien4").value=document.getElementById(idSerial).value;
   document.getElementById("imgBien4").src=document.getElementById(idImg).value;
   document.getElementById("txtDescripcionBien4").value=document.getElementById(idDescripcion).value;

   //document.getElementById("pdfBien2").innerHTML=document.getElementById(idPdf).value;

   $("#divConsulta4").hide();
   $("#divDatos4").show();
}

function transferirValoresJ(cont){
   var idNombre="nombreBienJ"+cont;
   var idId="idBienJ"+cont;
   var idSerial="serialBienJ"+cont;
   var idImg="imgBienJ"+cont;
   var idDescripcion="descripcionBienJ"+cont;
   document.getElementById("txtNombreBien4").value=document.getElementById(idNombre).value;
   document.getElementById("txtIdBien4").value=document.getElementById(idId).value;
   document.getElementById("txtSerialBien4").value=document.getElementById(idSerial).value;
   document.getElementById("imgBien4").src=document.getElementById(idImg).value;
   document.getElementById("txtDescripcionBien4").value=document.getElementById(idDescripcion).value;

   //document.getElementById("pdfBien2").innerHTML=document.getElementById(idPdf).value;

   $("#divConsulta4").hide();
   $("#divDatos4").show();
}

function atras(){
  $("#divDatos").hide();
   $("#divConsulta").show();

}
function atras1(){
  $("#divDatos1").hide();
   $("#divConsulta1").show();

}
function atras2(){
  $("#divDatos2").hide();
   $("#divConsulta2").show();

}
function atras3(){
  $("#divDatos3").hide();
   $("#divConsulta3").show();

}
function atras4(){
	$("#divDatos4").hide();
   $("#divConsulta4").show();

}