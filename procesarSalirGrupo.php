<?php 
require_once __DIR__.'/includes/config.php';
use es\fdi\ucm\aw\DAOMiembro as DAOMiembro;
use es\fdi\ucm\aw\DAOGrupo as DAOGrupo;

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
		$idGrupo = $_GET['idGrupo'];
		
		$user = $_SESSION["usuario"];
		$grupo = DAOGrupo::buscar($idGrupo);
		$nomGrupo = $grupo->getnombreGrupo();

		$deleted = DAOMiembro::deleteMember($user, $idGrupo);

		if ($deleted) {
			$propietario = DAOMiembro::getPropietario($idGrupo);
			if($propietario == NULL){
				
				if(DAOMiembro::seleccionarPropietario($idGrupo)){
				
					header("location:foro_grupos");

				}else{

					header("location:foro_grupos");
				}
			}else{
				header("location:foro_grupos");
			}
					 
		}else{
			echo "<p>Error al salirse del grupo</p>";
		}

		
	?>

</section>
</div>

</body>
</html>