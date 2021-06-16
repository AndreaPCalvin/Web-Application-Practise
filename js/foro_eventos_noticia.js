$(document).ready(function () {
	
	var fechaEventoServer = new Date(fechaEvento);
	var x = setInterval(function() {
		var fechaActual = new Date().getTime();
		var distance = fechaEventoServer - fechaActual;
		
		  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
		  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
		  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
		  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
 
		  if (distance < 0) {
			clearInterval(x);
			document.getElementById("cuentaAtras").innerHTML = "0d 0h 0m 0s";
		  }
		  else{
			  document.getElementById("cuentaAtras").innerHTML = days + "d " + hours + "h " + minutes + "m " + seconds + "s ";
		  }
	}, 50);
	
	showStars(notaMedia);//mostrar ranking
	
		  $(".heart").on("click", function() {//megusta
		  	thisA=$(this);
			
		  	$.ajax({
		    data: {"idevento" : idevento},
		    type: "GET",
		    dataType: "text",
		    url: "includes/ajax/tratamientoLike",
			})
			
			.done(function( data, textStatus, jqXHR ) {
			    if(data == 'create'){
			      	thisA.addClass("heart-blast");
					contador = $("#counterLikes");
					contador.html(parseInt(contador.html()) +1);
				}					
			    else if(data == 'delete'){
			      	thisA.removeClass("heart-blast");
					contador = $("#counterLikes");
					contador.html(parseInt(contador.html()) -1);
				}
			     
			 })
			 .fail(function( jqXHR, textStatus, errorThrown ) {
			     if ( console && console.log ) {
			         console.log( "La solicitud ha fallado: " +  textStatus);
			     }
			});
		  });
	
		  $(".fa-star").on("click", function(e) {
		  	
			nota = $(e.target).attr('value');
			$.ajax({
				data: {"idevento" : idevento, "nota" : nota},
				type: "GET",
				dataType: "text",
				url: "includes/ajax/tratamientoRanking",
			})
			
			.done(function(data, textStatus, jqXHR ) {
				showStars(data);
			});						
		  });
	});		

function showStars(valor=0){
	$(".fa-star").removeClass("checked");
		if(valor > 0){
			$("#s1").addClass("checked");
		}
		if(valor >= 30){
			$("#s2").addClass("checked");
		}
		if(valor >= 50){
			$("#s3").addClass("checked");
		}	
		if(valor >= 70){
			$("#s4").addClass("checked");
		}	
		if(valor >= 90){
			$("#s5").addClass("checked");
		}
}
