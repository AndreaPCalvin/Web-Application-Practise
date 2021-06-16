<?php 
require_once __DIR__.'/includes/config.php';
use es\fdi\ucm\aw\DAOGrupo as DAOGrupo;
use es\fdi\ucm\aw\DAOMiembro as DAOMiembro;
use es\fdi\ucm\aw\TOMiembro as TOMiembro;

if (!isset($_SESSION["login"])) {
	header("location:index");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link rel="stylesheet" type="text/css" href="css/general.css">
	<title>Lista miembros</title>
</head>
<body id="foro">

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
				<?php
					$idGrupo = $_GET['idGrupo'];
					$miembro = $_GET['miembro'];
					$user = $_SESSION["usuario"];

					$miembroClick = new TOMiembro();

					$grupo = DAOGrupo::buscar($idGrupo);
					$nomGrupo = $grupo->getnombreGrupo();

					

					$miembroClick = DAOMiembro::buscar($miembro,$idGrupo);
					$rolClick = $miembroClick->getrol();
					$miembroPropio = DAOMiembro::buscar($user,$idGrupo);
					$rolPropio = $miembroPropio->getrol();

					echo "<h1 class='content'>Grupo: ".$nomGrupo. "</h1>";

					echo "<p class='content'>Apodo del participante: ".$miembro. "</p>";
					echo "<p class='content'>Rol de ".$miembro." en el grupo: ".$rolClick. "</p>";


					if($rolPropio == "propietario"){
						if($rolClick == "moderador"){

							echo "<button class='buttonDefault' onclick=\"location.href='procesarCambiarRol?idGrupo=".$idGrupo."&miembro=".$miembro."&rol=usuario'\">Quitar de moderadores</button>";
							echo "<button class='buttonDefault' id='exit' onclick=\"location.href='procesarEcharGrupo?idGrupo=".$idGrupo."&miembro=".$miembro."'\">Expulsar del grupo</button>";
						}

						if($rolClick == "usuario"){
							echo "<button class='buttonDefault' id='nuevo' onclick=\"location.href='procesarCambiarRol?idGrupo=".$idGrupo."&miembro=".$miembro."&rol=moderador'\">Añadir a moderadores</button>";
							echo "<button class='buttonDefault' id='exit' onclick=\"location.href='procesarEcharGrupo?idGrupo=".$idGrupo."&miembro=".$miembro."'\">Expulsar del grupo</button>";
						}
					}else if($rolPropio == "moderador"){

						if($rolClick == "usuario"){
							echo "<button class='buttonDefault' id='exit' onclick=\"location.href='procesarEcharGrupo?idGrupo=".$idGrupo."&miembro=".$miembro."'\">Expulsar del grupo</button>";
						}
					}
					echo "<button class='buttonDefault' onclick=\"location.href='GrupoConcreto?id=".$idGrupo."'\">Volver</button>";	
				?>
			</div>
		</div>
	</div>
</body>
</html>