<?php
include('../modelo/conexion.php');

if (isset($_GET['term'])) {
	$idempleado = $_GET['term'];
	$empleados = array();
	$consultEmpleado = "select * from empleado where idempleado like '%$idempleado%'";
	$resultEmpleado = $conexion->query($consultEmpleado);
	while ($linea = $resultEmpleado->fetch_array()) {
		$empleados[] = array('label' => $linea['idempleado']." - ".$linea['nombres'], 'value' => $linea['idempleado']);
	}
	echo json_encode($empleados);
}
?>