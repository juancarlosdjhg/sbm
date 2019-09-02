
function llenarSelectSecciones(){
if(!document.getElementById('id_entidad').value==''){


      $.ajax
      ({


         type: "POST",url:"../C/cConsultarSecciones.php",
         data:"id_entidad="+document.getElementById('id_entidad').value,
         dataType : 'json',
         success:function(msg)
         {


            respuesta='';

         var respuesta="<option value=''>Seleccione</option>";
         var respuesta="<option value='todos'>Todos</option>";
            $(msg).each(function(index, value){

               respuesta+="<option value=";
               respuesta+=msg[index]["id_seccion"];
               respuesta+=">";
               respuesta+=msg[index]["nombre_seccion"];
               respuesta+="</option>";
                  

               $("#id_seccion").html(respuesta);
            })
         },
         error: function(xhr, status, error) {
          //alert("Error de AJAX");
          }
      }
      )

}else{  
               //$("#id_seccion").html('');
               alert("paso 2");
}
}
