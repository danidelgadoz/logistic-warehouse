<?php
include('../modelo/conexion.php');
include('../modelo/valida.php');

//$ipok = file_get_contents('http://www.whatsmyip.us/showipsimple.php'); // servicio  no responde
//$ip = substr($ipok, 16, -3);
$ip = "0.0.0.0";

$user = $_SESSION['usuario'];
$accion = "Cerro";
$objeto = "Sesion";
date_default_timezone_set('America/Lima');

$fecha = date("d/m/Y");
$hora = date("H:i:s a");

$querye = "select usuario,estado,idempleado,perfil from usuario u,perfil p where u.idperfil=p.idperfil and usuario='$user'";
$listEmpleado = $conexion->query($querye);
while ($linea = $listEmpleado->fetch_assoc()) {
$perfil = $linea['perfil'];
$idempleado = $linea['idempleado'];
}

session_start();
session_destroy();

$querylog = "insert into auditoria values ( '$user','$idempleado','$perfil', '$ip', '$accion', '$objeto', 'Ninguno' ,'$hora', '$fecha')";
$result = $conexion->query($querylog);

header('Location: ../vista/index.php');
?>