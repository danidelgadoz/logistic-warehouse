<?php
include('../modelo/conexion.php');
include('../modelo/valida.php');

date_default_timezone_set('America/Lima');

unset($_SESSION['errorMov']);
unset($_SESSION['msjMov']);
$error = array();

$codigopelicula = !empty($_POST['codigopelicula'])? $_POST['codigopelicula'] : 0;
$cliente = !empty($_POST['idproveedor'])? $_POST['idproveedor'] : '';
$cantidad = !empty($_POST['cantidad'])? $_POST['cantidad'] : $error['noname'] = "No ha indicado la cantidad.";
$tipomovimiento = !empty($_POST['tipomovimiento'])? $_POST['tipomovimiento'] : 0;

$fechmovimiento = !empty($_POST['fechmovimiento'])? $_POST['fechmovimiento'] : $error['nofecha'] = "No ha indicado la fecha.";
if (strlen($fechmovimiento) < 10) {
	$error['longitudfecha'] = "El formato de fecha ingresado no es valido.";
}
$horamovimiento = !empty($_POST['horamovimiento'])? $_POST['horamovimiento'] : $error['nohora'] = "No ha indicado la hora.";
if (strlen($horamovimiento) < 8) {
	$error['longitudhora'] = "El formato de hora ingresado no es valido.";
}
$usuario = !empty($_POST['usuario'])? $_POST['usuario'] : '';

$nromov = date('m');
$queryNumMov = "select * from movimiento where nromovimiento like '{$nromov}%'";
$result = $conexion->query($queryNumMov);
$numMov = $result->num_rows+1;
$nromovimiento = $nromov.str_pad($numMov,5,"0",STR_PAD_LEFT);

//$ipok = file_get_contents('http://www.whatsmyip.us/showipsimple.php'); //servicio no repsonde		
//$ip = substr($ipok, 16, -3);
$ip = "0.0.0.0";

$user = $_SESSION['usuario'];
$accion = "Agrego";

date_default_timezone_set('America/Lima');

$fecha = date("d/m/Y");
$hora = date("H:i:s a");

$querye = "select usuario,estado,idempleado,perfil from usuario u,perfil p where u.idperfil=p.idperfil and usuario='$user'";
$listEmpleado = $conexion->query($querye);
while ($linea = $listEmpleado->fetch_assoc()) {
$perfil = $linea['perfil'];
$idempleado = $linea['idempleado'];
}

if ($codigopelicula) {
	
	if (strlen($codigopelicula) < 15) {
		$error['longitudcodpro'] = "El formato de codigo de pelicula ingresado no es valido.";
	} elseif (strlen($codigopelicula) == 15) {
		$queryCantStock = "select * from pelicula where codigopelicula='$codigopelicula'";
		$resultStocks = $conexion->query($queryCantStock);

		if (!$resultStocks->num_rows) {
			$error['noproducto'] = "El codigo de la pelicula es incorrecto o no existe.";
		} else {
			while ($datastock = $resultStocks->fetch_assoc()) {
				$stock = $datastock['stock'];
				$stockini = $datastock['stockini'];
				$nombrepeli = $datastock['nombre'];
			}

			if ($tipomovimiento == 'Entrante') {
				$total = $cantidad + $stock;
				if ($cantidad + $stock > $stockini) {
				$error['cantmax'] = "Error.  Usted no puede ingresar $cantidad cintas de la pelicula $nombrepeli ya que sumados al stock actual harian un total de $total en almacen cuando inicialmente habia $stockini unidades. Coloque otro monto por favor.";
				}
				$stock = $stock + $cantidad;
				$objeto = "Movimiento Entrante";

			} elseif ($tipomovimiento == 'Saliente') {
				if ($stock < $cantidad) {
				$error['cantmin'] = "Error. Usted no puede retirar $cantidad cintas de la pelicula $nombrepeli ya que en almacen solo hay $stock unidades. Coloque otro monto por favor.";
				}
				$stock = $stock - $cantidad;
				$objeto = "Movimiento Saliente";			
			}
		}
	}
} else {
	$error['nocodigo'] = "No ha especificado el codigo de la pelicula.";
}

if (!$error) {
	$queryMov = "insert into movimiento (nromovimiento,tipomovimiento,fechmovimiento,horamovimiento,usuario,idproveedor,codigopelicula,stock) values ('$nromovimiento','$tipomovimiento','$fechmovimiento','$horamovimiento','$usuario','$cliente', '$codigopelicula', '$cantidad')";
	$queryDet = " update pelicula set nromovimiento='$nromovimiento' where codigopelicula='$codigopelicula'";
	$queryStock = "update pelicula set stock='$stock' where codigopelicula='$codigopelicula'";

	$querylog = "insert into auditoria values ( '$user','$idempleado','$perfil', '$ip', '$accion', '$objeto', '$nromovimiento', '$hora','$fecha')";

	$conexion->query($queryMov);
	$conexion->query($queryDet);
	$conexion->query($queryStock);
	$conexion->query($querylog);
	$_SESSION['msjMov'] = "Se ha añadido el registro de movimiento exitosamente.";

	header('Location: ../vista/regmovimiento.php');
} else {
	$_SESSION['errorMov'] = $error;
	header('Location: ../vista/regmovimiento.php');

}
?>