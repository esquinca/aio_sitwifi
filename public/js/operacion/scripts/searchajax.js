var oTable = $('#datosBusqueda');
var oTable2 = $('#datosBusqueda2');
$('#divbusqueda1').hide();
$('#divbusqueda2').hide();

$('#search-input-equipo').keydown(function(e){
	if (e.keyCode == 13) {
		var search_text = e.target.value;
		var i = $('#datosBusqueda thead tr th').size();
		//console.log('Numero de columnas: ' + i);

		if (search_text === "" || search_text.length < 4) {
			alert("Campo no debe ser vacio o menor a 4 digitos.");
		}else{
			if(i === 0){
				$('#datosBusqueda thead tr').append("<th>Nombre</th><th>Modelo</th><th>MAC</th><th>Serie</th><th>Descripción</th><th>Estado</th><th>Proyecto</th>");
			}

			if ( ! $.fn.DataTable.isDataTable('#datosBusqueda') ) {
				oTable.dataTable({
					paging: false,
					searching: false,
          language:{
                  "sProcessing":     "Procesando...",
                  "sLengthMenu":     "Mostrar _MENU_ registros",
                  "sZeroRecords":    "No se encontraron resultados",
                  "sEmptyTable":     "Ningún dato disponible",
                  "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                  "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                  "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                  "sInfoPostFix":    "",
                  "sSearch":         "Buscar:",
                  "sUrl":            "",
                  "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                  "oPaginate": {
                        "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                      "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                      "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                  }
          }
				});
			}

			search_text = search_text + '|equipo';
			$.get('/ajax-search?search_text=' + search_text, function(data){
				//success data
				//console.log(data);
				oTable.fnClearTable();
				$.each(JSON.parse(data), function(index, datoBusqObj){
					oTable.fnAddData([
						datoBusqObj.Nombre_hotel,
						datoBusqObj.Modelo,
						datoBusqObj.MAC,
						datoBusqObj.Serie,
						datoBusqObj.Descripcion,
						datoBusqObj.Nombre_estado,
						datoBusqObj.Nombre_proyecto,
					]);
				});
			});
			$('#divbusqueda1').show();
			$('#divbusqueda2').hide();
		}
	}
});

//Otra opción, crear las columnas que se usaran y ocultarlas dependiendo de la consulta.
$('#search-btn-equipo').on('click', function(e){
	var search_text = document.getElementById('search-input-equipo').value;
	var i = $('#datosBusqueda thead tr th').size();
	//console.log('Numero de columnas: ' + i);

	if (search_text === "" || search_text.length < 4) {
		alert("Campo no debe ser vacio o menor a 4 digitos.");
	}else{
		if(i === 0){
			$('#datosBusqueda thead tr').append("<th>Nombre</th><th>Modelo</th><th>MAC</th><th>Serie</th><th>Descripción</th><th>Estado</th><th>Proyecto</th>");
		}
		if ( ! $.fn.DataTable.isDataTable('#datosBusqueda') ) {
			oTable.dataTable({
				paging: false,
				searching: false,
        language:{
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
              "sLoadingRecords": "Cargando...",
                "oPaginate": {
                      "sFirst":    "Primero",
                  "sLast":     "Último",
                  "sNext":     "Siguiente",
                  "sPrevious": "Anterior"
              },
              "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
        }
			});
		}

		search_text = search_text + '|equipo';
		$.get('/ajax-search?search_text=' + search_text, function(data){
			//success data
			//console.log(data);
			oTable.fnClearTable();
			$.each(JSON.parse(data), function(index, datoBusqObj){
				oTable.fnAddData([
					datoBusqObj.Nombre_hotel,
					datoBusqObj.Modelo,
					datoBusqObj.MAC,
					datoBusqObj.Serie,
					datoBusqObj.Descripcion,
					datoBusqObj.Nombre_estado,
					datoBusqObj.Nombre_proyecto,
				]);
			});
		});
		$('#divbusqueda1').show();
		$('#divbusqueda2').hide();
	}
});

