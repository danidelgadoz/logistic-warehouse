<?php
include('../modelo/conexion.php');
include('../modelo/valida.php');

$enlace = "<a href='../modelo/logout.php'>Cerrar Sesion</a>";

$idproveedor = !empty($_GET['idproveedor']) ? $_GET['idproveedor'] : 0;
if ($idproveedor) {
	$queryDataProve = "select * from proveedor where idproveedor='$idproveedor'";
	$resultDataProve = $conexion->query($queryDataProve);
	$linea = $resultDataProve->fetch_assoc();
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
						<legend><strong>Datos del Cliente</strong></legend>
						<div class="divdata">
							<label for="idproveedor">Codigo : </label>
							<input type="text" id="idproveedor" name="idproveedor" value="<?php echo $linea['idproveedor']; ?>" readonly="readonly">
						</div>
						<div class="divdata">
							<label for="nombre">Nombre : </label>
							<input type="text" id="nombre" name="nombre" value="<?php echo $linea['nombrec']; ?>" size="35" readonly="readonly">
						</div>
						<div class="divdata">
							<label for="razonsocial">Razon Social : </label>
							<input type="text" id="razonsocial" name="razonsocial" value="<?php echo $linea['razonsocial']; ?>" size="35" readonly="readonly">
						</div>
						<div class="divdata">
							<label for="rubro">Rubro : </label>
							<input type="text" id="rubro" name="rubro" value="<?php echo $linea['rubro']; ?>" size="35" readonly="readonly">
						</div>
						<div class="divdata">
							<label for="ruc">Ruc : </label>
							<input type="text" id="ruc" name="ruc" value="<?php echo $linea['ruc']; ?>" readonly="readonly">
						</div>
						<div class="divdata">
							<label for="nrolicencia">Licencia : </label>
							<input type="text" id="nrolicencia" name="nrolicencia" value="<?php echo $linea['nrolicencia']; ?>" readonly="readonly">
						</div>
						<div class="divdata">
							<label for="direccion">Direccion : </label>
							<input type="text" id="direccion" name="direccion" value="<?php echo $linea['direccion']; ?>" size="35" readonly="readonly">
						</div>
						<div class="divdata">
							<label for="pais">Pais : </label>
							<input type="text" id="pais" name="pais" value="<?php echo $linea['pais']; ?>" readonly="readonly">
						</div>
						<div class="divdata">
							<label for="provincia">Provincia : </label>
							<input type="text" id="provincia" name="provincia" value="<?php echo $linea['provincia']; ?>" readonly="readonly">
						</div>
						<div class="divdata">
							<label for="codigopostal">Codigo Postal : </label>
							<input type="text" id="codigopostal" name="codigopostal" value="<?php echo $linea['codigopostal']; ?>" readonly="readonly">
						</div>
						<div class="divdata">
							<label for="telefono">Telefono : </label>
							<input type="text" id="telefono" name="telefono" value="<?php echo $linea['telefono']; ?>" readonly="readonly">
						</div>
						<div class="divdata">
							<label for="email">E-mail : </label>
							<input type="text" id="email" name="email" value="<?php echo $linea['email']; ?>" size="35" readonly="readonly">
						</div>
						<div class="divdata">
							<label for="site">Web Site : </label>
							<input type="text" id="site" name="site" value="<?php echo $linea['site']; ?>" size="35" readonly="readonly">
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