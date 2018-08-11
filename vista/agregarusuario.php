<?php
include('../modelo/conexion.php');
include('../modelo/valida.php');

$enlace = "<a href='../modelo/logout.php'>Cerrar Sesion</a>";

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
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />
	<script type="text/javascript" src="../controlador/js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="../controlador/js/jquery-ui-1.10.3.custom.min.js"></script>
	<script type="text/javascript">
	$(function() {
		$("#idempleado").autocomplete({
			source: "../controlador/empleadocomplete.php",
			minlength: 1
		});
	});
	</script>
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
				<form action="../controlador/adduser.php" class="formu" method="POST">
					<h2>Registro de Usuario</h2>
					<div>
						<?php
						if (!empty($_SESSION['errorUser'])) {
							echo "<ul>";
							foreach ($_SESSION['errorUser'] as $valor) {
								echo "<li>$valor</li>\n";
							}
							echo "</ul>";
						}
						?>
					</div>
					<div class="divformu">
						<label for="usuario">Usuario : </label>
						<input type="text" id="usuario" name="usuario" maxlength="25">
					</div>
					<div class="divformu">
						<label for="password">Password : </label>
						<input type="text" id="password" name="password" maxlength="25">
					</div>
					<div class="divformu">
						<label for="estado">Estado : </label>
						<select id="estado" name="estado">
							<option value="A">Activo</option>
							<option value="I">Inactivo</option>
						</select>
					</div>
					<div class="divformu">
						<label for="idempleado" name="idempleado">Codigo Empleado : </label>
						<input type="text" id="idempleado" name="idempleado" value="" maxlength="7">
					</div>
					<div class="divformu">
						<label for="idperfil">Perfil de Usuario : </label>
						<?php echo $perfil; ?>
					</div>
					<div class="divboton">
						<input type="submit" class="boton" value="Agregar Usuario">
					</div>
					<div>
						<?php
						if (!empty($_SESSION['msjUser'])) {
							echo $_SESSION['msjUser'];
						}
						?>
					</div>
				</form>
			</div>
		</div>
		<div class="footer">
			<?php include('../vista/include/footer.php'); ?>
		</div>
</body>
</html>