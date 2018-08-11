<?php
include('../modelo/conexion.php');
include('../modelo/valida.php');

$enlace = "<a href='../modelo/logout.php'>Cerrar Sesion</a>";

$anho = $_POST['anho'];
$stockini = $_POST['stockini'];
$stockfin = $_POST['stockfin'];
$genero = $_POST['genero'];
$productora = $_POST['idproductora'];

if ($anho=='' && $stockfin == '' && $stockini == '' && $genero == 'tgeneros' && $productora == 'tproductoras') {
	$consulta = "select * from pelicula p, genero g, productora d where p.idgenero=g.genero and p.idproductora=d.idproductora";
} else {
	if ($anho!=='' && $stockfin == '' && $stockini == '' && $genero == 'tgeneros' && $productora == 'tproductoras') {
		$consulta = "select * from pelicula p, genero g, productora d where p.idgenero=g.genero and p.idproductora=d.idproductora and p.anho='$anho'";
	} else {
		if ( $anho=='' && $stockfin !== '' && $stockini !== '' && $genero == 'tgeneros' && $productora == 'tproductoras' ) {
			$consulta = "select * from pelicula p, genero g, productora d where p.idgenero=g.genero and p.idproductora=d.idproductora and p.stock between '$stockini' and '$stockfin'  ";
		} else {
			if ( $anho=='' && $stockfin == '' && $stockini == '' && $genero !== 'tgeneros' && $productora == 'tproductoras' ) {
				$consulta = "select * from pelicula p, genero g, productora d where p.idgenero=g.genero and p.idproductora=d.idproductora and p.idgenero=$genero";	
			} else {
				if ( $anho=='' && $stockfin == '' && $stockini == '' && $genero == 'tgeneros' && $productora !== 'tproductoras' ) {
					$consulta = "select * from pelicula p, genero g, productora d where p.idgenero=g.genero and p.idproductora=d.idproductora and p.idproductora=$productora";
				} else {
					if ( $anho !=='' && $stockfin !== '' && $stockini !== '' && $genero == 'tgeneros' && $productora == 'tproductoras' ) {
						$consulta = "select * from pelicula p, genero g, productora d where p.idgenero=g.genero and p.idproductora=d.idproductora and p.anho='$anho' and p.stock between '$stockini' and '$stockfin'" ;
					}
				} if ( $anho =='' && $stockfin !== '' && $stockini !== '' && $genero !== 'tgeneros' && $productora == 'tproductoras' ) {
					$consulta = "select * from pelicula p, genero g, productora d where p.idgenero=g.genero and p.idproductora=d.idproductora and p.idgenero='$genero' and p.stock between '$stockini' and '$stockfin'" ;
				} else {
					if ( $anho =='' && $stockfin == '' && $stockini == '' && $genero !== 'tgeneros' && $productora !== 'tproductoras'  ) {
						$consulta = "select * from pelicula p, genero g, productora d where p.idgenero=g.genero and p.idproductora=d.idproductora and p.idgenero='$genero' and p.idproductora=$productora";
					} else {
						if ( $anho !=='' && $stockfin == '' && $stockini == '' && $genero !== 'tgeneros' && $productora == 'tproductoras' ) {
							$consulta = "select * from pelicula p, genero g, productora d where p.idgenero=g.genero and p.idproductora=d.idproductora and p.idgenero='$genero' and p.anho='$anho'";
						} else {
							if ( $anho =='' && $stockfin !== '' && $stockini !== '' && $genero == 'tgeneros' && $productora !== 'tproductoras' ) {
								$consulta = "select * from pelicula p, genero g, productora d where p.idgenero=g.genero and p.idproductora=d.idproductora and p.stock between '$stockini' and '$stockfin' and p.idproductora=$productora";
							} else {
								if ( $anho !=='' && $stockfin == '' && $stockini == '' && $genero == 'tgeneros' && $productora !== 'tproductoras' ) {
									$consulta = "select * from pelicula p, genero g, productora d where p.idgenero=g.genero and p.idproductora=d.idproductora and p.anho='$anho' and p.idproductora=$productora";
								} else {
									if ( $anho !=='' && $stockfin !== '' && $stockini !== '' && $genero !== 'tgeneros' && $productora == 'tproductoras') {
										$consulta = "select * from pelicula p, genero g, productora d where p.idgenero=g.genero and p.idproductora=d.idproductora and p.anho='$anho' and p.idgenero='$genero' and p.stock between '$stockini' and '$stockfin'";
									} else {
										if ( $anho =='' && $stockfin !== '' && $stockini !== '' && $genero !== 'tgeneros' && $productora !== 'tproductoras' ) {
											$consulta = "select * from pelicula p, genero g, productora d where p.idgenero=g.genero and p.idproductora=d.idproductora and p.idproductora=$productora and p.idgenero='$genero' and p.stock between '$stockini' and '$stockfin'";
										} else { 
											if ( $anho !=='' && $stockfin !== '' && $stockini !== '' && $genero == 'tgeneros' && $productora !== 'tproductoras' ) {
												$consulta = "select * from pelicula p, genero g, productora d where p.idgenero=g.genero and p.idproductora=d.idproductora and p.idproductora=$productora and p.anho='$anho' and p.stock between '$stockini' and '$stockfin'";
											} else {
												if ( $anho !=='' && $stockfin == '' && $stockini == '' && $genero !== 'tgeneros' && $productora !== 'tproductoras' ) {
													$consulta = "select * from pelicula p, genero g, productora d where p.idgenero=g.genero and p.idproductora=d.idproductora and p.idproductora=$productora and p.idgenero='$genero' and p.anho='$anho' ";
												} else {
													if ( $anho !=='' && $stockfin !== '' && $stockini !== '' && $genero !== 'tgeneros' && $productora !== 'tproductoras' ) {
														$consulta = "select * from pelicula p, genero g, productora d where p.idgenero=g.genero and p.idproductora=d.idproductora and p.idproductora=$productora and p.idgenero='$genero' and p.anho='$anho' and p.stock between '$stockini' and '$stockfin'";
													}
												}
											}
										}
									}
								}
							}
						}
					}
				}
			}
		}
	}
}

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
        <title> Usuario : <?php echo $_SESSION['usuario'];?> - Fecha : <?php date_default_timezone_set('America/Lima'); echo date("d-m-Y");?> - Hora : <?php  date_default_timezone_set('America/Lima');  echo date("H-i a");?> </title>
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
		<div class="content">
			<div class="main">

				<table border="0">
					<tr>
						<td align = "left"> <img src = "../vista/images/loguito.jpg"></img>
						</td>
						<td> 
						</td>
						<td align="right">  Usuario : <?php echo $_SESSION['usuario'];?> <br> Fecha : <?php date_default_timezone_set('America/Lima'); echo date("d/m/Y");?> <br>  Hora : <?php date_default_timezone_set('America/Lima'); echo date("H:i a");?>
						</td>
					</tr>
				</table>
				
				<h2>Catalogo de Peliculas</h2>	
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