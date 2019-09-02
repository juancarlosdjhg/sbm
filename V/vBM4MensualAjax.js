
function consultar2(){
if(!document.getElementById('id_anio').value==''){


      $.ajax
      ({


         type: "POST",url:"../C/cConsultarMes.php",
         data:"id_anio="+document.getElementById('id_anio').value,
         dataType : 'json',
         success:function(msg)
         {

            respuesta='';

         var d = new Date();
         var anio = d.getFullYear();
         var mes = d.getMonth()+1;
         var respuesta="<option value=''>Seleccione</option>";
            $(msg).each(function(index, value)
            {
               if(anio==document.getElementById('id_anio').value){
                  if(mes>=msg[index]["id_mes"]){

               respuesta+="<option value=";
               respuesta+=msg[index]["id_mes"];
               respuesta+=">";
               respuesta+=msg[index]["nombre_mes"];
               respuesta+="</option>";
                  }
               }else{

               respuesta+="<option value=";
               respuesta+=msg[index]["id_mes"];
               respuesta+=">";
               respuesta+=msg[index]["nombre_mes"];
               respuesta+="</option>";
               }
                 
               $("#id_mes").html(respuesta);
            })
         },
         error: function(xhr, status, error) {
          alert("Error de AJAX");
          }
      }
      )

}else{  
               $("#id_mes").html('');
}
}
