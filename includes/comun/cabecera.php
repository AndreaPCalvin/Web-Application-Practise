<?php
use es\fdi\ucm\aw\DAOUsuario as DAOUsuario;
use es\fdi\ucm\aw\DAOAbono as DAOAbono;
use es\fdi\ucm\aw\TOUsuario as TOUsuario;
?>
<header>
	<nav>
		<div class="logo">
			<img src="media/logo.jpg" alt="logo" width="50">
		</div>

		<a href='index'>Inicio</a>
		<a href='peliculas'>Películas</a>
		<a href='foro_eventos'>Foro</a>
	</nav>	
	<div class="box">
  		<div class="container-1">
  		</div>
	</div>

		<?php

		if(!isset($_SESSION["login"])){
			echo ' <div>
			<a class="loginBot" href="login">Login</a>
			<a class="loginBot" href="signin">Registrarse</a>
			</div>';
		}
		else{
			$user = $_SESSION["usuario"];

			$miCuenta = new TOUsuario();
			$miCuenta = DAOUsuario::read( $user );
			echo '<a class="loginBot"> <img src=' . $miCuenta->geturlFoto() . ' alt="imagen ' . $miCuenta->getApodo() . '" id="avatarCabecera""> </a>';

			echo '<div>
			<ul class="menu">
			<li> '. $miCuenta->getApodo() .'
			<ul class="submenu">
			<li><a class="loginBot" href="miCuenta"> Mi Perfil </a></li>
			<li><a class="loginBot" href="modificarCuenta"> Modificar perfil</a></li>
			<li><a class="loginBot" href="modificarPassword"> Modificar contraseña </a></li>
			<li><a class="loginBot" href="logout"> Cerrar Sesión </a></li>
			</ul>
			</li>
			</ul>
			</div>';
			echo '<div class="loginBot">Salir</div>
				<div>
				<a class="loginBot" href="logout">
				<img src="media/cerrar_sesion.png" alt="imagen" id="cerrarSesion""> 
				</a>
				</div>';
		}
		?>

</header>