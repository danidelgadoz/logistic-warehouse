<?php
include('../modelo/conexion.php');
include('../modelo/valida.php');
$enlace = "<a href='../modelo/logout.php'>Cerrar Sesion</a>";

$usuario = !empty($_GET['usuario']) ? $_GET['usuario'] : 0;
if ($usuario) {
	$queryDataUser = "select e.idempleado,nombres,apellidopat,apellidomat,dni,direccion,telefono1,telefono2,a.area,c.cargo,usuario,password,estado,perfil 
from empleado e,usuario u,perfil p,cargo c,area a where e.idempleado=u.idempleado and u.idperfil=p.idperfil and e.idarea=a.idarea and e.idcargo=c.idcargo and usuario='$usuario'";
$resultDataUser = $conexion->query($queryDataUser);
$linea = $resultDataUser->fetch_assoc();
} else {
	header('Location: ../vista/usuarios.php');
	exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Sistema de Gestion Almacen</title>
	<link rel="stylesheet" href="../vista/css/style.css">
</head>
<body>
	<div class="container">
		<div class="header">
		</div>
		<div class="menu-div">
			<?php include('../vista/include/menu.php'); ?>
		</div>
		<div class="sidebar">
			<div class="menuside">
				<?php include('../vista/include/sidebar.php'); ?>
			</div>
		</div>
		<div class="content">
			<div class="main">
				<div>
					<fieldset class="data">
						<legend><strong>Datos Personales</strong></legend>
						<div class="divdata">
							<label for="idempleado">Codigo Empleado : </label>
							<input type="text" id="idempleado" name="idempleado" value="<?php echo $linea['idempleado'] ?>" readonly="readonly">
						</div>
						<div class="divdata">
							<label for="nombres">Nombres : </label>
							<input type="text" id="nombres" name="nombres" value="<?php echo $linea['nombres'] ?>" readonly="readonly">
						</div>
						<div class="divdata">
							<label for="apellidos">Apellidos : </label>
							<input type="text" id="apellidos" name="apellidos" value="<?php echo $linea['apellidopat'].' '.$linea['apellidomat']?>" readonly="readonly">
						</div>
						<div class="divdata">
							<label for="dni">Nro. DNI : </label>
							<input type="text" id="dni" name="dni" value="<?php echo $linea['dni'] ?>" readonly="readonly">
						</div>
						<div class="divdata">
							<label for="direccion">Direccion : </label>
							<input type="text" id="direccion" name="direccion" value="<?php echo $linea['direccion'] ?>" size="35" readonly="readonly">
						</div>
						<div class="divdata">
							<label for="telefono1">Telefono 1 : </label>
							<input type="text" id="telefono1" name="telefono1" value="<?php echo $linea['telefono1'] ?>" readonly="readonly">
						</div>
						<div class="divdata">
							<label for="telefono2">Telefono 2 : </label>
							<input type="text" id="telefono2" name="telefono2" value="<?php echo $linea['telefono2'] ?>" readonly="readonly">
						</div>
						<div class="divdata">
							<label for="area">Area : </label>
							<input type="text" id="area" name="area" value="<?php echo $linea['area'] ?>" readonly="readonly">
						</div>
						<div class="divdata">
							<label for="cargo">Cargo : </label>
							<input type="text" id="cargo" name="cargo" value="<?php echo $linea['cargo'] ?>" readonly="readonly">
						</div>
					</fieldset>
				</div>
				<br>
				<div>
					<fieldset class="data">
						<legend><strong>Datos de Usuario</strong></legend>
						<div class="divdata">
							<label for="usuario">Usuario : </label>
							<input type="text" id="usuario" name="usuario" value="<?php echo $linea['usuario'] ?>" readonly="readonly">
						</div>
						<div class="divdata">
							<label for="password">Password : </label>
							<input type="text" id="password" name="password" value="<?php echo $linea['password'] ?>" readonly="readonly">
						</div>
						<div class="divdata">
							<label for="estado">Estado : </label>
							<input type="text" id="estado" name="estado" value="<?php echo $linea['estado'] ?>" readonly="readonly">
						</div>
						<div class="divdata">
							<label for="idperfil">Perfil de Usuario : </label>
							<input type="text" id="idperfil" name="idperfil" value="<?php echo $linea['perfil'] ?>" readonly="readonly">
						</div>
					</fieldset>
				</div>
				<div class="divboton">
					<?php echo '<a href="javascript:history.back()" class=boton>Regresar</a>'; ?>
				</div>
			</div>
		</div>
		<div class="footer">
			<?php include('../vista/include/footer.php'); ?>
		</div>
	</div>
</body>
</html>