<?php
include('../modelo/conexion.php');
include('../modelo/valida.php');
header("Content-Type: text/html;charset=utf-8");

$enlace = "<a href='../modelo/logout.php'>Cerrar Sesion</a>";

$consultgenero = "select * from genero";
$resultgenero = $conexion->query($consultgenero);
$genero = "<select id='genero' name='genero'>";
while ($linea = $resultgenero->fetch_assoc()) {
	$genero .= "<option value={$linea['genero']}>{$linea['descripcion']}</option>";
}
$genero .= "</select>";

$consultProd = "select * from productora";
$resultProd = $conexion->query($consultProd);
$productora = "<select id='idproductora' name='idproductora'>";
while ($linea = $resultProd->fetch_assoc()) {
	$productora .= "<option value={$linea['idproductora']}>{$linea['nombrep']}</option>";
}
$productora .= "</select>";

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
				<form action="../controlador/addpelicula.php" class="formu" method="POST">
					<h2>Registrar Pelicula</h2>
					<div>
						<?php
						if (!empty($_SESSION['errorPeli'])) {
							echo "<ul>";
							foreach ($_SESSION['errorPeli'] as $valor) {
								echo "<li>$valor</li>\n";
							}
							echo "</ul>";
						}
						?>
					</div>
					<div class="divformu">
						<label for="nombre">Nombre : </label>
						<input type="text" id="nombre" name="nombre">
					</div>
					<div class="divformu">
						<label for="sinopsis">Sinopsis : </label>
						<textarea id="sinopsis" name="sinopsis" rows="2" cols="30"></textarea>
					</div>

					<div class="divformu">
						<label for="genero">Genero : </label>
						<?php echo $genero; ?>
					</div>					

					<div class="divformu">
						<label for="director">Director : </label>
						<input type="text" id="director" name="director" onkeypress="return validarLetras(event);">
					</div>

					<div class="divformu">
						<label for="idgenero">Productora : </label>
						<?php echo $productora; ?>
					</div>

					<div class="divformu">
						<label for="anho">Año : </label>
						<input type="text" id="anho" name="anho" maxlength="4" onkeypress="return justNumbers(event);">
					</div>
					<div class="divformu">
						<label for="preciounit">Precio Unit. : </label>
						<input type="text" id="preciounit" name="preciounit" maxlength="4" onkeypress="return justNumbers(event);">
					</div>

					<div class="divformu">
						<label for="stock">Stock Inicial: </label>
						<input type="text" id="stock" name="stock" maxlength="4" onkeypress="return justNumbers(event);">
					</div>
					
					<div class="divboton">
						<input type="submit" class="boton" value="Registrar Pelicula">
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