<?php
include('../modelo/conexion.php');
include('../modelo/valida.php');

$idproveedor = !empty($_GET['idproveedor'])? $_GET['idproveedor'] : 0;

$ipok = file_get_contents('http://www.whatsmyip.us/showipsimple.php');
$ip = substr($ipok, 16, -3);

$user = $_SESSION['usuario'];
$accion = "Elimino";
$objeto = "Registro de Cliente";
date_default_timezone_set('America/Lima');

$fecha = date("d/m/Y");
$hora = date("H:i:s a");

$querye = "select usuario,estado,idempleado,perfil from usuario u,perfil p where u.idperfil=p.idperfil and usuario='$user'";
$listEmpleado = $conexion->query($querye);
while ($linea = $listEmpleado->fetch_assoc()) {
$perfil = $linea['perfil'];
$idempleado = $linea['idempleado'];
}

$querycliente = "select * from proveedor where idproveedor='$idproveedor'";
$listCliente = $conexion->query($querycliente);
while ($lineacli = $listCliente->fetch_assoc()) {
$ruc = $lineacli['ruc'];
}

if ($idproveedor) {
	$query = "delete from proveedor where idproveedor='$idproveedor'";
	$querylog = "insert into auditoria values ( '$user','$idempleado','$perfil', '$ip', '$accion', '$objeto', '$ruc' ,'$hora', '$fecha')";

	$result = $conexion->query($query);
	$result = $conexion->query($querylog);
}
header('Location: ../vista/proveedores.php');
?>