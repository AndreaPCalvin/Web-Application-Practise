<?php 
require_once __DIR__.'/includes/config.php';
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
	<title>Echar miembro</title>
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
		$miembro = $_GET['miembro'];

		if(DAOMiembro::deleteMember($miembro,$idGrupo)){
            header("location:GrupoConcreto?id=".$idGrupo); 
        }
        else echo "<p>error</p>";


	?>

</section>
</div>

</body>
</html>