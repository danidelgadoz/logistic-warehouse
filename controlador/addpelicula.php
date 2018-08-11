<?php
include('../modelo/conexion.php');
include('../modelo/valida.php');

unset($_SESSION['errorPeli']);
$error = array();

$nombre = !empty($_POST['nombre'])? $_POST['nombre'] : $error['noname'] = "No ha ingresado el nombre de la película.";
$nombre = ucwords(strtoupper($nombre));
$sinopsis = !empty($_POST['sinopsis'])? $_POST['sinopsis'] : $error['nosinopsis'] = "No ha ingresado una sinopsis de la pelicula.";
$sinopsis = ucwords(strtoupper($sinopsis));
$anho = !empty($_POST['anho'])? $_POST['anho'] : $error['noanho'] = "No ha ingresado el año de la pelicula.";
$preciounit = !empty($_POST['preciounit'])? $_POST['preciounit'] : $error['noprecio'] = "No ha ingresado el precio de la pelicula.";
$genero = !empty($_POST['genero'])? $_POST['genero'] : '';
$genero = ucwords(strtoupper($genero));

$stock = !empty($_POST['stock'])? $_POST['stock'] : $error['nostock'] = "No ha ingresado el stock inicial de la pelicula.";

$director = !empty($_POST['director'])? $_POST['director'] : $error['nodirector'] = "No ha ingresado el director de la pelicula" ;
$director = ucfirst(strtoupper($director));
$idproductora = !empty($_POST['idproductora'])? $_POST['idproductora'] : '';

$cod = $genero."-".$anho;

//$ipok = file_get_contents('http://www.whatsmyip.us/showipsimple.php'); //servicio no repsonde		
//$ip = substr($ipok, 16, -3);
$ip = "0.0.0.0";

$user = $_SESSION['usuario'];
$accion = "Agrego";
$objeto = "Nueva Pelicula";
date_default_timezone_set('America/Lima');

$fecha = date("d/m/Y");
$hora = date("H:i:s a");

$querye = "select usuario,estado,idempleado,perfil from usuario u,perfil p where u.idperfil=p.idperfil and usuario='$user'";
$listEmpleado = $conexion->query($querye);
while ($linea = $listEmpleado->fetch_assoc()) {
$perfil = $linea['perfil'];
$idempleado = $linea['idempleado'];
}

$querycod = "select codigopelicula from pelicula where codigopelicula like '{$cod}%' order by codigopelicula desc limit 1";
$result = $conexion->query($querycod);
while ($linea = $result->fetch_assoc()) {
	$numprod = substr($linea['codigopelicula'],-3,3)+1;
}
$codigopelicula = $cod."-".str_pad($numprod,6,"0",STR_PAD_LEFT);

if (!$error) {

	$query = "insert into pelicula (codigopelicula,nombre,sinopsis,director,idproductora,preciounit,idgenero,anho, stockini) 
	values ('$codigopelicula','$nombre','$sinopsis', '$director', '$idproductora','$preciounit','$genero','$anho' , '$stock' )";
	$querylog = "insert into auditoria values ( '$user','$idempleado','$perfil', '$ip', '$accion', '$objeto', '$codigopelicula' ,'$hora', '$fecha')";

	$conexion->query($query);
	$conexion->query($querylog);
	header('Location: ../vista/pelicula.php');
} else {
	$_SESSION['errorPeli'] = $error;
	header('Location: ../vista/agregarpelicula.php');
}
?>