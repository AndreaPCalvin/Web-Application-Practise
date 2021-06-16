<?php 
require_once __DIR__.'/includes/config.php';
use es\fdi\ucm\aw\DAOGrupo as DAOGrupo;
use es\fdi\ucm\aw\DAOMiembro as DAOMiembro;
use es\fdi\ucm\aw\FormAddMiembro as FormAddMiembro;

if (!isset($_SESSION["login"])) {
	header("location:index");
}

if(isset($_GET['id'])){
	$_SESSION['grupo'] = htmlspecialchars(trim(strip_tags($_GET['id'])));
}
$idGrupo =	$_SESSION['grupo'];
$form = new FormAddMiembro();
$html = $form->gestiona();

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link rel="stylesheet" type="text/css" href="css/general.css">
	<title>Añadir miembro</title>
</head>
<body id='foro'>
	<div class="contenedor">
			<?php
				require('includes/comun/cabecera.php');
			?>
			<div class="principal">
				<div class="nav">
					<?php
						require('includes/comun/menu_foro.php');
					?>
				</div>
				<div class="content">

	
<?= $html ?>

					<?php

					
						echo "<button class='buttonDefault' onclick=\"location.href='GrupoConcreto?id=".$idGrupo."'\">Volver</button>";						
					?>
						
				</div>
			</div>
	</div>
</body>
</html>