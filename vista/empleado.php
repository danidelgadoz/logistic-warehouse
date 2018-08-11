<?php
include('../modelo/conexion.php');
include('../modelo/valida.php');

$enlace = "<a href='../modelo/logout.php'>Cerrar Sesion</a>";

$query = "select * from empleado";
$listEmpleado = $conexion->query($query);

$tabla = "<table class='marco'>";
$tabla .= <<<FIN
<tr>
<th>Id</th>
<th>Nombres</th>
<th>Apellidos</th>
<th>DNI</th>
<th>Telefono1</th>
<th>Telefono2</th>
</tr>
FIN;

while ($linea = $listEmpleado->fetch_assoc()) {
	$tabla .= "<tr>";
	$tabla .= "<td>{$linea['idempleado']}</td>";
	$tabla .= "<td>{$linea['nombres']}</td>";
	$tabla .= "<td>{$linea['apellidopat']} {$linea['apellidomat']}</td>";
	$tabla .= "<td>{$linea['dni']}</td>";
	$tabla .= "<td>{$linea['telefono1']}</td>";
	$tabla .= "<td>{$linea['telefono2']}</td>";
	$tabla .= "</tr>";
}
$tabla .="</table>";
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
				<h2>Empleados</h2>
				<div>
				<?php echo $tabla; ?>
				</div>
				<div class="divboton">
					<a href="../vista/agregarempleado.php" class="boton">Nuevo Empleado</a>
				</div>
			</div>
		</div>
		<div class="footer">
			<?php include('../vista/include/footer.php'); ?>
		</div>
	</div>
</body>
</html>