<?php
include('../modelo/conexion.php');
include('../modelo/valida.php');

$usuario = !empty($_POST['usuario'])? $_POST['usuario'] : '';
$password = !empty($_POST['password'])? $_POST['password'] : '';
$estado = !empty($_POST['estado'])? $_POST['estado'] : '';

//$ipok = file_get_contents('http://www.whatsmyip.us/showipsimple.php');
//$ip = substr($ipok, 16, -3);
$ip = "0.0.0.0";

$user = $_SESSION['usuario'];
$accion = "Edito";
$objeto = "Informacion de Usuario";
date_default_timezone_set('America/Lima');

$fecha = date("d/m/Y");
$hora = date("H:i:s a");

$querye = "select usuario,estado,idempleado,perfil from usuario u,perfil p where u.idperfil=p.idperfil and usuario='$user'";
$listEmpleado = $conexion->query($querye);
while ($linea = $listEmpleado->fetch_assoc()) {
$perfil = $linea['perfil'];
$idempleado = $linea['idempleado'];
}

$idperfil = !empty($_POST['idperfil'])? $_POST['idperfil'] : '';

$query = "update usuario set password='$password',estado='$estado',idperfil='$idperfil' where usuario='$usuario'";
$querylog = "insert into auditoria values ( '$user','$idempleado','$perfil', '$ip', '$accion', '$objeto', '$usuario' ,'$hora', '$fecha')";

$result = $conexion->query($query);
$result = $conexion->query($querylog);
header('Location: ../vista/usuarios.php');
?>