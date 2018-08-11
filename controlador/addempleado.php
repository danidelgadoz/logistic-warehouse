<?php
include('../modelo/conexion.php');
include('../modelo/valida.php');

unset($_SESSION['errorEmple']);
unset($_SESSION['msjEmple']);
$error = array();

$nombres = !empty($_POST['nombres'])? $_POST['nombres'] : $error['noname'] = "No ha ingresado el Nombre del empleado.";
$nombres = ucwords(strtolower($nombres));
$apellidopat = !empty($_POST['apellidopat'])? $_POST['apellidopat'] : $error['noapepat'] = "No ha ingresado el Apellido Paterno del empleado.";
$apellidopat = ucwords(strtolower($apellidopat));
$apellidomat = !empty($_POST['apellidomat'])? $_POST['apellidomat'] : $error['noapemat'] = "No ha ingresado el Apellido Materno del empleado.";
$apellidomat = ucwords(strtolower($apellidomat));
$dni = !empty($_POST['dni'])? $_POST['dni'] : $error['nodni'] = "No ha ingresado el DNI del empleado.";
$tipo = $_POST['tipo'];
$nro = " ".$_POST['nro'];
$direccion = !empty($_POST['direccion'])? $_POST['direccion'] : $error['nodireccion'] = "No ha ingresado una Direccion.";
$direccion = ucwords(strtolower($tipo." ".$direccion.$nro));
$telefono1 = !empty($_POST['telefono1'])? $_POST['telefono1'] : $error['notelefono'] = "No ha ingresado un número telefónico.";
$telefono2 = !empty($_POST['telefono2'])? $_POST['telefono2'] : 0;
$idarea = !empty($_POST['idarea'])? $_POST['idarea'] : 0;
$idcargo = !empty($_POST['idcargo'])? $_POST['idcargo'] : 0;

//$ipok = file_get_contents('http://www.whatsmyip.us/showipsimple.php'); //servicio no repsonde		
//$ip = substr($ipok, 16, -3);
$ip = "0.0.0.0";

$user = $_SESSION['usuario'];
$accion = "Agrego";
$objeto = "Nuevo Empleado";

date_default_timezone_set('America/Lima');

$fecha = date("d/m/Y");
$hora = date("H:i:s a");

$querye = "select usuario,estado,idempleado,perfil from usuario u,perfil p where u.idperfil=p.idperfil and usuario='$user'";
$listEmpleado = $conexion->query($querye);
while ($linea = $listEmpleado->fetch_assoc()) {
$perfil = $linea['perfil'];
$idemple = $linea['idempleado'];
}

$cod = date('y').date('m');
$queryNumEmple = "select * from empleado where idempleado like '{$cod}%'";
$result = $conexion->query($queryNumEmple);
$numEmple = $result->num_rows+1;
$idempleado = $cod.str_pad($numEmple,4,"0",STR_PAD_LEFT);

if (!$error) {

	$query = "insert into empleado (idempleado,nombres,apellidopat,apellidomat,dni,direccion,telefono1,telefono2,idarea,idcargo)
	values ('$idempleado','$nombres','$apellidopat','$apellidomat','$dni','$direccion','$telefono1','$telefono2','$idarea','$idcargo')";

	//usuario, idemple, cargo, ip, accion, objeto, codmanipulacion, hora, fecha

	$querylog = "insert into auditoria values ( '$user','$idemple','$perfil', '$ip', '$accion', '$objeto', '$idempleado', '$hora', '$fecha')";

	$conexion->query($query);
	$conexion->query($querylog);
	$_SESSION['msjEmple'] = "El registro ha sido exitoso.";
	header('Location: ../vista/agregarempleado.php');
} else {
	$_SESSION['errorEmple'] = $error;
	header('Location: ../vista/agregarempleado.php');
}
?>