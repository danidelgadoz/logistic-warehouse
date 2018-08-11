<?php
date_default_timezone_set('America/Lima');//Esto es para capturar la zona horaria de Lima
/*************************************
 Devuelve una cadena con la fecha que se
 le manda como parámetro en formato largo.
 *************************************/
function FechaFormateada2($FechaStamp){
	$ano = date('Y',$FechaStamp);
	$mes = date('n',$FechaStamp);
	$dia = date('d',$FechaStamp);
	$diasemana = date('w',$FechaStamp);
	 
	$diassemanaN = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
	$mesesN=array(1=>"Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
	return $diassemanaN[$diasemana].", $dia de ". $mesesN[$mes] ." del $ano";
}

//Para utilizar la función, se le manda una fecha como parámetro, por ejemplo, si se quisiera imprimir la fecha actual, utilizaríamos el siguiente código:
//echo FechaFormateada2($fecha);
$fecha = time();
/*
Perfiles de Usuarios:
1 - Administrador : todo
2 - RR.HH. : personal
3 - Operador : registro de peliculas, transacciones de almacen
*/
?>
<ul class="menu">
	<li><a href="#"><?php echo FechaFormateada2($fecha); ?></a></li>
	<li style="margin-left: 100px;"><a href="main.php">Home</a></li>
	<?php if ($_SESSION['idperfil'] == '1') { ?>
	<li class="separator"></li>
	<li><a href="#">Transacciones</a>
		<div class="drop decor3_2 dropToLeft2" style="width: 320px;">
			<div class="left">
				<b>Movimientos</b>
				<div>
					<a href="regmovimiento.php">E / S de Peliculas</a><br>
				</div>
			</div>
			<div class="left" style="text-align:right; width:150px;">
				<img src="images/transaccion.png">
			</div>
		</div>
	</li>
	<li class="separator"></li>
	<li><a href="#">Reportes</a>
		<div class="drop decor3_2 dropToLeft2" style="width: 320px;">
			<div class="left">
				<b>Transacciones</b>
				<div>
					<a href="prereportemovi.php">Movimientos</a><br>
				</div>
				<b>Catalogos</b>
				<div>
					<a href="prereportepeli.php">Peliculas</a><br>
				</div>
			</div>
			<div class="left" style="text-align:right; width:150px;">
				<img src="images/reporte.png">
			</div>
		</div>
	</li>	

	<li class="separator"></li>
	<li><a href="#">Mantenimiento</a>
		<div class="drop decor3_2 dropToLeft2" style="width: 320px;">
			<div class="left">
				<b>Mantenimiento</b>
				<div>
					<a href="usuarios.php">Usuarios</a><br>
					<a href="proveedores.php">Clientes</a><br>
					<a href="pelicula.php">Peliculas</a><br>
					<a href="empleado.php">Empleados</a><br>
				</div>
			</div>
			<div class="left" style="text-align:right; width:150px;">
				<img src="images/mantenimiento.png">
			</div>
		</div>
	</li>

	<li class="separator"></li>
	<li><a href="#">Seguridad</a>
		<div class="drop decor3_2 dropToLeft2" style="width: 320px;">
			<div class="left">
				<b>Seguridad</b>
				<div>
					<a href="logaudi.php">Log de Auditoría</a><br>
					<a href="backuprestore.php">Backup y Restore</a><br>
				</div>
			</div>
			<div class="left" style="text-align:right; width:150px;">
				<img src="images/seguridad.png">
			</div>
		</div>
	</li>

	<?php } else { ?>
	<?php if ($_SESSION['idperfil'] == '2') { ?>
	<li class="separator"></li>
	<li><a href="#">Mantenimiento</a>
		<div class="drop decor3_2 dropToLeft2" style="width: 320px;">
			<div class="left">
				<b>Mantenimiento</b>
				<div>
					<a href="empleado.php">Empleado</a><br>
				</div>
			</div>
			<div class="left" style="text-align:right; width:150px;">
				<img src="images/mantenimiento.png">
			</div>
		</div>
	</li>	
	<?php } else { ?>


	
	<?php if ($_SESSION['idperfil'] == '3') { ?>
	<li class="separator"></li>
	<li><a href="#">Transacciones</a>
		<div class="drop decor3_2 dropToLeft2" style="width: 320px;">
			<div class="left">
				<b>Movimientos</b>
				<div>
					<a href="regmovimiento.php">E / S de Peliculas</a><br>
				</div>
			</div>
			<div class="left" style="text-align:right; width:150px;">
				<img src="images/transaccion.png">
			</div>
		</div>
	</li>
	<li class="separator"></li>
	<li><a href="#">Reportes</a>
		<div class="drop decor3_2 dropToLeft2" style="width: 320px;">
			<div class="left">
				<b>Transacciones</b>
				<div>
					<a href="prereportemovi.php">Movimientos</a><br>
				</div>
				<b>Catalogos</b>
				<div>
					<a href="prereportepeli.php">Peliculas</a><br>
				</div>
			</div>
			<div class="left" style="text-align:right; width:150px;">
				<img src="images/reporte.png">
			</div>
		</div>
	</li>
	<li class="separator"></li>
	<li><a href="#">Mantenimiento</a>
		<div class="drop decor3_2 dropToLeft2" style="width: 320px;">
			<div class="left">
				<b>Mantenimiento</b>
				<div>
					<a href="proveedores.php">Clientes</a><br>
					<a href="pelicula.php">Peliculas</a><br>
				</div>
			</div>
			<div class="left" style="text-align:right; width:150px;">
				<img src="images/mantenimiento.png">
			</div>
		</div>
	</li>
	<?php } ?>
	<?php } ?>
	<?php } ?>
</ul>