
function cargar(){
   $("#divDatos").hide();


}

function transferirValores(cont){
   var idNombreResponsable="nombreResponsable"+cont;
   var idNombreDepartamento="nombreDepartamento"+cont;

   var valorResponsable=document.getElementById(idNombreResponsable).value;
   var valorDepartamento=document.getElementById(idNombreDepartamento).value;


   document.getElementById("id_responsable_hidden").value=valorResponsable;


$("#id_responsable2 option[value="+ valorResponsable +"]").attr("selected",true);
$("#id_departamento2 option[value="+ valorDepartamento +"]").attr("selected",true);

   $("#divConsulta").hide();
   $("#divDatos").show();
}

function atras(){
   $("#txtNombreConcepto").val("");
	$("#divDatos").hide();
   $("#divConsulta").show();

}