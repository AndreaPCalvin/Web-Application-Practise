$(document).ready(function() {
	$(".fa-check-circle").hide();//bien
	$(".fa-times-circle").show();//mal
	miBoton = document.getElementById("boton");
	miBoton.disabled = true;
	okCorreo=false;
	okApodo=false;
	okNombreCompleto=false;
	okApellidos=false;
	okPass=false;
	okPass2=false;
	
	$("#correo").change(function(){  
		if ( correoValido($("#correo").val() ) ) {   
			var url="includes/ajax/comprobarEmailExiste?email=" + $("#correo").val();   
			$.get(url, emailExiste);
		} else {   
			alert("Introduzca un email válido.");
			$("#eb").hide();
			$("#em").show();
			okCorreo=false;	
			mostrarBotonSubmit();
		} 
	});
	
	$("#nick").change(function(){  //apodo
		apodo = $("#nick").val();
		if ( apodo.length > 2 ) { 
			var url="includes/ajax/comprobarUsuarioExiste?apodo=" + apodo;   
			$.get(url, usuarioExiste);	
		} else {   
			alert("El apodo debe tener al menos 3 caracteres.");
			$("#nickBien").hide();
			$("#nickMal").show();
			okApodo=false;
			mostrarBotonSubmit();
		} 
	});
	
	$("#nombrecompleto").change(function(){  //nombre real
		nombre = $("#nombrecompleto").val();
		if ( nombre.length > 2 ) { //ana, eva...
			$("#nb").show();
			$("#nm").hide();
			okNombreCompleto=true;
			mostrarBotonSubmit();
		} else {   
			alert("El nombre debe tener al menos 3 caracteres.");
			$("#nb").hide();
			$("#nm").show();
			okNombreCompleto=false;
			mostrarBotonSubmit();
		} 
	});
	
	$("#apellidos").change(function(){  //apellidos reales
		ap = $("#apellidos").val();
		if ( ap.length > 4 ) { 
			$("#ab").show();
			$("#am").hide();
			okApellidos=true;
			mostrarBotonSubmit();
		} else {   
			alert("Los apellidos debe tener al menos 5 caracteres.");
			$("#ab").hide();
			$("#am").show();
			okApellidos=false;
			mostrarBotonSubmit();
		} 
	});
	
	$("#passwd").change(function(){  
		pass = $("#passwd").val();
		pass2 = $("#passwd2").val();
		var patt = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;
		result = patt.test(pass);
		if ( result == true ) {
			$("#cb").show();
			$("#cm").hide();
			okPass=true;
			if(pass == pass2){				
				$("#passIgual").html("");
				$("#cb2").show();
				$("#cm2").hide();
				okPass2=true;
			}
			else if(pass2!=""){
				alert("Las contraseñas no coinciden");
				$("#passIgual").html("<p>Las contraseñas no coinciden</p>");
				$("#cb2").hide();
				$("#cm2").show();
				okPass2=false;
			}
		} else {   
			$("#passIgual").html("");
			alert("Por su seguridad la contraseña debe tener al menos 8 caracteres, una mayúscula, una minúscula y un dígito.");
			$("#cb").hide();
			$("#cm").show();
			okPass=false;
				$("#passIgual").html("<p>Las contraseñas no coinciden</p>");
				$("#cb2").hide();
				$("#cm2").show();
				okPass2=false;
		}		
		mostrarBotonSubmit();
	});
	
	$("#passwd2").change(function(){  
		pass2 = $("#passwd2").val();
		pass = $("#passwd").val();
		var patt = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;
		result = patt.test(pass2);
		if (result == true ) { 
			if(pass == pass2){
				$("#passIgual").html("");
				$("#cb2").show();
				$("#cm2").hide();
				okPass2=true;
				mostrarBotonSubmit();
			}
			else if(pass!=""){
				alert("Las contraseñas no coindicen.");
				$("#passIgual").html("<p>Las contraseñas no coinciden</p>");
				$("#cb2").hide();
				$("#cm2").show();
				okPass2=false;
				mostrarBotonSubmit();
			}
			else{//pass vacia
				$("#cm2").hide();
				$("#cb2").show();
			}
		} else {   
			alert("Por su seguridad la contraseña debe tener al menos 8 caracteres, una mayúscula, una minúscula y un dígito.");
			$("#passIgual").html("<p>La contraseña no es segura</p>");
			$("#cb2").hide();
			$("#cm2").show();
			okPass2=false;
			mostrarBotonSubmit();
		} 
	});	
	mostrarBotonSubmit();
});

function correoValido(miEmail){//usuario+@+servidor+dominio
	check = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/ ;
	return check.test(String(miEmail).toLowerCase());
}

function emailExiste(data, status){					
	if(data == "usada"){
		alert('Ya hay una cuenta registrada con este email.');
		$("#eb").hide();
		$("#em").show();
		okCorreo=false;
		mostrarBotonSubmit();
	}
	else if (data == "libre"){
		$("#eb").show();
		$("#em").hide();
		okCorreo=true;
		mostrarBotonSubmit();
	}					
}

function usuarioExiste(data, status){					
	if(data == "usada"){
		alert('Ese apodo ya está en uso.');
		$("#nickBien").hide();
		$("#nickMal").show();
		okApodo=false;
		mostrarBotonSubmit();
	}
	else if (data == "libre"){
		$("#nickBien").show();
		$("#nickMal").hide();
		okApodo=true;
		mostrarBotonSubmit();
	}					
}

function mostrarBotonSubmit(){

	if(okCorreo==true && okApodo==true && okNombreCompleto==true && okApellidos==true && okPass2==true && okPass==true){
		miBoton.disabled = false;
		$("#miTexto").html("<p>¡Pulsa el botón!</p>");		
	}
	else{
		miBoton.disabled = true;
		$("#miTexto").html("<p>No se puede crear una cuenta hasta que todos los campos del formulario sean correctos</p>");
	}

}
