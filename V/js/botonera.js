function enableBotonConsultar(){

	var btnConsultar = document.getElementById('btnConsultar');
	btnConsultar.disabled= false;

					}//Fin disableBotonConsultar();

function disableBotonConsultar(){

	var btnConsultar = document.getElementById('btnConsultar');
	btnConsultar.disabled= true;

					}//Fin disableBotonConsultar();

					
function enableBotonRegistrar(){

	var btnRegistrar = document.getElementById('btnRegistrar');
	btnRegistrar.disabled= false;

					}//Fin enableBotonRegistrar();
										
function disableBotonRegistrar(){

	var btnRegistrar = document.getElementById('btnRegistrar');
	btnRegistrar.disabled= true;

					}//Fin disableBotonRegistrar();
					
function enableBotonModificar(){

	var btnModificar = document.getElementById('btnModificar');
	btnModificar.disabled= false;

					}//Fin enableBotonModificar();
										
function disableBotonModificar(){

	var btnModificar = document.getElementById('btnModificar');
	btnModificar.disabled= true;

					}//Fin disableBotonModificar();
															
function enableBotonEliminar(){

	var btnEliminar = document.getElementById('btnEliminar');
	btnEliminar.disabled= false;

					}//Fin enbableBotonEliminar();
	
function disableBotonEliminar(){

	var btnEliminar = document.getElementById('btnEliminar');
	btnEliminar.disabled= true;

					}//Fin disableBotonEliminar();
					
function enableBotonCancelar(){
	var btnCancelar = document.getElementById('btnCancelar');
	btnCancelar.disabled= false;

					}//Fin enbableBotonEliminar();

					
function restablecerBotoneras(){
enableBotonConsultar();
disableBotonRegistrar();
disableBotonModificar();
disableBotonEliminar();

}					
function confirmar(texto){

	if(texto=='eliminar'){
	var valor=confirm('Desea eliminar este bien?')
		if(valor)
			return true;
		else 
			return false;
	}
	

	if(texto=='modificaruser'){
	var valor=confirm('Desea modificar este usuario?')
		if(valor)
			return true;
		else 
			return false;
	}
	

	if(texto=='eliminaruser'){
	var valor=confirm('Desea eliminar este usuario?')
		if(valor)
			return true;
		else 
			return false;
	}
	

	if(texto=='modificar'){
			if(validarVacios()){
				var valor=confirm('Desea modificar este bien?')
				if(valor)
					return true;
				else 
					return false;
			}else
				return false;

		}


		}




function activarBtnCancelar(){
	if(verificarCampo())
			document.getElementById("btnCancelar").disabled=false;
	else  	
			document.getElementById("btnCancelar").disabled=true;
}

function verificarCampo(){
	if(document.getElementById('txtCodigo').value=="")
		return false;
	else
		return true;

}

function validarVacios(){

	var elementos=document.getElementById('formulario').elements;
	largo=document.getElementById('formulario').length;
	var count=0;
	for(var i=0; i < largo; i++){
		if(elementos[i].type=="text" && elementos[i].value==""){
			count++;
		}else
			if(elementos[i].type=="select-one" && elementos[i].value=="Seleccione"){		
				count++;
			}else
				if(elementos[i].type=="date" && elementos[i].value==""){
					count++;					
				}else
					if(elementos[i].type=="textarea" && elementos[i].value==""){
						count++;						
					}

				}
	if(count==0){
		return true;		
		}else
			if(count>0){
		alert('Por favor, asegurese de rellenar todos los campos para continuar');
		return false;
	}
}


function activarCampos(){

	var elementos=document.getElementById('formulario').elements;
	largo=document.getElementById('formulario').length;
	var count=0;	
	for(var i=0; i < largo; i++){
		if(elementos[i].type!="submit"){
			if(elementos[i].id=="txtCodigo")
			elementos[i].disabled= true;
		else
			elementos[i].disabled= false;
		}
	}
}


function restablecerCampos(){
	
	var elementos=document.getElementById('formulario').elements;
	largo=document.getElementById('formulario').length;
	var count=0;	
	for(var i=0; i < largo; i++){
		if(elementos[i].type!="submit"){
			if(elementos[i].id=="txtCodigo")
			elementos[i].disabled= false;
		else
			elementos[i].disabled= true;
		}
	}

}


function validarEspacio(e, c){
	var campo=c.value;
    key = e.keyCode ? e.keyCode : e.which
	if(campo.charAt(0)==" " || campo==""){
	if (key == 32){
		c.value="";		
	consultar();
		return false;
	}	
	}else{

	consultar();
	return true;
	}

	consultar();
}