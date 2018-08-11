<?php
include('../modelo/conexion.php');
include('../modelo/valida.php');

$enlace = "<a href='../modelo/logout.php'>Cerrar Sesion</a>";

date_default_timezone_set('America/Lima');

$consultCliente = "select * from proveedor";
$resultCliente = $conexion->query($consultCliente);
$cliente = "<select id='idproveedor' name='idproveedor'>";
while ($linea = $resultCliente->fetch_assoc()) {
	$cliente .= "<option value={$linea['idproveedor']}>{$linea['nombrec']}</option>";
}
$cliente .= "</select>";

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Sistema de Gestion Almacen</title>
	<link rel="stylesheet" href="../vista/css/style.css">
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />
	<script type="text/javascript" src="../controlador/js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="../controlador/js/jquery-ui-1.10.3.custom.min.js"></script>
	<script type="text/javascript">
	$(function() {
		$("#codigopelicula").autocomplete({
			source: "../controlador/productocomplete.php",
			minlength: 1
		});
	});

	</script>
	
	<script type="text/javascript">
	$(function() {
		$("#fechmovimiento").datepicker({dateFormat: "dd/mm/yy"});
	});
	</script>

	<script>
	function justNumbers(e) {
		var keynum = window.event ? window.event.keyCode : e.which;
		if ( keynum == 8 ) return true;
		return /\d/.test(String.fromCharCode(keynum));
	}
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
				<form action="../controlador/addmovimiento.php" class="formu" method="POST">
					<input type="hidden" name="usuario" value="<?php echo $_SESSION['usuario']; ?>">
					<h2>Registrar movimiento de pelicula</h2>
					<div>
						<?php
						if (!empty($_SESSION['errorMov'])) {
							echo "<ul>";
							foreach ($_SESSION['errorMov'] as $valor) {
								echo "<li>$valor</li>\n";
							}
							echo "</ul>";
						}
						?>
					</div>
					<div class="divformu">
						<label for="codigopelicula">Codigo Pelicula : </label>
						<input type="text" id="codigopelicula" name="codigopelicula" value="" maxlength="12" onkeypress="return justNumbers(event);">
					</div>
					<div class="divformu">
						<label for="cantidad">Cantidad : </label>
						<input type="text" id="cantidad" name="cantidad" maxlength="3" onkeypress="return justNumbers(event);">
					</div>
					
					<div class="divformu">
						<label for="idproveedor">Cliente : </label>
						<?php echo $cliente; ?>
					</div>

					<div class="divformu">
						<label for="tipomovimiento">Tipo de movimiento : </label>
						<select id="tipomovimiento" name="tipomovimiento">
							<option value="Entrante">Entrante</option>
							<option value="Saliente">Saliente</option>
						</select>
					</div>

					<div class="divformu">
						<label for="fechmovimiento">Fecha : </label>
						<input type="text" id="fechmovimiento" name="fechmovimiento" value="<?php echo date("d/m/Y");?>" maxlength="10">
					</div>
					
					<div class="divformu">
						<label for="horamovimiento">Hora : </label>
						<input type="text" id="horamovimiento" name="horamovimiento" value="<?php echo date("H:i a");?>" maxlength="8">
					</div>
					<div class="divboton">
						<input type="submit" class="boton" value="Registrar Movimiento">
					</div>
					<div>
						<?php
						if (!empty($_SESSION['msjMov'])) {
							echo $_SESSION['msjMov'];
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