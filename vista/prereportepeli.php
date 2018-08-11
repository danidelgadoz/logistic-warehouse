<?php
include('../modelo/conexion.php');
include('../modelo/valida.php');

$enlace = "<a href='../modelo/logout.php'>Cerrar Sesion</a>";

$consultgenero = "select * from genero";
$resultgenero = $conexion->query($consultgenero);
$genero = "<select id='genero' name='genero'>";
$genero .= "<option value='tgeneros'>TODOS LOS GENEROS</option>";
while ($linea = $resultgenero->fetch_assoc()) {
	$genero .= "<option value={$linea['genero']}>{$linea['descripcion']}</option>";
}
$genero .= "</select>";

$consultProd = "select * from productora";
$resultProd = $conexion->query($consultProd);
$productora = "<select id='idproductora' name='idproductora'>";
$productora .= "<option value='tproductoras'>TODOS LAS PRODUCTORAS</option>";
while ($linea = $resultProd->fetch_assoc()) {
	$productora .= "<option value={$linea['idproductora']}>{$linea['nombrep']}</option>";
}
$productora .= "</select>";

$consulta = "select * from pelicula p, genero g, productora d where p.idgenero=g.genero and p.idproductora=d.idproductora";
$listpelicula = $conexion->query($consulta);

$tabla = "<table id='catalogo' class='marco'>";
$tabla .= <<<FIN
<thead>
<tr>
<th>Id</th>
<th>Nombre</th>
<th>Genero</th>
<th>Productora</th>
<th>Año</th>
<th>Precio</th>
<th>Stock</th>
</tr>
</thead>
<tbody>
FIN;

while ($linea = $listpelicula->fetch_assoc()) {
	$tabla .= "<tr>";
	$tabla .= "<td>{$linea['codigopelicula']}</td>";
	$tabla .= "<td>{$linea['nombre']}</td>";
	$tabla .= "<td>{$linea['descripcion']}</td>";
	$tabla .= "<td>{$linea['nombrep']}</td>";
	$tabla .= "<td>{$linea['anho']}</td>";
	$tabla .= "<td>{$linea['preciounit']}</td>";
	$tabla .= "<td>{$linea['stock']}</td>";
}
$tabla .="</tbody>";
$tabla .="</table>";
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
        <script src="../controlador/js/jquery.dataTables.js" type="text/javascript"></script>
        <script src="../controlador/js/TableTools.min.js" type="text/javascript"></script>
        <style type="text/css">
            @import "../vista/css/demo_table_jui.css";
            @import "../vista/css/TableTools.css";
        </style>
        </script>

    <script>
	function justNumbers(e) {
		var keynum = window.event ? window.event.keyCode : e.which;
		if ( keynum == 8 ) return true;
		return /\d/.test(String.fromCharCode(keynum));
	}
	</script>

	<script type="text/javascript" charset="utf-8">
        $(document).ready(function(){
            $('#catalogo').dataTable({
            	"bJQueryUI":true,
                "sPaginationType":"full_numbers",
                "aaSorting":[[0, "asc"]],
                "sDom": 'T<"clear"><"H"lfr>t<"F"ip>',
                "oTableTools": {
				"sSwfPath": "../controlador/swf/copy_csv_xls_pdf.swf"
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
				<h2>Catalogo de Peliculas</h2>

			<form action="../vista/catalogo.php" method="POST">
				
				<div class="divboton">
					<input type="submit" class="boton" value="Consultar por Filtros">
				</div>

			</form>

				<div>
					<?php echo $tabla; ?>
				</div>
			</div>
		</div>
		<div class="footer">
			<?php include('../vista/include/footer.php'); ?>
		</div>
	</div>
</body>
</html>