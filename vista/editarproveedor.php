<?php
include('../modelo/conexion.php');
include('../modelo/valida.php');
$enlace = "<a href='../modelo/logout.php'>Cerrar Sesion</a>";

$idproveedor = !empty($_GET['idproveedor']) ? $_GET['idproveedor'] : 0;
if ($idproveedor) {
	$query = "select * from proveedor where idproveedor='$idproveedor'";
	$result = $conexion->query($query);
	$dato = $result->fetch_assoc();
} else {
	header('Location: ../vista/proveedores.php');
	exit();
}
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
				<form action="../controlador/editproveedor.php" class="formu" method="POST">
					<input type="hidden" name="idproveedor" value="<?php echo $dato['idproveedor']; ?>">
					<h2>Edición de Cliente</h2>
					<div class="divformu">
						<label for="nombre">Nombre : </label>
						<input type="text" id="nombre" name="nombre" value="<?php echo $dato['nombrec'] ?>" size="35" onkeypress="return validarLetras(event);">
					</div>
					<div class="divformu">
						<label for="razonsocial">Razon Social : </label>
						<input type="text" id="razonsocial" name="razonsocial" value="<?php echo $dato['razonsocial'] ?>" size="35" onkeypress="return validarLetras(event);">
					</div>
					<div class="divformu">
						<label for="rubro">Rubro : </label>
						<input type="text" id="rubro" name="rubro" value="<?php echo $dato['rubro'] ?>" size="35" onkeypress="return validarLetras(event);">
					</div>
					<div class="divformu">
						<label for="ruc">Ruc : </label>
						<input type="text" id="ruc" name="ruc" value="<?php echo $dato['ruc'] ?>" maxlength="11" onkeypress="return justNumbers(event);">
					</div>
					<div class="divformu">
						<label for="nrolicencia">Nro Licencia : </label>
						<input type="text" id="nrolicencia" name="nrolicencia" value="<?php echo $dato['nrolicencia'] ?>" maxlength="20" onkeypress="return justNumbers(event);">
					</div>
					<div class="divformu">
						<label for="direccion">Dirección : </label>
						<input type="text" id="direccion" name="direccion" value="<?php echo $dato['direccion'] ?>" size="35">
					</div>
					<div class="divformu">
						<label for="pais">Pais : </label>
						<input type="text" id="pais" name="pais" value="<?php echo $dato['pais'] ?>" onkeypress="return validarLetras(event);">
					</div>
					<div class="divformu">
						<label for="provincia">Provincia : </label>
						<input type="text" id="provincia" name="provincia" value="<?php echo $dato['provincia'] ?>" onkeypress="return validarLetras(event);">
					</div>
					<div class="divformu">
						<label for="codigopostal">Codigo Postal : </label>
						<input type="text" id="codigopostal" name="codigopostal" value="<?php echo $dato['codigopostal'] ?>" maxlength="5" onkeypress="return justNumbers(event);">
					</div>
					<div class="divformu">
						<label for="telefono">Telefono : </label>
						<input type="text" id="telefono" name="telefono" value="<?php echo $dato['telefono'] ?>" maxlength="12" onkeypress="return justNumbers(event);">
					</div>
					<div class="divformu">
						<label for="email">Email : </label>
						<input type="text" id="email" name="email" value="<?php echo $dato['email'] ?>" size="35">
					</div>
					<div class="divformu">
						<label for="site">Web Site : </label>
						<input type="text" id="site" name="site" value="<?php echo $dato['site'] ?>" size="35">
					</div>
					<div class="divboton">
						<input type="submit" class="boton" value="Actulizar Cliente">
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