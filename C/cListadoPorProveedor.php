<?php
session_start();

$_SESSION['proveedorid']=$_POST['proveedor'];
$_SESSION['proveedordesde']=$_POST['desde'];
$_SESSION['proveedorhasta']=$_POST['hasta'];

echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../V/VListadoPorProveedor.php'>";
?>