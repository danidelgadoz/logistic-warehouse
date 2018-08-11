<?php
include('../modelo/conexion.php');
include('../modelo/valida.php');

$idproveedor = !empty($_POST['idproveedor'])? $_POST['idproveedor'] : '';
$nombre = !empty($_POST['nombre'])? $_POST['nombre'] : '';
$nombre = ucwords(strtoupper($nombre));
$razonsocial = !empty($_POST['razonsocial'])? $_POST['razonsocial'] : '';
$razonsocial = ucwords(strtoupper($razonsocial));
$rubro = !empty($_POST['rubro'])? $_POST['rubro'] : '';
$rubro = ucwords(strtoupper($rubro));
$ruc = !empty($_POST['ruc'])? $_POST['ruc'] : '';
$nrolicencia = !empty($_POST['nrolicencia'])? $_POST['nrolicencia'] : '';
$direccion = !empty($_POST['direccion'])? $_POST['direccion'] : '';
$direccion = ucwords(strtoupper($direccion));
$pais = !empty($_POST['pais'])? $_POST['pais'] : '';
$pais = ucwords(strtoupper($pais));
$provincia = !empty($_POST['provincia'])? $_POST['provincia'] : '';
$provincia = ucwords(strtoupper($provincia));
$codigopostal = !empty($_POST['codigopostal'])? $_POST['codigopostal'] : '';
$telefono = !empty($_POST['telefono'])? $_POST['telefono'] : '';
$email = !empty($_POST['email'])? $_POST['email'] : '';
$email = ucwords(strtoupper($email));
$site = !empty($_POST['site'])? $_POST['site'] : '';
$site = ucwords(strtoupper($site));

//$ipok = file_get_contents('http://www.whatsmyip.us/showipsimple.php'); //servicio no repsonde		
//$ip = substr($ipok, 16, -3);
$ip = "0.0.0.0";

$user = $_SESSION['usuario'];
$accion = "Edito";
$objeto = "Informacion de Cliente";
date_default_timezone_set('America/Lima');

$fecha = date("d/m/Y");
$hora = date("H:i:s a");

$querye = "select usuario,estado,idempleado,perfil from usuario u,perfil p where u.idperfil=p.idperfil and usuario='$user'";
$listEmpleado = $conexion->query($querye);
while ($linea = $listEmpleado->fetch_assoc()) {
$perfil = $linea['perfil'];
$idempleado = $linea['idempleado'];
}

$query = "update proveedor set nombrec='$nombre',razonsocial='$razonsocial',rubro='$rubro',ruc='$ruc',nrolicencia='$nrolicencia',direccion='$nrolicencia',direccion='$direccion',pais='$pais',provincia='$provincia',codigopostal='$codigopostal',telefono='$telefono',email='$email',site='$site' where idproveedor='$idproveedor'";
$querylog = "insert into auditoria values ( '$user','$idempleado','$perfil', '$ip', '$accion', '$objeto', '$ruc' ,'$hora', '$fecha')";

$conexion->query($query);
$conexion->query($querylog);
header('Location: ../vista/proveedores.php');
?>