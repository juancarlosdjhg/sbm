<?php 

include("../M/mConexion.php");
include("temporal.php");

class proveedor{
		
		public $rif_tipo;
		public $rif_del_proveedor;
		public $sufijo_rif;
		public $codigo_del_proveedor;
		public $tipo_del_proveedor;
		public $descripcion_del_proveedor;
		public $otra_descripcion;
		public $id_proveedor;
		public $direccion;




		//$partes= explode('-', $rif);

		function registrar(){
		$cnx = new conexion();
		$cnx->conectar();

			$rif=$this->rif_tipo.'-'.$this->rif_del_proveedor.'-'.$this->sufijo_rif;

		$sqlConsultar="select * from proveedor where rif='$rif'";	



		$resultados=pg_query($cnx->conx ,$sqlConsultar);

				$num=pg_num_rows($resultados);
				if($num==0){

						$sqlRegistrar="insert into proveedor (rif,codigo_proveedor,tipo_proveedor,descripcion_proveedor,otra_descripcion) values ('$rif','$this->codigo_del_proveedor','$this->tipo_del_proveedor', '$this->descripcion_del_proveedor', '$this->otra_descripcion')";
						new temporal();	
						$resultados=pg_query($cnx->conx ,$sqlRegistrar);
						


						if(!$resultados){

							echo "<script>alert('Registro Fallido')</script>";
							echo "<meta http-equiv='refresh' content='0; url=../V/vProveedor.php'>";


						}
						else{

							echo "<script>alert('Registro Exitoso')</script>";
							echo "<meta http-equiv='refresh' content='0; url=../V/vProveedor.php'>";							


						}	



							}
					else{
							echo "<script>alert('RIF ya registrado')</script>";
							echo "<meta http-equiv='refresh' content='0; url=../V/vProveedor.php'>";



					}
									} //Fin Registrar();


//************************************************************************************************************

 function modificar(){
$cnx = new conexion();
$cnx->conectar();

$rif=$this->rif_tipo.'-'.$this->rif_del_proveedor.'-'.$this->sufijo_rif;

$sqlModificar="update proveedor set codigo_proveedor='$this->codigo_del_proveedor', rif='$rif', tipo_proveedor='$this->tipo_del_proveedor', descripcion_proveedor='$this->descripcion_del_proveedor', otra_descripcion='$this->otra_descripcion' WHERE id_proveedor='$this->id_proveedor'";
new temporal();
$resultados=pg_query($cnx->conx ,$sqlModificar);


if(!$resultados){

echo "<script>alert('Modificacion Fallida')</script>";
echo "<meta http-equiv='refresh' content='0; url=../V/vProveedor.php'>";


}
else{

echo "<script>alert('Modificacion Exitosa')</script>";
echo "<meta http-equiv='refresh' content='0; url=../V/vProveedor.php'>";
}



} //Fin Modificar();

//************************************************************************************************************

function eliminar(){
$cnx = new conexion();
$cnx->conectar();

$sqlEliminar="delete from proveedor where id_proveedor='".$this->id_proveedor."'";
new temporal();
$resultados=pg_query($cnx->conx ,$sqlEliminar);



if(!$resultados){

echo "<script>alert('Eliminacion Fallida')</script>";
echo "<meta http-equiv='refresh' content='0; url=../V/vProveedor.php'>";


}
else{

echo "<script>alert('Eliminacion Exitosa')</script>";
echo "<meta http-equiv='refresh' content='0; url=../V/vProveedor.php'>";


}



} //Fin Eliminar();

			



	}