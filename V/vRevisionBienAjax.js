
function cargar(){
   $("#divDatos").hide();


}



function llenarSelectResponsables(){

if(document.getElementById('id_departamento').value!=""){
  $.ajax
    ({

         type: "POST",url:"../C/cLlenarSelectResponsable.php",
         data:"id_departamento="+document.getElementById('id_departamento').value,
         dataType : 'json',
         success:function(msg) {

          var contenido='<option value="">Seleccione</option>';
            $(msg).each(function(index, value)
            {
              contenido+="<option value=";
              contenido+=msg[index]["id_responsable"];
              contenido+=">";
              contenido+=msg[index]["nombre"];
              contenido+="</option>";                            
              $("#id_responsable").html(contenido);              
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

function atras(){
   $("#txtNombreConcepto").val("");
	$("#divDatos").hide();
   $("#divConsulta").show();

}