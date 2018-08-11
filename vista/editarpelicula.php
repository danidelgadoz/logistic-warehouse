<?php
include('../modelo/conexion.php');
include('../modelo/valida.php');
$enlace = "<a href='../modelo/logout.php'>Cerrar Sesion</a>";

$codigopelicula = !empty($_GET['codigopelicula']) ? $_GET['codigopelicula'] : 0;
if ($codigopelicula) {
	$query = "select * from pelicula where codigopelicula='$codigopelicula'";
	$result = $conexion->query($query);
	$dato = $result->fetch_assoc();
} else {
	header('Location: ../vista/proveedores.php');
	exit();
}

$consultGenero = "select * from genero";
$resultGenero = $conexion->query($consultGenero);
$genero = "<select id='idgenero' name='idgenero'>";
while ($linea = $resultGenero->fetch_assoc()) {
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
				<form action="../controlador/editpelicula.php" class="formu" method="POST">
					<input type="hidden" name="codigopelicula" value="<?php echo $dato['codigopelicula']; ?>">
					<h2>Edición de Producto</h2>
					<div class="divformu">
						<label for="nombre">Nombre : </label>
						<input type="text" id="nombre" name="nombre" value="<?php echo $dato['nombre']; ?>">
					</div>
					<div class="divformu">
						<label for="sinopsis">Sinopsis : </label>
						<textarea id="sinopsis" name="sinopsis" rows="2" cols="30"><?php echo $dato['sinopsis']; ?></textarea>
					</div>


					<div class="divformu">
						<label for="idgenero">Genero : </label>
						<?php echo $genero; ?>
					</div>

					<div class="divformu">
						<label for="director">Director : </label>
						<input type="text" id="director" name="director" value="<?php echo $dato['director']; ?>" onkeypress="return validarLetras(event);">
					</div>

					<div class="divformu">
						<label for="idproductora">Productora : </label>
						<? // algo raro aqui ?>
						<?php echo $productora; ?>
					</div>


					<div class="divformu">
						<label for="anho">Año : </label>
						<input type="text" id="anho" name="anho" maxlength="4" onkeypress="return justNumbers(event);" value="<?php echo $dato['anho']; ?>">
					</div>
					<div class="divformu">
						<label for="preciounit">Precio Unit. : </label>
						<input type="text" id="preciounit" name="preciounit" maxlength="4" onkeypress="return justNumbers(event);" value="<?php echo $dato['preciounit']; ?>">
					</div>

					<div class="divformu">
						<label for="stock">Stock Inicial: </label>
						<input type="text" id="stock" name="stock" maxlength="4" onkeypress="return justNumbers(event);" value="<?php echo $dato['stockini']; ?>" >
					</div>

					<div class="divboton">
						<input type="submit" class="boton" value="Actualizar Pelicula">
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