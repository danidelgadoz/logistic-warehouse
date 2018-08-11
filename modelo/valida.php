<?php
session_start();

if (!($_SESSION['valido'] == 'ok')) {
	header('Location: ../vista/index.php');
	exit();
}
?>