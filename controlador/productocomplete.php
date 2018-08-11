<?php
include('../modelo/conexion.php');

if (isset($_GET['term'])) {
	$codigopelicula = $_GET['term'];
	$peliculas = array();
	$consultPelicula = "select codigopelicula, nombre, idgenero from pelicula where codigopelicula like '%$codigopelicula%'";
	$resultPelicula = $conexion->query($consultPelicula);
	while ($linea = $resultPelicula->fetch_array()) {
		$peliculas[] = array('label' => $linea['codigopelicula']." - ".$linea['nombre'].", ".$linea['idgenero'], 'value' => $linea['codigopelicula']);
	}
	echo json_encode($peliculas);
}
?>