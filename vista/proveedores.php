<?php
include('../modelo/conexion.php');
include('../modelo/valida.php');

$enlace = "<a href='../modelo/logout.php'>Cerrar Sesion</a>";

$consulta = "select * from proveedor";
$listproveedor = $conexion->query($consulta);

$tabla = "<table class='marco'>";
$tabla .= <<<FIN
<tr>
<th>Nro</th>
<th>Razon Social</th>
<th>RUC</th>
<th>Distrito</th>
<th>Cod.Postal</th>
<th>Telefono</th>
<th colspan=3>Acción</th>
</tr>
FIN;

while ($linea = $listproveedor->fetch_assoc()) {
	$tabla .= "<tr>";
	$tabla .= "<td>{$linea['idproveedor']}</td>";
	$tabla .= "<td>{$linea['razonsocial']}</td>";
	$tabla .= "<td>{$linea['ruc']}</td>";
	$tabla .= "<td>{$linea['provincia']}</td>";
	$tabla .= "<td>{$linea['codigopostal']}</td>";
	$tabla .= "<td>{$linea['telefono']}</td>";
	$tabla .= "<td><a href='../vista/verproveedor.php?idproveedor={$linea['idproveedor']}'>Ver</a></td>";
	$tabla .= "<td><a href='../vista/editarproveedor.php?idproveedor={$linea['idproveedor']}'>Editar</a></td>";
	$tabla .= "<td><a href='../vista/eliminarproveedor.php?idproveedor={$linea['idproveedor']}'>Eliminar</a></td>";
	$tabla .= "</tr>";
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
				<h2>Clientes</h2>
				<div>
					<?php echo $tabla; ?>
				</div>
				<div class="divboton">
					<a href="../vista/agregarproveedor.php" class="boton">Nuevo Cliente</a>
				</div>
			</div>
		</div>
		<div class="footer">
			<?php include('../vista/include/footer.php'); ?>
		</div>
	</div>
</body>
</html>