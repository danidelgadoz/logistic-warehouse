<?php
include('../modelo/valida.php');
include('../modelo/conexion.php');

$enlace = "<a href='../modelo/logout.php'>Cerrar Sesion</a>";

$consulta = "select codigopelicula,nombre,sinopsis,descripcion,anho,stock,stockini,preciounit from pelicula p, genero g where p.idgenero=g.genero";
$listproducto = $conexion->query($consulta);

$tabla = "<table class='marco'>";
$tabla .= <<<FIN
<tr>
<th>Id</th>
<th>Nombre</th>
<th>Sinopsis</th>
<th>Genero</th>
<th>Año</th>
<th>Stock Actual</th>
<th>Stock Inicial</th>
<th>Precio</th>
<th colspan=2>Acción</th>
FIN;

while ($linea = $listproducto->fetch_assoc()) {
	$tabla .= "<tr>";
	$tabla .= "<td>{$linea['codigopelicula']}</td>";
	$tabla .= "<td>{$linea['nombre']}</td>";
	$tabla .= "<td>{$linea['sinopsis']}</td>";
	$tabla .= "<td>{$linea['descripcion']}</td>";
	$tabla .= "<td>{$linea['anho']}</td>";
	$tabla .= "<td>{$linea['stock']}</td>";
	$tabla .= "<td>{$linea['stockini']}</td>";
	$tabla .= "<td>{$linea['preciounit']}</td>";
	$tabla .= "<td><a href='../vista/editarpelicula.php?codigopelicula={$linea['codigopelicula']}'>Editar</a></td>";
	$tabla .= "<td><a href='../vista/eliminarpelicula.php?codigopelicula={$linea['codigopelicula']}'>Eliminar</a></td>";
}
$tabla .="</table>";
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
				<h2>PELICULAS</h2>
				<div class="divboton">
					<a href="../vista/agregarpelicula.php" class="boton">Nueva Pelicula</a>
				</div>
				<div>
					<?php echo $tabla; ?>
				</div>
				<div class="divboton">
					<a href="../vista/agregarpelicula.php" class="boton">Nueva Pelicula</a>
				</div>
			</div>
		</div>
		<div class="footer">
			<?php include('../vista/include/footer.php'); ?>
		</div>
	</div>
</body>
</html>