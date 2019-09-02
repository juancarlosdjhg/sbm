<?php 
include("../M/mConexion2.php");
function menu(){


$cnx = new conexion2();
$cnx->conectar();


$gestionar_responsable='FALSE';
$gestionar_usuario='FALSE';
$gestionar_departamento='FALSE';
$gestionar_seccion='FALSE';
$gestionar_cargo='FALSE';
$gestionar_grupo='FALSE';
$gestionar_subgrupo='FALSE';
$gestionar_concepto='FALSE';
$gestionar_bd='FALSE';
$gestionar_subcategoriae='FALSE';
$gestionar_proveedores='FALSE';
$gestionar_percepcion='FALSE';
$bm1='FALSE';
$bm2='FALSE';
$bm3='FALSE';
$bm4='FALSE';
$reportes='FALSE';



$user=$_SESSION["nombreUsuario"];

$sqlConsultar="select * from usuario where usuario='".$user."'";	
	$resultados=pg_query($cnx->conx ,$sqlConsultar);
		while($row=pg_fetch_array($resultados)){	
	
				$id_usuario=$row["id_usuario"];	

														}

															

$sqlConsultar2="select * from usuario_funcion_sistema as ufs JOIN funciones_sistema as fs on fs.id_funcion_sistema=CAST(ufs.id_funcion_sistema AS INT) where id_usuario='".$id_usuario."'";	
	$resultados2=pg_query($cnx->conx ,$sqlConsultar2);
	$conf=0; $bms=0;
		while($row2=pg_fetch_array($resultados2)){	
	
				if($row2["nombre_funcion_sistema"]=="gestionar_responsable"){
					$gestionar_responsable='TRUE';	
					$conf=1;				
				}
				if($row2["nombre_funcion_sistema"]=="gestionar_usuario"){
					$gestionar_usuario='TRUE';
					$conf=1;
				}
				if($row2["nombre_funcion_sistema"]=="gestionar_departamento"){
					$gestionar_departamento='TRUE';
					$conf=1;
				}
				if($row2["nombre_funcion_sistema"]=="gestionar_seccion"){
					$gestionar_seccion='TRUE';
					$conf=1;
				}
				if($row2["nombre_funcion_sistema"]=="gestionar_cargo"){
					$gestionar_cargo='TRUE';
					$conf=1;
				}
				if($row2["nombre_funcion_sistema"]=="gestionar_grupo"){
					$gestionar_grupo='TRUE';
					$conf=1;
				}
				if($row2["nombre_funcion_sistema"]=="gestionar_subgrupo"){
					$gestionar_subgrupo='TRUE';
					$conf=1;
				}
				if($row2["nombre_funcion_sistema"]=="gestionar_concepto"){
					$gestionar_concepto='TRUE';
					$conf=1;
				}
				if($row2["nombre_funcion_sistema"]=="gestionar_bd"){
					$gestionar_bd='TRUE';

				}
				if($row2["nombre_funcion_sistema"]=="gestionar_subcategoriae"){
					$gestionar_subcategoriae='TRUE';
					$conf=1;
				}
				if($row2["nombre_funcion_sistema"]=="gestionar_proveedores"){
					$gestionar_proveedores='TRUE';
					$conf=1;
				}
				if($row2["nombre_funcion_sistema"]=="gestionar_percepcion"){
					$gestionar_percepcion='TRUE';
						$bms=1;
				}
				if($row2["nombre_funcion_sistema"]=="bm1"){
					$bm1='TRUE';
						$bms=1;
				}
				if($row2["nombre_funcion_sistema"]=="bm2"){
					$bm2='TRUE';
						$bms=1;
				}
				if($row2["nombre_funcion_sistema"]=="bm3"){
					$bm3='TRUE';
						$bms=1;
				}
				if($row2["nombre_funcion_sistema"]=="bm4"){
					$bm4='TRUE';
						$bms=1;
				}
				if($row2["nombre_funcion_sistema"]=="reportes"){
					$reportes='TRUE';
						$bms=1;
				}

														}





echo "<div class='cintillo'>";
echo "<script>setTimeout(function(){alert('Por motivos de seguridad, la sesión caducará dentro de 30 segundos.');},1000 * 600);</script>";
echo "<script>setTimeout(function(){alert('Esta sesión ha expirado.');window.location='../M/mLogout.php';},1030 * 600);</script>";
echo "<img src='images/banner.png'>";
echo "</div>";
echo "<div id='cssmenu'>";


echo "<ul>";

//Inicio

echo "<li class='active'><a href='vMenu.php'><span><i class='fa fa-home'></i>Inicio</span></a></li>";

//BM
if($bms>0){
echo "<li class='has-sub'><a href='#'><span><i class='fa fa-cubes'></i> BM</span></a>";
echo "<ul>";
if ($bm1=='TRUE')
echo "<li class='has-sub'><a href='vBM1.php'><span><i class='fa fa-file-text-o'></i> BM1</span></a></li>";
if ($bm2=='TRUE')
echo "<li class='has-sub'><a href='vBM2.php'><span><i class='fa fa-edit'></i> BM2</span></a></li>";
if ($bm3=='TRUE')
echo "<li class='has-sub'><a href='vBM2.php'><span><i class='fa fa-user-times'></i> BM3</span></a></li>";
if ($bm4=='TRUE')
echo "<li class='has-sub'><a href='vBM4v.php'><span><i class='fa fa-bank'></i> BM4 </span></a></li>";
echo "</ul>";
echo "</li>";


//Bienes Muebles

echo "<li class='has-sub'><a href='#'><span><i class='fa fa-cubes'></i> Bienes Muebles</span></a>";
echo "<ul>";		
if ($gestionar_percepcion=='TRUE'){
echo "<li class='has-sub'><a href='vPercepcionBienes.php'><span><i class='fa fa-cube'></i> Percepción de Bienes</span></a></li>";
echo "<li class='has-sub'><a href='vCodigoComponente.php'><span><i class='fa fa-cube'></i> Percepción de Componentes</span></a></li>";
echo "<li class='has-sub'><a href='vListadoBienesPendientes.php'><span><i class='fa fa-sort-amount-desc'></i> Bienes Pendientes por Revisión</span></a></li>";
echo "<li class='has-sub'><a href='vConsultarPorCodigo.php'><span><i class='fa fa-cube'></i>Consultar Bienes por Codigo</span></a></li>";}}


echo "</ul>";
echo "</li>"; ?>


<li class='right'><a href='../M/mLogout.php' onclick="alertify.alert('Gracias por usar el SBM');"><span>Usuario: <?php echo $_SESSION["nombreUsuario"]; ?>&nbsp;&nbsp;&nbsp;<i class='fa fa-sign-out'></i>Salir del Sistema</span></a></li>
<?php

//Configuracion
if($conf>0){
echo "<li class='has-sub'><a href='#'><span><i class='fa fa-cog'></i> Configuración</span></a>";
echo "<ul>";

if ($gestionar_responsable=='TRUE'){

	echo "<li class='has-sub'><a href='vResponsable.php'><span><i class='fa fa-briefcase'></i> Responsables</span></a></li>";
	echo "<li class='has-sub'><a href='vResponsableRevision.php'><span><i class='fa fa-briefcase'></i> Responsable de Revisión</span></a></li>";
}
if ($gestionar_proveedores=='TRUE')
	echo "<li class='has-sub'><a href='vProveedor.php'><span><i class='fa fa-truck'></i> Proveedores</span></a></li>";

if ($gestionar_usuario=='TRUE')
	echo "<li class='has-sub'><a href='vUsuario.php'><span><i class='fa fa-user'></i> Usuarios</span></a></li>";
if ($gestionar_departamento=='TRUE')
	echo "<li class='has-sub'><a href='vEntidad.php'><span><i class='fa fa-building'></i> Departamentos</span></a></li>";
if ($gestionar_seccion=='TRUE')
	echo "<li class='has-sub'><a href='vSeccion.php'><span><i class='fa fa-building'></i> Secciones</span></a></li>";
if ($gestionar_cargo=='TRUE')
	echo "<li class='has-sub'><a href='vCargo.php'><span><i class='fa fa-graduation-cap'></i> Cargos</span></a></li>";
if ($gestionar_grupo=='TRUE')
	echo "<li class='has-sub'><a href='vGrupo.php'><span><i class='fa fa-list-ul'></i> Categorías</span></a></li>";
if ($gestionar_subgrupo=='TRUE')
	echo "<li class='has-sub'><a href='vSubgrupo.php'><span><i class='fa fa-list'></i> Sub Categorías</span></a></li>";
if ($gestionar_subcategoriae=='TRUE')
	echo "<li class='has-sub'><a href='vSubCategoriaEspecifica.php'><span><i class='fa fa-list'></i> Sub Categoría Específica</span></a></li>";
if ($gestionar_concepto=='TRUE')	
	echo "<li class='has-sub'><a href='vConcepto.php'><span><i class='fa fa-refresh'></i> Conceptos</span></a></li>";
echo "</ul>";
echo "</li>";
}
//Base de Datos


if ($gestionar_bd=='TRUE'){
	echo "<li class='has-sub'><a href='#'><span><i class='fa fa-database'></i> Base de Datos</span></a>";
	echo "<ul>";
	echo "<li class='has-sub'><a href='vGestionBD.php'><span><i class='fa fa-database'></i> Gestión de la BD</span></a></li>";
	echo "<li class='has-sub'><a href='vBitacora.php'><span><i class='fa fa-database'></i> Bitacora</span></a></li>";
	echo "</ul>";
echo "</li>";
}


//Reportes


if ($reportes=='TRUE'){
echo "<li class='has-sub'><a href='#'><span><i class='fa fa-bar-chart'></i> Reportes</span></a>";
echo "<ul>";
echo "<li class='has-sub'><a href='#'><span><i class='fa fa-bar-chart'></i> Listados >> </span></a>
<ul>";
echo "<li class='has-sub'><a href='vListadoBienes.php'><span><i class='fa fa-sort-amount-desc'></i> Listado Completo de Bienes</span></a></li>";
echo "<li class='has-sub'><a href='vListadoBienesPendientes.php'><span><i class='fa fa-sort-amount-desc'></i> Listado de Bienes Pendientes por Revisión</span></a></li>";
echo "<li class='has-sub'><a href='vListadoBienesFlotantes.php'><span><i class='fa fa-sort-amount-desc'></i> Listado de Bienes Flotantes sin Incorporar</span></a></li>";
echo "<li class='has-sub'><a href='vListadoBienesIncorporados.php'><span><i class='fa fa-sort-amount-desc'></i> Listado de Bienes Incorporados</span></a></li>";
echo "<li class='has-sub'><a href='vListadoBienesDesincorporados.php'><span><i class='fa fa-sort-amount-desc'></i> Listado de Bienes Desincorporados</span></a></li>";
echo "<li class='has-sub'><a href='vListadoBienesComodato.php'><span><i class='fa fa-sort-amount-desc'></i> Listado de Bienes en Comodato</span></a></li>";
echo "<li class='has-sub'><a href='vListadoBienesFaltantes.php'><span><i class='fa fa-sort-amount-desc'></i> Listado de Bienes Faltantes por Investigar</span></a></li>";
echo "<li class='has-sub'><a href='vListadoBienesRechazados.php'><span><i class='fa fa-sort-amount-desc'></i> Listado de Bienes Rechazados por la Institución</span></a></li>";



echo "</ul>

</li>";
echo "<li class='has-sub'><a href='vReporteDinamico.php'><span><i class='fa fa-bar-chart'></i> Reporte Específico</span></a></li>";
echo "<li class='has-sub'><a href='vReportePorDepartamento.php'><span><i class='fa fa-bar-chart'></i> Reporte por Departamento/Sección</span></a></li>";
echo "<li class='has-sub'><a href='vListadoProveedores.php'><span><i class='fa fa-bar-chart'></i> Reporte de Bienes por proveedor</span></a></li>";
echo "<li class='has-sub'><a href='.php'><span><i class='fa fa-bar-chart'></i> Reporte de Estadísticas >></span></a>";
echo "<ul>";
echo "<li class='has-sub'><a href='ConsultaEstadisticas.php'><span><i class='fa fa-bar-chart'></i> Relación de Bienes por estatus</span></a></li>";
echo "<li class='has-sub'><a href='vGraficoDeEstadisticas.php'><span><i class='fa fa-bar-chart'></i> Relación del Inventario</span></a></li>";


echo "</ul> </li>";
echo "<li class='has-sub'><a href='vActa.php' ><span><i class='fa fa-bar-chart'></i>Generar Acta de Control Perceptivo</span></a></li>";
}
echo "</ul>";
echo "</li>";

//Acerca de

echo "<li><a href='vAcercaDe.php'><span><i class='fa fa-info-circle'></i> Acerca de</span></a></li>";

//Ayuda

echo "<li class='last'><a href='#'><span><i class='fa fa-question-circle'></i> Ayuda</span></a></li>";

echo "</ul>";
echo "</div>";
}
?>