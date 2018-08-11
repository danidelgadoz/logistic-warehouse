<?php
include('../modelo/conexion.php');
include('../modelo/valida.php');
$enlace = "<a href='../modelo/logout.php'>Cerrar Sesion</a>";

$usuario = !empty($_GET['usuario']) ? $_GET['usuario'] : 0;
if ($usuario) {
	$query = "select * from usuario where usuario='$usuario'";
	$result = $conexion->query($query);
	$dato = $result->fetch_assoc();
} else {
	header('Location: ../vista/usuarios.php');
	exit();
}

$consultPerfil = "select * from perfil";
$resultPerfil = $conexion->query($consultPerfil);
$perfil = "<select id='idperfil' name='idperfil'>";
while ($linea = $resultPerfil->fetch_assoc()) {
	$perfil .= "<option value={$linea['idperfil']}>{$linea['perfil']}</option>";
}
$perfil .= "</select>";
?>


<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Sistema de Administración de Almacen</title>
	<link rel="stylesheet" href="../vista/css/style.css">
</head>
<body>
	<div class="container">
		<div class="header">
			<?php include('../vista/include/header.php'); ?>
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
				<form action="../controlador/edituser.php" class="formu" method="POST">
					<h2>Edición de Usuario</h2>
					<input type="hidden" name="usuario" value="<?php echo $dato['usuario']; ?>">
					<div class="divformu">
						<label for="usuario">Usuario : </label>
						<input type="text" id="usuario" name="usuario" value="<?php echo $dato['usuario']; ?>" disabled>
					</div>
					<div class="divformu">
						<label for="password">Nuevo Password : </label>
						<input type="text" id="password" name="password" value="<?php echo $dato['password'] ?>">
					</div>
					<div class="divformu">
						<label for="estado">Estado : </label>
						<select id="estado" name="estado">
							<option value="A">Activo</option>
							<option value="I">Inactivo</option>
						</select>
					</div>


					<div class="divformu">
						<label for="idperfil">Perfil de Usuario : </label>
						<?php echo $perfil; ?>
					</div>


					<div class="divboton">
						<input type="submit" class="boton" value="Actulizar Usuario">
					</div>
				</form>
			</div>
		</div>
		<div class="footer">
			<?php include('../vista/include/footer.php'); ?>
		</div>
	</div>
</body>
</html>