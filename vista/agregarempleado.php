<?php
include('../modelo/valida.php');
include('../modelo/conexion.php');
$enlace = "<a href='../modelo/logout.php'>Cerrar Sesion</a>";

$consultArea = "select * from area";
$resultArea = $conexion->query($consultArea);
$area = "<select id='idarea' name='idarea'>";
while ($linea = $resultArea->fetch_assoc()) {
	$area .= "<option value={$linea['idarea']}>{$linea['area']}</option>";
}
$area .= "</select>";

$consultCargo = "select * from cargo";
$resultCargo = $conexion->query($consultCargo);
$cargo = "<select id='idcargo' name='idcargo'>";
while ($linea = $resultCargo->fetch_assoc()) {
	$cargo .= "<option value={$linea['idcargo']}>{$linea['cargo']}</option>";
}
$cargo .= "</select>";
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Sistem Almacen</title>
	<link rel="stylesheet" href="css/style.css">
	<script type="text/javascript" src="../controlador/js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="../controlador/js/jquery-ui-1.10.3.custom.min.js"></script>
	<script>
	function justNumbers(e) {
		var keynum = window.event ? window.event.keyCode : e.which;
		if ( keynum == 8 ) return true;
		return /\d/.test(String.fromCharCode(keynum));
	}

	function validarLetras(e) {
		tecla = (document.all) ? e.keyCode : e.which;
		if (tecla==8) return true;
		if (tecla==32) return true;
		if (e.ctrlKey && tecla==86) { return true;} //Ctrl v
		if (e.ctrlKey && tecla==67) { return true;} //Ctrl c
		if (e.ctrlKey && tecla==88) { return true;} //Ctrl x

		patron = /[a-zA-ZñÑ]/; //patron

		te = String.fromCharCode(tecla);
		return patron.test(te); // prueba de patron
	}

	$(document).ready(function() {
		$('#boton').click(function(){
			if($("#dni").val().length != 8) {
				alert("El DNI debe tener 8 caracteres");
				return false;
			}
		});
	});
	</script>
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
				<form action="../controlador/addempleado.php" class="formu" method="POST">
					<h2>Registro de Empleado</h2>
					<div>
						<?php
						if (!empty($_SESSION['errorEmple'])) {
							echo "<ul>";
							foreach ($_SESSION['errorEmple'] as $valor) {
								echo "<li>$valor</li>\n";
							}
							echo "</ul>";
						}
						?>
					</div>
					<div class="divformu">
						<label for="nombres">Nombres : </label>
						<input type="text" id="nombres" name="nombres" size="35" onkeypress="return validarLetras(event);">
					</div>
					<div class="divformu">
						<label for="apellidopat">Apellido Paterno : </label>
						<input type="text" id="apellidopat" name="apellidopat" size="30" onkeypress="return validarLetras(event);">
					</div>
					<div class="divformu">
						<label for="apellidomat">Apellido Materno : </label>
						<input type="text" id="apellidomat" name="apellidomat" size="30" onkeypress="return validarLetras(event);">
					</div>
					<div class="divformu">
						<label for="dni">DNI : </label>
						<input type="text" id="dni" name="dni" maxlength="8" onkeypress="return justNumbers(event);">
					</div>
					<div class="divformu">
						<label for="direccion">Dirección : </label>
						<select name="tipo">
							<option value="Av.">Av.</option>
							<option value="Mz.">Mz.</option>
							<option value="Jiron">Jiron</option>
							<option value="Pasaje">Pasaje</option>
						</select>
						<input type="text" id="direccion" name="direccion" size="25" placeholder="Dirección">
						<input type="text" id="nro" name="nro" maxlength="8" size="8" placeholder="Nro" onkeypress="return justNumbers(event);">
					</div>
					<div class="divformu">
						<label for="telefono1">Telefono 1 : </label>
						<input type="text" id="telefono1" name="telefono1" maxlength="9" onkeypress="return justNumbers(event);">
					</div>
					<div class="divformu">
						<label for="telefono2">Telefono 2 : </label>
						<input type="text" id="telefono2" name="telefono2" maxlength="9" onkeypress="return justNumbers(event);">
					</div>
					<div class="divformu">
						<label for="idarea">Area : </label>
						<?php echo $area; ?>
					</div>
					<div class="divformu">
						<label for="idcargo">Cargo : </label>
						<?php echo $cargo; ?>
					</div>
					<div class="divboton">
						<input type="submit" id="boton" class="boton" value="Registrar Empleado">
					</div>
					<div>
						<?php
						if (!empty($_SESSION['msjEmple'])) {
							echo $_SESSION['msjEmple'];
						}
						?>
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