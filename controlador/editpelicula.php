<?php
include('../modelo/conexion.php');
include('../modelo/valida.php');

$codigopelicula = !empty($_POST['codigopelicula'])? $_POST['codigopelicula'] : '';
$nombre = !empty($_POST['nombre'])? $_POST['nombre'] : '';
$nombre = ucwords(strtoupper($nombre));
$sinopsis = !empty($_POST['sinopsis'])? $_POST['sinopsis'] : '';
$sinopsis = ucfirst(strtoupper($sinopsis));

$stock = $_POST['stock'];

$idgenero = !empty($_POST['idgenero'])? $_POST['idgenero'] : '';
$director = !empty($_POST['director'])? $_POST['director'] : '';
$director = ucfirst(strtoupper($director));
$idproductora = !empty($_POST['idproductora'])? $_POST['idproductora'] : '';
$anho = !empty($_POST['anho'])? $_POST['anho'] : '';
$preciounit = !empty($_POST['preciounit'])? $_POST['preciounit'] : '';

//$ipok = file_get_contents('http://www.whatsmyip.us/showipsimple.php'); //servicio no repsonde		
//$ip = substr($ipok, 16, -3);
$ip = "0.0.0.0";

$user = $_SESSION['usuario'];
$accion = "Edito";
$objeto = "Informacion de Pelicula";
date_default_timezone_set('America/Lima');

$fecha = date("d/m/Y");
$hora = date("H:i:s a");

$querye = "select usuario,estado,idempleado,perfil from usuario u,perfil p where u.idperfil=p.idperfil and usuario='$user'";
$listEmpleado = $conexion->query($querye);
while ($linea = $listEmpleado->fetch_assoc()) {
$perfil = $linea['perfil'];
$idempleado = $linea['idempleado'];
}

$query = "update pelicula set nombre='$nombre',sinopsis='$sinopsis', director='$director', idgenero=$idgenero, idproductora=$idproductora, stockini='$stock', anho='$anho',preciounit='$preciounit' where codigopelicula='$codigopelicula'";
$querylog = "insert into auditoria values ( '$user','$idempleado','$perfil', '$ip', '$accion', '$objeto', '$codigopelicula' ,'$hora', '$fecha')";

$conexion->query($query);
$conexion->query($querylog);
header('Location: ../vista/pelicula.php');
?>