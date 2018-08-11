<?php 
$hostname = "localhost";
$username = "root";
$password = "root";
$database = "sist_almacen_by";

$conexion = new mysqli($hostname, $username, $password, $database);

if ($conexion->connect_errno){
	echo "Fallo la conexion". $conexion->connect_errno. " / ".$conexion->connect_error;
}
?>