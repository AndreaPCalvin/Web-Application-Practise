<?php 
require_once __DIR__.'/includes/config.php';
use es\fdi\ucm\aw\DAOGrupo as DAOGrupo;
use es\fdi\ucm\aw\DAOMiembro as DAOMiembro;

if (!isset($_SESSION["login"])) {
	header("location:index");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<title>Añadir miembro</title>
</head>
<body>

	<div class="contenedor">
	<?php
		require('includes/comun/cabecera.php');
	?>
	<section class="main">
	<?php
		require('includes/comun/menu_foro.php');
	?>

	
	<?php
		$idGrupo = $_GET['id'];
		$date = date("Y") . "-" . date("m") . "-" . date("d") . " " . date("H") . ":" . date("i") . ":" . date("s");
		$user = $_SESSION["usuario"];

		$added = DAOMiembro::addmember($user, $idGrupo, $date,"usuario");
		if ($added) {
			header("location:foro_grupos"); 
		}else{
			echo "<p>Error al añadir miembro</p>";
		}

		
	?>

</section>
</div>

</body>
</html>