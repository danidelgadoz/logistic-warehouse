<?php
include('../modelo/conexion.php');
include('../modelo/valida.php');

$enlace = "<a href='../modelo/logout.php'>Cerrar Sesion</a>";

$fechaini = !empty($_POST['fechaini'])? $_POST['fechaini'] : '';
$fechafin = !empty($_POST['fechafin'])? $_POST['fechafin'] : '';
$nombre = $_POST['pelicula'];
$cliente = $_POST['idproveedor'];
$tipomovimiento = $_POST['tipomovimiento'];

if ($nombre=='tpeliculas' && $fechafin == '' && $fechaini == '' && $cliente == 'tclientes' && $tipomovimiento == 'tmovimientos') {
  $query = "select m.nromovimiento, m.tipomovimiento, m.fechmovimiento, m.horamovimiento, m.usuario, m.stock, m.codigopelicula, p.nombrec, d.nombre from movimiento m , pelicula d, proveedor p where m.codigopelicula= d.codigopelicula and p.idproveedor= m.idproveedor";
} else {
	if ($nombre !== 'tpeliculas' && $fechafin == '' && $fechaini == '' && $cliente == 'tclientes' && $tipomovimiento == 'tmovimientos') {
		$query = "select m.nromovimiento, m.tipomovimiento, m.fechmovimiento, m.horamovimiento, m.usuario, m.stock, m.codigopelicula, p.nombrec, d.nombre from movimiento m , pelicula d, proveedor p where m.codigopelicula= d.codigopelicula and p.idproveedor= m.idproveedor and d.codigopelicula='$nombre'";
	} else {
		if ( $nombre=='tpeliculas' && $fechafin !== '' && $fechaini !== '' && $cliente == 'tclientes' && $tipomovimiento == 'tmovimientos' ) {
			$query = "select m.nromovimiento, m.tipomovimiento, m.fechmovimiento, m.horamovimiento, m.usuario, m.stock, m.codigopelicula, p.nombrec, d.nombre from movimiento m , pelicula d, proveedor p where m.codigopelicula= d.codigopelicula and p.idproveedor= m.idproveedor and m.fechmovimiento between '$fechaini' and '$fechafin'";
		} else {
			if ( $nombre=='tpeliculas' && $fechafin == '' && $fechaini == '' && $cliente !== 'tclientes' && $tipomovimiento == 'tmovimientos' ) {
				$query = "select m.nromovimiento, m.tipomovimiento, m.fechmovimiento, m.horamovimiento, m.usuario, m.stock, m.codigopelicula, p.nombrec, d.nombre from movimiento m , pelicula d, proveedor p where m.codigopelicula= d.codigopelicula and p.idproveedor= m.idproveedor and p.idproveedor = '$cliente'";
			} else {
				if ( $nombre=='tpeliculas' && $fechafin == '' && $fechaini == '' && $cliente == 'tclientes' && $tipomovimiento !== 'tmovimientos' ) {
					$query = "select m.nromovimiento, m.tipomovimiento, m.fechmovimiento, m.horamovimiento, m.usuario, m.stock, m.codigopelicula, p.nombrec, d.nombre from movimiento m , pelicula d, proveedor p where m.codigopelicula= d.codigopelicula and p.idproveedor= m.idproveedor and m.tipomovimiento= '$tipomovimiento' ";
				} else {
					if ( $nombre !=='tpeliculas' && $fechafin !== '' && $fechaini !== '' && $cliente == 'tclientes' && $tipomovimiento == 'tmovimientos' ) {
						$query = "select m.nromovimiento, m.tipomovimiento, m.fechmovimiento, m.horamovimiento, m.usuario, m.stock, m.codigopelicula, p.nombrec, d.nombre from movimiento m , pelicula d, proveedor p where m.codigopelicula= d.codigopelicula and p.idproveedor= m.idproveedor and m.fechmovimiento between '$fechaini' and '$fechafin' and d.codigopelicula='$nombre'";
					}
				} if ( $nombre =='tpeliculas' && $fechafin !== '' && $fechaini !== '' && $cliente !== 'tclientes' && $tipomovimiento == 'tmovimientos' ) {
					$query = "select m.nromovimiento, m.tipomovimiento, m.fechmovimiento, m.horamovimiento, m.usuario, m.stock, m.codigopelicula, p.nombrec, d.nombre from movimiento m , pelicula d, proveedor p where m.codigopelicula= d.codigopelicula and p.idproveedor= m.idproveedor and m.fechmovimiento between '$fechaini' and '$fechafin' and p.idproveedor = '$cliente' ";
				} else {
					if ( $nombre =='tpeliculas' && $fechafin == '' && $fechaini == '' && $cliente !== 'tclientes' && $tipomovimiento !== 'tmovimientos'  ) {
						$query = "select m.nromovimiento, m.tipomovimiento, m.fechmovimiento, m.horamovimiento, m.usuario, m.stock, m.codigopelicula, p.nombrec, d.nombre from movimiento m , pelicula d, proveedor p where m.codigopelicula= d.codigopelicula and p.idproveedor= m.idproveedor and p.idproveedor = '$cliente' and m.tipomovimiento= '$tipomovimiento'";
					} else {
						if ( $nombre !=='tpeliculas' && $fechafin == '' && $fechaini == '' && $cliente !== 'tclientes' && $tipomovimiento == 'tmovimientos' ) {
							$query = "select m.nromovimiento, m.tipomovimiento, m.fechmovimiento, m.horamovimiento, m.usuario, m.stock, m.codigopelicula, p.nombrec, d.nombre from movimiento m , pelicula d, proveedor p where m.codigopelicula= d.codigopelicula and p.idproveedor= m.idproveedor and p.idproveedor = '$cliente' and d.codigopelicula='$nombre' ";
						} else {
							if ( $nombre =='tpeliculas' && $fechafin !== '' && $fechaini !== '' && $cliente == 'tclientes' && $tipomovimiento !== 'tmovimientos' ) {
								$query = "select m.nromovimiento, m.tipomovimiento, m.fechmovimiento, m.horamovimiento, m.usuario, m.stock, m.codigopelicula, p.nombrec, d.nombre from movimiento m , pelicula d, proveedor p where m.codigopelicula= d.codigopelicula and p.idproveedor= m.idproveedor and m.tipomovimiento= '$tipomovimiento' and m.fechmovimiento between '$fechaini' and '$fechafin' ";
							} else {
								if ( $nombre !=='tpeliculas' && $fechafin == '' && $fechaini == '' && $cliente == 'tclientes' && $tipomovimiento !== 'tmovimientos' ) {
									$query = "select m.nromovimiento, m.tipomovimiento, m.fechmovimiento, m.horamovimiento, m.usuario, m.stock, m.codigopelicula, p.nombrec, d.nombre from movimiento m , pelicula d, proveedor p where m.codigopelicula= d.codigopelicula and p.idproveedor= m.idproveedor and d.codigopelicula='$nombre' and m.tipomovimiento= '$tipomovimiento' ";
								} else {
									if ( $nombre !=='tpeliculas' && $fechafin !== '' && $fechaini !== '' && $cliente !== 'tclientes' && $tipomovimiento == 'tmovimientos') {
										$query = "select m.nromovimiento, m.tipomovimiento, m.fechmovimiento, m.horamovimiento, m.usuario, m.stock, m.codigopelicula, p.nombrec, d.nombre from movimiento m , pelicula d, proveedor p where m.codigopelicula= d.codigopelicula and p.idproveedor= m.idproveedor and d.codigopelicula='$nombre' and m.fechmovimiento between '$fechaini' and '$fechafin' and p.idproveedor = '$cliente'";
									} else {
										if ( $nombre =='tpeliculas' && $fechafin !== '' && $fechaini !== '' && $cliente !== 'tclientes' && $tipomovimiento !== 'tmovimientos' ) {
											$query = "select m.nromovimiento, m.tipomovimiento, m.fechmovimiento, m.horamovimiento, m.usuario, m.stock, m.codigopelicula, p.nombrec, d.nombre from movimiento m , pelicula d, proveedor p where m.codigopelicula= d.codigopelicula and p.idproveedor= m.idproveedor and m.fechmovimiento between '$fechaini' and '$fechafin' and p.idproveedor = '$cliente' and m.tipomovimiento= '$tipomovimiento' ";
										} else { 
											if ( $nombre !=='tpeliculas' && $fechafin !== '' && $fechaini !== '' && $cliente == 'tclientes' && $tipomovimiento !== 'tmovimientos' ) {
												$query = "select m.nromovimiento, m.tipomovimiento, m.fechmovimiento, m.horamovimiento, m.usuario, m.stock, m.codigopelicula, p.nombrec, d.nombre from movimiento m , pelicula d, proveedor p where m.codigopelicula= d.codigopelicula and p.idproveedor= m.idproveedor and m.fechmovimiento between '$fechaini' and '$fechafin' and d.codigopelicula='$nombre' and m.tipomovimiento= '$tipomovimiento' ";
											} else {
												if ( $nombre !=='tpeliculas' && $fechafin == '' && $fechaini == '' && $cliente !== 'tclientes' && $tipomovimiento !== 'tmovimientos' ) {
													$query = "select m.nromovimiento, m.tipomovimiento, m.fechmovimiento, m.horamovimiento, m.usuario, m.stock, m.codigopelicula, p.nombrec, d.nombre from movimiento m , pelicula d, proveedor p where m.codigopelicula= d.codigopelicula and p.idproveedor= m.idproveedor and d.codigopelicula='$nombre' and m.tipomovimiento= '$tipomovimiento' and p.idproveedor = '$cliente'";
												} else {
													if ( $nombre !=='tpeliculas' && $fechafin !== '' && $fechaini !== '' && $cliente !== 'tclientes' && $tipomovimiento !== 'tmovimientos' ) {
														$query = "select m.nromovimiento, m.tipomovimiento, m.fechmovimiento, m.horamovimiento, m.usuario, m.stock, m.codigopelicula, p.nombrec, d.nombre from movimiento m , pelicula d, proveedor p where m.codigopelicula= d.codigopelicula and p.idproveedor= m.idproveedor and d.codigopelicula='$nombre' and m.tipomovimiento= '$tipomovimiento' and p.idproveedor = '$cliente' and m.fechmovimiento between '$fechaini' and '$fechafin' ";
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

$listMovimiento = $conexion->query($query);
$tabla = "<table id='datatables' class='marco'>";
$tabla .= <<<FIN
<thead>
<tr>
<th>Codigo Mov.</th>
<th>Codigo Pelicula</th>
<th>Nombre Pelicula</th>
<th>Nombre Cine</th>
<th>Cantidad</th>
<th>Tipo Mov.</th>
<th>Fecha Mov.</th>
<th>Hora Mov.</th>
</tr>
</head>
<tbody>

FIN;
// style='display: none;'
while ($linea = $listMovimiento->fetch_assoc()) {
	$tabla .= "<tr>";
	$tabla .= "<td>{$linea['nromovimiento']}</td>";
	$tabla .= "<td>{$linea['codigopelicula']}</td>";
	$tabla .= "<td>{$linea['nombre']}</td>";
	$tabla .= "<td>{$linea['nombrec']}</td>";
	$tabla .= "<td>{$linea['stock']}</td>";
	$tabla .= "<td>{$linea['tipomovimiento']}</td>";
	$tabla .= "<td>{$linea['fechmovimiento']}</td>";
	$tabla .= "<td>{$linea['horamovimiento']}</td>";
	$tabla .= "</tr>";
}
$tabla .="</tbody>";
$tabla .="</table>";


?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
        <title>
        	Usuario : <?php echo $_SESSION['usuario'];?> - Fecha : <?php date_default_timezone_set('America/Lima'); echo date("d-m-Y");?> - Hora : <?php  date_default_timezone_set('America/Lima');  echo date("H-i a");?>
        </title>

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
            $('#datatables').dataTable({
            	"bJQueryUI":true,
                "sPaginationType":"full_numbers",
                "aaSorting":[[6, "desc"],[7, "desc"] ],
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
						<td align="right">  Usuario : <?php echo $_SESSION['usuario'];?> <br> Fecha : <?php date_default_timezone_set('America/Lima'); echo date("d/m/Y");?> <br>  Hora : <?php  date_default_timezone_set('America/Lima');  echo date("H:i a");?>
						</td>
					</tr>
				</table>

				<h2>Reporte de Movimientos</h2>	
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