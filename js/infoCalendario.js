$(document).ready(function() {
	    var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();
		  
		$('#external-events div.external-event').each(function() {		
			var eventObject = {
				title: $.trim($(this).text())
			};			
			$(this).data('eventObject', eventObject);			
		});
	
		/*Inicializar el calendario*/
		
		var calendar =  $('#calendar').fullCalendar({
			header: {
				left: 'title',
				center: 'month',
				right: 'prev,next today'
			},
			editable: true,
			firstDay: 1, //  1(Lunes) 
			selectable: true,
			defaultView: 'month',
			
			axisFormat: 'h:mm',
			columnFormat: {
                month: 'ddd', 
                week: 'ddd d', 
                day: 'dddd M/d', 
                agendaDay: 'dddd d'
            },
            titleFormat: {
                month: 'MMMM yyyy', 
                week: "MMMM yyyy", 
                day: 'MMMM yyyy'
            },
			allDaySlot: false,
			selectHelper: true,
			select: function(start, end, allDay) {
				//lo que pasa si se hace click en un día concreto				
				calendar.fullCalendar('unselect');
			},
			droppable: false, 
			drop: function(date, allDay) { 
				//No se va a permitir drop en el calendario		
			},
			
			events: dataMisEventos,
			});
	});