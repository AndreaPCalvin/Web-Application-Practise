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
	<title>Cambiar Rol</title>
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
		$idGrupo = $_GET['idGrupo'];
		$nomMiembro = $_GET['miembro'];
		$rol = $_GET['rol'];


		if(DAOMiembro::cambiarRol($nomMiembro, $idGrupo, $rol)){
			header("location:procesarOperaciones?miembro=".$nomMiembro."&idGrupo=".$idGrupo); 
		}else{
			echo "Error al cambiar rol";
		}







	?>

</section>
</div>

</body>
</html>