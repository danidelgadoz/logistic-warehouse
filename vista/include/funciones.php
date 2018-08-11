<?php
function esValido() {
	@session_start();
	$valido = !empty($_SESSION['mensaje']) ? true : false;
	return $valido;
}
?>