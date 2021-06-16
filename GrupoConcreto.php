<?php
require_once __DIR__.'/includes/config.php';
use es\fdi\ucm\aw\DAOGrupo as DAOGrupo;
use es\fdi\ucm\aw\DAOTema as DAOTema;
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
	<link rel="stylesheet" type="text/css" href="css/general.css">
	<link rel="stylesheet" type="text/css" href="css/gruposForo.css">
	<title>
		Grupo Concreto
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


			   $id = htmlspecialchars(trim(strip_tags($_GET['id'])));

			   $grupo = DAOGrupo::buscar($id);


			   $tema = DAOTema::listar($id);
			   $_SESSION['grupo'] = $id;
				
				echo "<form action=\"buscarTema?idGrupo=".$id."\" method=\"POST\">";
				echo "<label>Buscar tema:</label><input type=\"text\" name=\"nombre\">";
				echo "<button class='buttonBuscar' type=\"submit\"></button>";
				echo "</form>";
				
			if(isset($_SESSION["login"])){
				echo"<button class='buttonDefault' id='nuevo' onclick=\"location.href='crear_tema'\">Nuevo Tema</button>";
			}
			
			#ver miembros
			echo"<button class='buttonDefault' onclick=\"location.href='procesarVerMiembros?idGrupo=".$id."'\">Ver miembros</button>";
			

			#añadir miembro
			if(DAOMiembro::isPropietario($_SESSION["usuario"],$id)){
				echo"<button class='buttonDefault' id='nuevo' onclick=\"location.href='addMiembro?idGrupo=".$id."'\">Añadir miembro</button>";
			}	

			#salir del grupo
			echo "<button class='buttonDefault' id='exit' onclick=\"location.href='procesarSalirGrupo?idGrupo=".$id."'\">Salir del grupo</button>";

			#volver
			echo "<button class='buttonDefault' onclick=\"location.href='foro_grupos'\">Volver</button>";

				
			   echo "<p class='content'>Temas del grupo (".$grupo->getnombreGrupo()."):</p>";

			   if ($tema == NULL) {

				echo "<p class='content'> No hay temas creados en este grupo. ¡Sé el primer@ en poner uno!</p>";

			   }else{
				echo "<div class='cuadricula'>";
					for ($i=0; $i < sizeof($tema); $i++) { 
				
					    $idT = $tema[$i]->getidTema();
					
						echo "<div>".$tema[$i]->gettitulo()."<br>".$tema[$i]->getdescripcion()."<br><button class='buttonDefault' id='miBoton' onclick=\"location.href='temaConcreto?id=".$idT."'\">Ir</button></div>";

						
					}
				echo "</div>";
			   }   
			?>
		</div>
	</div>
</div>

</body>
</html>