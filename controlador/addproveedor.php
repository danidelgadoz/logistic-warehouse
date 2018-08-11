<?php
include('../modelo/conexion.php');
include('../modelo/valida.php');

unset($_SESSION['errorProve']);
$error = array();

$nombre = !empty($_POST['nombre'])? $_POST['nombre'] : $error['noname'] = "No ha especificado el nombre del cliente.";
$nombre = ucwords(strtoupper($nombre));
$razonsocial = !empty($_POST['razonsocial'])? $_POST['razonsocial'] : $error['norazonsocial'] = "No ha especificado la razon social del cliente.";
$razonsocial = ucwords(strtoupper($razonsocial));
$rubro = !empty($_POST['rubro'])? $_POST['rubro'] : $error['norubro'] = "No ha especificado el rubro del cliente.";
$rubro = ucwords(strtoupper($rubro));
$ruc = !empty($_POST['ruc'])? $_POST['ruc'] : $error['noruc'] = "No ha indicado el Nro. de RUC del cliente.";
$nrolicencia = !empty($_POST['nrolicencia'])? $_POST['nrolicencia'] : $error['nolicencia'] = "No ha indicado el Nro. de Licencia del cliente.";
$tipo = $_POST['tipo'];
$nro = " ".$_POST['nro'];
$direccion = !empty($_POST['direccion'])? $_POST['direccion'] : $error['nodireccion'] = "No ha ingresado una Direccion.";
$direccion = ucwords(strtoupper($tipo." ".$direccion.$nro));
$pais = !empty($_POST['pais'])? $_POST['pais'] : $error['nopais'] = "No ha indicado el país del cliente.";
$pais = ucwords(strtoupper($pais));
$provincia = !empty($_POST['provincia'])? $_POST['provincia'] : $error['noprovincia'] = "No ha indicado el distrito del cliente.";
$provincia = ucwords(strtoupper($provincia));
$codigopostal = !empty($_POST['codigopostal'])? $_POST['codigopostal'] : $error['nopostal'] = "No ha indicado el codigo postal del cliente.";
$telefono = !empty($_POST['telefono'])? $_POST['telefono'] : $error['notelefono'] = "No ha indicado el Nro. telefonico del cliente.";
$email = !empty($_POST['email'])? $_POST['email'] : '';
$email = ucwords(strtoupper($email));
$site = !empty($_POST['site'])? $_POST['site'] : '';
$site = ucwords(strtoupper($site));

//$ipok = file_get_contents('http://www.whatsmyip.us/showipsimple.php'); //servicio no repsonde		
//$ip = substr($ipok, 16, -3);
$ip = "0.0.0.0";

$user = $_SESSION['usuario'];
$accion = "Agrego";
$objeto = "Nuevo Cliente";
date_default_timezone_set('America/Lima');

$fecha = date("d/m/Y");
$hora = date("H:i:s a");

$querye = "select usuario,estado,idempleado,perfil from usuario u,perfil p where u.idperfil=p.idperfil and usuario='$user'";
$listEmpleado = $conexion->query($querye);
while ($linea = $listEmpleado->fetch_assoc()) {
$perfil = $linea['perfil'];
$idempleado = $linea['idempleado'];
}

if (!$error) {
	echo $query = "insert into proveedor (nombrec,razonsocial,rubro,ruc,nrolicencia,direccion,pais,provincia,codigopostal,telefono,email,site) 
	values ('$nombre','$razonsocial','$rubro','$ruc','$nrolicencia','$direccion','$pais','$provincia','$codigopostal','$telefono','$email','$site')";

	$querylog = "insert into auditoria values ( '$user','$idempleado','$perfil', '$ip', '$accion', '$objeto', '$ruc' ,'$hora', '$fecha')";

	$conexion->query($query);
	$conexion->query($querylog);
	header('Location: ../vista/proveedores.php');
} else {
	$_SESSION['errorProve'] = $error;
	header('Location: ../vista/agregarproveedor.php');
}
?>