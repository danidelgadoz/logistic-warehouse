<?php
include('../modelo/conexion.php');
include('../modelo/valida.php');

$enlace = "<a href='../modelo/logout.php'>Cerrar Sesion</a>";
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Sistema de Administración de Almacen</title>
	<link rel="stylesheet" href="../vista/css/style.css">
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
				<form action="../controlador/addproveedor.php" class="formu" method="POST">
					<h2>Registro de Clientes</h2>
					<div>
						<?php
						if (!empty($_SESSION['errorProve'])) {
							echo "<ul>";
							foreach ($_SESSION['errorProve'] as $valor) {
								echo "<li>$valor</li>\n";
							}
							echo "</ul>";
						}
						?>
					</div>
					<div class="divformu">
						<label for="nombre">Nombre : </label>
						<input type="text" id="nombre" name="nombre" size="35">
					</div>
					<div class="divformu">
						<label for="razonsocial">Razón Social : </label>
						<input type="text" id="razonsocial" name="razonsocial" size="35">
					</div>
					<div class="divformu">
						<label for="rubro">Rubro : </label>
						<input type="text" id="rubro" name="rubro" size="35" onkeypress="return validarLetras(event);">
					</div>
					<div class="divformu">
						<label for="ruc">Nro de RUC : </label>
						<input type="text" id="ruc" name="ruc" maxlength="11" onkeypress="return justNumbers(event);">
					</div>
					<div class="divformu">
						<label for="nrolicencia">Nro Licencia : </label>
						<input type="text" id="nrolicencia" name="nrolicencia" maxlength="20" onkeypress="return justNumbers(event);">
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
						<label for="pais">Departamento : </label>
						<input type="text" id="pais" name="pais" onkeypress="return validarLetras(event);">
					</div>
					<div class="divformu">
						<label for="provincia">Distrito : </label>
						<input type="text" id="provincia" name="provincia" onkeypress="return validarLetras(event);">
					</div>
					<div class="divformu">
						<label for="codigopostal">Código Postal : </label>
						<input type="text" id="codigopostal" name="codigopostal" maxlength="5" onkeypress="return justNumbers(event);">
					</div>
					<div class="divformu">
						<label for="telefono">Teléfono : </label>
						<input type="text" id="telefono" name="telefono" maxlength="12" onkeypress="return justNumbers(event);">
					</div>
					<div class="divformu">
						<label for="email">E-mail : </label>
						<input type="text" id="email" name="email" size="35">
					</div>
					<div class="divformu">
						<label for="site">Sitio Web : </label>
						<input type="text" id="site" name="site" size="35">
					</div>
					<div class="divboton">
						<input type="submit" class="boton" value="Registrar Cliente">
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