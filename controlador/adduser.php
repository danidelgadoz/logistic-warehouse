<?php
include('../modelo/conexion.php');
include('../modelo/valida.php');

unset($_SESSION['errorUser']);
unset($_SESSION['msjUser']);
$error = array();

$usuario = !empty($_POST['usuario'])? $_POST['usuario'] : $error['nouser'] = "No ha ingresado un usuario.";
$queryUser = "select * from usuario where usuario='$usuario'";
$resultUser = $conexion->query($queryUser);
if ($resultUser->num_rows) {
	$error['nouser'] = "El usuario <strong>$usuario</strong> ya está en uso, por favor escoja otro.";
}
$password = !empty($_POST['password'])? $_POST['password'] : $error['nopassword'] = "No ha asigando una contraseña.";
$estado = !empty($_POST['estado'])? $_POST['estado'] : 'A';
$idempleado = !empty($_POST['idempleado'])? $_POST['idempleado'] : $error['noidempleado'] = "No ha asignado la cuenta de usuario a un empleado.";
if (strlen($idempleado) < 7) {
	$error['longitudidempleado'] = "No ha asignado un codigo de empleado valido.";
}
$idperfil = !empty($_POST['idperfil'])? $_POST['idperfil'] : '';

//$ipok = file_get_contents('http://www.whatsmyip.us/showipsimple.php'); //servicio no repsonde		
//$ip = substr($ipok, 16, -3);
$ip = "0.0.0.0";

$user = $_SESSION['usuario'];
$accion = "Agrego";
$objeto = "Nuevo Usuario";
date_default_timezone_set('America/Lima');

$fecha = date("d/m/Y");
$hora = date("H:i:s a");

$querye = "select usuario,estado,idempleado,perfil from usuario u,perfil p where u.idperfil=p.idperfil and usuario='$user'";
$listEmpleado = $conexion->query($querye);
while ($linea = $listEmpleado->fetch_assoc()) {
$perfil = $linea['perfil'];
$idempleado1 = $linea['idempleado'];
}

if (!$error) {
	$query = "insert into usuario (usuario,password,estado,idempleado,idperfil) values ('$usuario','$password','$estado','$idempleado','$idperfil')";
	$querylog = "insert into auditoria values ('$user','$idempleado1','$perfil', '$ip', '$accion', '$objeto', '$usuario' ,'$hora', '$fecha')";

	$conexion->query($query);
	$conexion->query($querylog);
	$_SESSION['msjUser'] = "El registro ha sido exitoso.";
	header('Location: ../vista/agregarusuario.php');
} else {
	$_SESSION['errorUser'] = $error;
	header('Location: ../vista/agregarusuario.php');
}
?>