$('#search-input-movimiento').keydown(function(e){
	if (e.keyCode == 13) {
		var search_text = e.target.value;
		var i = $('#datosBusqueda2 thead tr th').size();
		//console.log('Numero de columnas: ' + i);
		if (search_text === "" || search_text.length < 4) {
			alert("Por favor llene el campo con la informacion deseada.");
		}else{
			if(i === 0){
				$('#datosBusqueda2 thead tr').append("<th>FechaMovimiento</th><th>Sujeto</th><th>Motivo</th><th>Equipo</th><th>Serie</th><th>MAC</th><th>Descripcion</th><th>Origen</th><th>Destino</th><th>Estado</th><th>Proyecto</th>");
			}
			if ( ! $.fn.DataTable.isDataTable('#datosBusqueda2') ) {
				oTable2.dataTable({
					paging: false,
					searching: false,
          language:{
                  "sProcessing":     "Procesando...",
                  "sLengthMenu":     "Mostrar _MENU_ registros",
                  "sZeroRecords":    "No se encontraron resultados",
                  "sEmptyTable":     "Ningún dato disponible",
                  "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                  "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                  "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                  "sInfoPostFix":    "",
                  "sSearch":         "Buscar:",
                  "sUrl":            "",
                  "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                  "oPaginate": {
                        "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                      "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                      "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                  }
          }
				});
			}
			search_text = search_text + '|movimientos';
			$.get('/ajax-search?search_text=' + search_text, function(data){
				//success data
				//console.log(data);
				oTable2.fnClearTable();
				$.each(JSON.parse(data), function(index, datoBusqObj){
					oTable2.fnAddData([
						datoBusqObj.FechaMov,
						datoBusqObj.Sujeto,
						datoBusqObj.Motivo,
						datoBusqObj.Equipo,
						datoBusqObj.Serie,
						datoBusqObj.MAC,
						datoBusqObj.Descripcion,
						datoBusqObj.OrigenHOTEL,
						datoBusqObj.DestinoHOTEL,
						datoBusqObj.Estado,
						datoBusqObj.Proyecto,
					]);
				});
			});
			$('#divbusqueda1').hide();
			$('#divbusqueda2').show();
		}
	}
});

$('#search-btn-movimiento').on('click', function(e){
	var search_text = document.getElementById('search-input-movimiento').value;
	var i = $('#datosBusqueda2 thead tr th').size();
	//console.log('Numero de columnas: ' + i);

	if (search_text === "" || search_text.length < 4) {
		alert("Por favor llene el campo con la informacion deseada.");
	}else{
		if(i === 0){
			$('#datosBusqueda2 thead tr').append("<th>FechaMovimiento</th><th>Sujeto</th><th>Motivo</th><th>Equipo</th><th>Serie</th><th>MAC</th><th>Descripcion</th><th>Origen</th><th>Destino</th><th>Estado</th><th>Proyecto</th>");
		}
		if ( ! $.fn.DataTable.isDataTable('#datosBusqueda2') ) {
			oTable2.dataTable({
				paging: false,
				searching: false,
        language:{
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
              "sLoadingRecords": "Cargando...",
                "oPaginate": {
                      "sFirst":    "Primero",
                  "sLast":     "Último",
                  "sNext":     "Siguiente",
                  "sPrevious": "Anterior"
              },
              "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
        }
			});
		}
		search_text = search_text + '|movimientos';
		$.get('/ajax-search?search_text=' + search_text, function(data){
			//success data
			//console.log(data);
			oTable2.fnClearTable();
			$.each(JSON.parse(data), function(index, datoBusqObj){
				oTable2.fnAddData([
					datoBusqObj.FechaMov,
					datoBusqObj.Sujeto,
					datoBusqObj.Motivo,
					datoBusqObj.Equipo,
					datoBusqObj.Serie,
					datoBusqObj.MAC,
					datoBusqObj.Descripcion,
					datoBusqObj.OrigenHOTEL,
					datoBusqObj.DestinoHOTEL,
					datoBusqObj.Estado,
					datoBusqObj.Proyecto,
				]);
			});
		});
		$('#divbusqueda1').hide();
		$('#divbusqueda2').show();
	}
});
