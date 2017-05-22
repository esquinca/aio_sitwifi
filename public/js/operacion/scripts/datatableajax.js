var oTable = $('#datosHotel').dataTable({
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
var meses = new Array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
var fecha = new Date();
var imgsrc = $('#linkd').val();
//$('#imgLink').attr("src");

//Datatales Ajax
$('#hoteles').on('change', function(e){
	var hotel_text = e.target.value;
	var arrayDatos = [];
	var arrayURL = [];

	$.get('/ajax-datos?hotel_text=' + hotel_text, function(data){
		//console.log(data);
		//insertar datos del reporte.
		$.each(JSON.parse(data), function(index, datosReporte){
			datosReporte.toString();
			arrayDatos.push(datosReporte);
		});

		$('#datosParrafo').remove();
		$('#datosParrafo2').remove();
		$('#datosReporte').append('<p id="datosParrafo" class="pull-left"><b>Cliente: </b>' + hotel_text + '<br>' + '<b>Direccion: </b>' + arrayDatos[0] + "<br>");
		$('#datosParrafo').append('<b>País: </b>' + arrayDatos[7] + '<br>');
		$('#datosParrafo').append('<b>Estado: </b>' + arrayDatos[8] + '<br>');
		$('#datosParrafo').append('<b>Fecha de Reporte: </b>' + fecha.getDate() + " de " + meses[fecha.getMonth()] + " de " + fecha.getFullYear() + '<br></p>');
		$('#datosReporte2').append('<p id="datosParrafo2" class="pull-left"><b>Vertical: </b>' + arrayDatos[3] + '<br>');
		$('#datosParrafo2').append('<b>IT Concierge: </b>' + arrayDatos[4] + " " + arrayDatos[5] + '<br>');
		$('#datosParrafo2').append('<b>Proyecto: </b>' + arrayDatos[6] + '<br>');
		$('#datosParrafo2').append('<b>Operación: </b>' + arrayDatos[2] + '<br>');
		$('#datosParrafo2').append('<b>Servicio: </b>' + arrayDatos[1] + '<br></p>');

		//$('#imgHotel').html('<img class="pull-right" id="imgLink" style="" height="49" width="100" src="'+ imgsrc + 'bower_components/admin-lte/dist/img/hoteles/AldeaThai.png" >');

	});

	$.get('/getImgHotel?hotel_text=' + hotel_text, function(data){
		$.each(JSON.parse(data), function(index, dataURL){
			dataURL.toString();
			arrayURL.push(dataURL);
		});

    if (arrayURL[0].dirlogo1 != '' || arrayURL[0].dirlogo1!=null){
		$('#imgHotel').html('<img class="pull-right" id="imgLink" style="" height="80%" width="80%" src="/img/hoteles/'+arrayURL[0].dirlogo1+'" >');
    }
    if( arrayURL[0].dirlogo1==null) {
      $('#imgHotel').html('<img class="pull-right" id="imgLink" style="" height="80%" width="80%" src="/img/Sin_imagen.png" >');
    }
	});

	$.get('/ajax-hotel?hotel_text=' + hotel_text, function(data){
		//success data
		//console.log(data);
		oTable.fnClearTable();
		$.each(JSON.parse(data), function(index, datoHotelObj){
			oTable.fnAddData([
				datoHotelObj.Equipo,
				datoHotelObj.MAC,
				datoHotelObj.Serie,
				datoHotelObj.Modelo,
				datoHotelObj.Descripcion,
				datoHotelObj.Nombre_estado,
				datoHotelObj.Nombre_servicio,
			]);
		});
	});

  //BarChart Ajax
  var configCTX1= {
    type: 'bar',
    data: {
      //labels:  ["Enero 2017", "Febrero 2017", "Marzo 2017", "April 2017", "Mayo 2017", "Junio 2017"],
      labels: [],
      datasets: [{
        label: 'Valor',
        //data: [200, 185, 590, 621, 250, 400],
        data: [],
        backgroundColor: 'rgba(51, 122, 183, 1)',
        borderColor: 'rgba(51, 122, 183, 1)',
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      tooltips: {
        mode: 'label'
      },
      elements: { line: { fill: true } },
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          display: true,
          gridLines: {
            display: false
          },
          labels: {
            show: true,
          },
          ticks: {
            fontSize: 10,
            //maxTicksLimit: 12, //Las lineas que pueden formar
            maxRotation: 90,
            minRotation: 90

          }
        }],
        yAxes: [{
          gridLines:{
            display: true //Poner las lineas de fondo
          },
          labels: {
            show:false,
          },
          ticks: {
            fontSize: 10,
            beginAtZero:true
          }
        }]
      }
    }
  };
  $.get('/ajax-equipo?hotel_text=' + hotel_text, function(data){
    $.each(JSON.parse(data),function(index, equiposObj){
      configCTX1.data.labels.push(equiposObj.Equipo + '=' + equiposObj.Cantidad);
      configCTX1.data.datasets[0].data.push(equiposObj.Cantidad);
    });

		$('#bar-chart').remove();
    $('#chart2-container').append('<canvas id="bar-chart"></canvas>');
    var BarChartCanvas =document.getElementById("bar-chart").getContext("2d");
    var BarChart = new Chart(BarChartCanvas, configCTX1);


  });
  //LineChart Ajax
  var configlinemodel= {
    type: 'line',
    data: {
        //labels:  ["Enero 2017", "Febrero 2017", "Marzo 2017", "April 2017", "Mayo 2017", "Junio 2017"],
        labels: [],
        datasets: [{
            label: 'Valor',
            //data: [200, 185, 590, 621, 250, 400],
            data: [],
            fill: true,
            borderColor: 'rgba(233, 226, 37, 1)',
            backgroundColor: 'rgba(151,187,205,0.2)',
            pointBorderColor: 'rgba(233, 226, 37, 1)',
            pointBackgroundColor: 'rgba(233, 226, 37, 1)',
            pointHoverBackgroundColor: 'rgba(233, 226, 37, 1)',
            pointHoverBorderColor: 'rgba(233, 226, 37, 1)',

            fillColor:  'rgba(236, 147, 47, 0.5)',
            strokeColor:  '#EC932F',
            pointColor:  '#EC932F',
            pointStrokeColor:  '#EC932F',
            pointHighlightFill:  '#EC932F',
            pointHighlightStroke:  '#EC932F',
        }]
    },
    options: {
        responsive: true,
        tooltips: {
          mode: 'label'
        },
        elements: { line: { fill: true } },
        legend: {
            display: false
        },
        scales: {
            xAxes: [{
              display: true,
              gridLines: {
                display: false
              },
              labels: {
                show: true,
              },
              ticks: {
                fontSize: 10,
                //maxTicksLimit: 12, //Las lineas que pueden formar
                maxRotation: 60 // angle in degrees
              }
            }],
            yAxes: [{
              gridLines:{
                display: true //Poner las lineas de fondo
              },
              labels: {
                show:false,
              },
              ticks: {
                fontSize: 10,
                beginAtZero:true
              }
            }]
        }
    }
  };
  $.get('/ajax-antena?hotel_text=' + hotel_text, function(data){
    $.each(JSON.parse(data),function(index, antenasObj){
      configlinemodel.data.labels.push(antenasObj.Modelo + '=' + antenasObj.Cantidad);
      configlinemodel.data.datasets[0].data.push(antenasObj.Cantidad);
    });

    $('#line-chart').remove();
    $('#chart1-container').append('<canvas id="line-chart"></canvas>');
    var areaChartCanvas = document.getElementById("line-chart").getContext("2d");
    var charlineone = new Chart(areaChartCanvas, configlinemodel);


  });



});

//PDF Button
$('#btn-pdf').on('click', function(e){
	$("body").addClass('sidebar-collapse'); //Comprimir siderbar

  var searchText = $('div.dataTables_filter input').val();
  oTable.fnDestroy();
  $('#datosHotel').dataTable({
    paging: false,
  });
  oTable.fnFilter(searchText);
  $('div.dataTables_filter input').hide();
  $('div.dataTables_filter label').hide();
  oTable.fnDestroy();
  window.print();
  $('#datosHotel').dataTable();


/*
	var searchText = $('div.dataTables_filter input').val();
	oTable.fnDestroy();
	$('#fila-p').show();
	$('#fila-np').hide();
	$('#datosHotel').dataTable({
		paging: false,
	});
	oTable.fnFilter(searchText);
	$('div.dataTables_filter input').hide();
	$('div.dataTables_filter label').hide();
	window.print();
	oTable.fnDestroy();
	$('#datosHotel').dataTable();
	$('#fila-p').hide();
	$('#fila-np').show();
*/
});
