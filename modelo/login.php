<?php
include('../modelo/conexion.php');


session_start();

$user = !empty($_POST['user'])? $_POST['user'] : '';
$password = !empty($_POST['password'])? $_POST['password'] : '';

//$query = "select * from usuario where usuario = '$user' and password = '$password'";
$query = "select usuario,estado,idempleado,p.idperfil,perfil from usuario u,perfil p where u.idperfil=p.idperfil and usuario='$user' and password='$password'";
$result = $conexion->query($query);



if ($result->num_rows == 1) {
	while ($linea = $result->fetch_assoc()) {
		$estado = "{$linea['estado']}";
		$idperfil = "{$linea['idperfil']}";
		$perfil = "{$linea['perfil']}";
		$usuario = "{$linea['usuario']}";
	}
	//echo $estado;
	//echo $perfil;
	if ($estado == 'A') {
		$_SESSION['valido'] = 'ok';
		$_SESSION['idperfil'] = $idperfil;
		$_SESSION['perfil'] = $perfil;
		$_SESSION['usuario'] = $usuario;
		//echo $_SESSION['perfil'];
		//echo $_SESSION['usuario'];

		//$ipok = file_get_contents('http://www.whatsmyip.us/showipsimple.php'); //servicio no repsonde		
		//$ip = substr($ipok, 16, -3);
		$ip = "0.0.0.0";	

		$accion = "Inicio";
		$objeto = "Sesion";
		date_default_timezone_set('America/Lima');

		$fecha = date("d/m/Y");
		$hora = date("H:i:s a");

		$querye = "select usuario,estado,idempleado,perfil from usuario u,perfil p where u.idperfil=p.idperfil and usuario='$user'";
		$listEmpleado = $conexion->query($querye);
		while ($linea = $listEmpleado->fetch_assoc()) {
		$idempleado = $linea['idempleado'];
		}

		$querylog = "insert into auditoria values ( '$usuario','$idempleado','$perfil', '$ip', '$accion', '$objeto', 'Ninguno' ,'$hora', '$fecha')";
		$result = $conexion->query($querylog);

		header('Location: ../vista/main.php');
		exit();
	} elseif ($estado == 'I') {
		$_SESSION['mensaje'] = "Su cuenta con nombre <strong>".$user."</strong> esta deshabilitado actualmente, por favor comuniquece con el Administrador.";
		header('Location: ../vista/index.php');
	}
} else {
	$_SESSION['mensaje'] = "Usuario o Password mal digitados, verifique.";

	header('Location: ../vista/index.php');
}
?>