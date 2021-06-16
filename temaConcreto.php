<?php
require_once __DIR__.'/includes/config.php';
use es\fdi\ucm\aw\DAOTema as DAOTema;
use es\fdi\ucm\aw\DAORespuesta as DAORespuesta;
use es\fdi\ucm\aw\DAOGrupo as DAOGrupo;
use es\fdi\ucm\aw\DAOMiembro as DAOMiembro;
use es\fdi\ucm\aw\FormCrearRespuesta as FormCrearRespuesta;

if (!isset($_SESSION["login"])) {
	header("location:index.php");
}

$form = new FormCrearRespuesta();
$html = $form->gestiona();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link rel="stylesheet" type="text/css" href="css/general.css">	
	<link rel="stylesheet" type="text/css" href="css/comentariosForo.css">
	<title>
		Tema
	</title>
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
					   if(isset($_GET['id'])){
					   	$_SESSION['tema'] = htmlspecialchars(trim(strip_tags($_GET['id'])));
					   }
					   $id = $_SESSION['tema'];
					   $tema = DAOTema::buscar($id);
					   $idGrupo = $tema->getid_grupo();
					   $grupo = DAOGrupo::buscar($idGrupo);
					   $creador = $grupo->getcreadorGrupo();
					   $user = $_SESSION["usuario"];

					   echo "<h1 class='content'>Título del tema: ".$tema->gettitulo()."</h1>";
					   echo "<h2 class='content'>Descripción del tema: ".$tema->getdescripcion()."</h2>";
					  
					  ?> 

<?= $html ?>
						
<?php
					    echo "<h2 class='content'>Comentarios: </h2>";
					   $respuestas = DAORespuesta::listar();

					   if ($respuestas == NULL) {
						echo "<p class='content'>Aún no hay comentarios</p>";

					   }else{

						for ($i=0; $i < sizeof($respuestas); $i++) { 

							if($respuestas[$i]->getborrado() == 0){
								if ($tema->getidTema() == $respuestas[$i]->getid_tema()) {
									echo "<div class='comentario'>";
									echo "<div class='usuarioYfecha'>".$respuestas[$i]->getescritor()." dijo el ".$respuestas[$i]->getfecha()."</div>";
									echo "<div class='contenido'>".$respuestas[$i]->getcontenido()."</div>";

									if(DAOMiembro::isPropietario($user,$idGrupo)){

										if(DAOMiembro::isUser($respuestas[$i]->getescritor(),$idGrupo) || DAOMiembro::isMod($respuestas[$i]->getescritor(),$idGrupo)){
											echo "<button class='buttonDefault' id='borrarComentario' onclick=\"location.href='procesarBorradoRespuesta?tema=".$tema->getidTema()."&id=".$respuestas[$i]->getidRespuesta()."'\">Borrar</button>";
										}
										if($respuestas[$i]->getescritor() == $user){
											echo "<button class='buttonDefault' id='borrarComentario' onclick=\"location.href='procesarBorradoRespuesta?tema=".$tema->getidTema()."&id=".$respuestas[$i]->getidRespuesta()."'\">Borrar</button>";
										}


									}else if(DAOMiembro::isMod($user,$idGrupo)){
										if(DAOMiembro::isUser($respuestas[$i]->getescritor(),$idGrupo)){
											echo "<button class='buttonDefault' id='borrarComentario' onclick=\"location.href='procesarBorradoRespuesta?tema=".$tema->getidTema()."&id=".$respuestas[$i]->getidRespuesta()."'\">Borrar</button>";
										}
										if($respuestas[$i]->getescritor() == $user){
											echo "<button class='buttonDefault' id='borrarComentario' onclick=\"location.href='procesarBorradoRespuesta?tema=".$tema->getidTema()."&id=".$respuestas[$i]->getidRespuesta()."'\">Borrar</button>";
										}
									}else if($respuestas[$i]->getescritor() == $user){
										echo "<button class='buttonDefault' id='borrarComentario' onclick=\"location.href='procesarBorradoRespuesta?tema=".$tema->getidTema()."&id=".$respuestas[$i]->getidRespuesta()."'\">Borrar</button>";

									}
									echo"</div>";
								}
							}
						}
					   }
						echo "<button class='buttonDefault' onclick=\"location.href='GrupoConcreto?id=".$idGrupo."'\">Volver</button>";

					?>
				</div>
	
			</div>
		</div>
</body>
</html>