function todos2(){

var input1=document.getElementById('checkTodoFecha').checked;
if(input1==true){

var elementos=document.getElementById('formulario1').elements;
var	largo=document.getElementById('formulario1').length;
	var count=0;
	for(var i=0; i < largo; i++){
		if(elementos[i].type=="checkbox" && elementos[i].checked==0 && elementos[i].name=='check[]'){
			elementos[i].checked=1;
		}

}


}
else{


var elementos=document.getElementById('formulario1').elements;
var	largo=document.getElementById('formulario1').length;
	var count=0;
	for(var i=0; i < largo; i++){
		if(elementos[i].type=="checkbox" && elementos[i].checked==1 && elementos[i].name=='check[]'){
			elementos[i].checked=0;
		}

}



}


}

function todoslista(){

var input=document.getElementById('checkTodoLista').checked;
if(input==true){

var elementos=document.getElementById('formulario1').elements;
var	largo=document.getElementById('formulario1').length;
	var count=0;
	for(var i=0; i < largo; i++){
		if(elementos[i].type=="checkbox" && elementos[i].checked==0 && elementos[i].name=='checklista[]'){
			elementos[i].checked=1;
		}

}


}else {
	
var elementos=document.getElementById('formulario1').elements;
var	largo=document.getElementById('formulario1').length;
	var count=0;
	for(var i=0; i < largo; i++){
		if(elementos[i].type=="checkbox" && elementos[i].checked==1 && elementos[i].name=='checklista[]'){
			elementos[i].checked=0;
		}

}
}



}

function disablelabel(){


var elementos=document.getElementsByName('check[]');
var largo=elementos.length;


for(i=0;i<largo;i++){
var el=elementos[i];
el.removeAttribute('disabled');
}



var elementos=document.getElementsByName('checklista[]');
var largo=elementos.length;


for(i=0;i<largo;i++){
var el=elementos[i];
el.setAttribute('disabled', "disabled");
}

var check=document.getElementById('checkTodoLista');
check.checked= false;
check.disabled= true;
todoslista();


var check=document.getElementById('checkTodoFecha');
check.disabled= false;
document.getElementById('labelEstatus').style.color="#BBBBBB";
document.getElementById('labelValor').style.color="#BBBBBB";
document.getElementById('labelSerial').style.color="#BBBBBB";
document.getElementById('labelMarca').style.color="#BBBBBB";
document.getElementById('labelModelo').style.color="#BBBBBB";
document.getElementById('labelColor').style.color="#BBBBBB";
document.getElementById('labelTodosLista').style.color="#BBBBBB";
document.getElementById('labelCategoria').style.color="#BBBBBB";
document.getElementById('labelSubcategoria').style.color="#BBBBBB";
document.getElementById('labelEspecifica').style.color="#BBBBBB";

document.getElementById('labelEstatus2').style.color="#000000";
document.getElementById('labelValor2').style.color="#000000";
document.getElementById('labelSerial2').style.color="#000000";
document.getElementById('labelMarca2').style.color="#000000";
document.getElementById('labelModelo2').style.color="#000000";
document.getElementById('labelColor2').style.color="#000000";
document.getElementById('labelTodosFecha').style.color="#000000";
document.getElementById('labelDesde').style.color="#000000";
document.getElementById('labelHasta').style.color="#000000";
document.getElementById('labelCategoria2').style.color="#000000";
document.getElementById('labelSubcategoria2').style.color="#000000";
document.getElementById('labelEspecifica2').style.color="#000000";
document.getElementById('inputDesde').removeAttribute('disabled');
document.getElementById('inputHasta').removeAttribute('disabled');

}

function disablelabel2(){


var elementos=document.getElementsByName('checklista[]');
var largo=elementos.length;


for(i=0;i<largo;i++){
var el=elementos[i];
el.removeAttribute('disabled');
}





var elementos=document.getElementsByName('check[]');
var largo=elementos.length;


for(i=0;i<largo;i++){
var el=elementos[i];
el.setAttribute('disabled', "disabled");
}


var check=document.getElementById('checkTodoFecha');
check.disabled= true;
check.checked= false;
todos2();


var check=document.getElementById('checkTodoLista');
check.disabled= false;

document.getElementById('labelEstatus').style.color="#000000";
document.getElementById('labelValor').style.color="#000000";
document.getElementById('labelSerial').style.color="#000000";
document.getElementById('labelMarca').style.color="#000000";
document.getElementById('labelModelo').style.color="#000000";
document.getElementById('labelColor').style.color="#000000";
document.getElementById('labelTodosLista').style.color="#000000";
document.getElementById('labelCategoria').style.color="#000000";
document.getElementById('labelSubcategoria').style.color="#000000";
document.getElementById('labelEspecifica').style.color="#000000";


document.getElementById('labelEstatus2').style.color="#BBBBBB";
document.getElementById('labelValor2').style.color="#BBBBBB";
document.getElementById('labelSerial2').style.color="#BBBBBB";
document.getElementById('labelMarca2').style.color="#BBBBBB";
document.getElementById('labelModelo2').style.color="#BBBBBB";
document.getElementById('labelColor2').style.color="#BBBBBB";
document.getElementById('labelTodosFecha').style.color="#BBBBBB";
document.getElementById('labelDesde').style.color="#BBBBBB";
document.getElementById('labelHasta').style.color="#BBBBBB";
document.getElementById('labelCategoria2').style.color="#BBBBBB";
document.getElementById('labelSubcategoria2').style.color="#BBBBBB";
document.getElementById('labelEspecifica2').style.color="#BBBBBB";

document.getElementById('inputDesde').setAttribute('disabled', "disabled");
document.getElementById('inputHasta').setAttribute('disabled', "disabled");
}