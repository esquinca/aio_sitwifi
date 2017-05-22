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
var imgsrc = $('#imgLink').attr("src");


// Header
$('#hoteles').on('change', function(e){
	var hotel_text = e.target.value;

	var arrayDatosF = [];
	var arrayURL = [];

  var configBar= {
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
/*	var BarchartData = {
		labels: [],
		datasets: [
			{
				label: "Cantidad",
		        fillColor: "rgba(210, 214, 222, 1)",
		        strokeColor: "rgba(210, 214, 222, 1)",
		        pointColor: "rgba(210, 214, 222, 1)",
		        pointStrokeColor: "#c1c7d1",
		        pointHighlightFill: "#fff",
		        pointHighlightStroke: "rgba(220,220,220,1)",
		        data: []
			}
		]
	}
  var linechartData = {
  labels: [],
  datasets: [
  {
  label: "Cantidad",
  fillColor: "rgba(210, 214, 222, 1)",
  strokeColor: "rgba(210, 214, 222, 1)",
  pointColor: "rgba(210, 214, 222, 1)",
  pointStrokeColor: "#c1c7d1",
  pointHighlightFill: "#fff",
  pointHighlightStroke: "rgba(220,220,220,1)",
  data: []
}
]
}
*/
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

	//Imagén de Hotel
	$.get('/getEntrImg?hotel_text=' + hotel_text, function(data){

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

	//Gráficos
	$.get('/entrega-equipo?hotel_text=' + hotel_text, function(data){
		$.each(JSON.parse(data), function(index, equiposObj){
			configBar.data.labels.push(equiposObj.Equipo + '=' + equiposObj.Cantidad);
      configBar.data.datasets[0].data.push(equiposObj.Cantidad);
		});
  /*
  		var BarChartOptions = {

  			//Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
  			scaleBeginAtZero: true,
  			//Boolean - Whether grid lines are shown across the chart
  			scaleShowGridLines: true,
  			//String - Colour of the grid lines
  			scaleGridLineColor: "rgba(0,0,0,.05)",
  			//Number - Width of the grid lines
  			scaleGridLineWidth: 1,
  			//Boolean - Whether to show horizontal lines (except X axis)
  			scaleShowHorizontalLines: true,
  			//Boolean - Whether to show vertical lines (except Y axis)
  			scaleShowVerticalLines: true,
  			//Boolean - If there is a stroke on each bar
  			barShowStroke: true,
  			//Number - Pixel width of the bar stroke
  			barStrokeWidth: 2,
  			//Number - Spacing between each of the X value sets
  			barValueSpacing: 5,
  			//Number - Spacing between data sets within X values
  			barDatasetSpacing: 1,
  			//String - A legend template
  			//legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
  			//Boolean - whether to make the chart responsive


  		};
      $('#bar-chartP').remove();

      $('#chart2-containerP').append(

      var BarChartCanvasP = $('#bar-chartP').get(0).getContext("2d");
      var BarChartP = new Chart(BarChartCanvasP).Bar(BarchartData, BarChartOptions);
  */

    $('#bar-chartP').remove();
    $('#chart2-containerP').append('<canvas id="bar-chartP" width="20" height="20"></canvas>');
    var BarChartCanvas =document.getElementById("bar-chartP").getContext("2d");
    var BarChart = new Chart(BarChartCanvas, configBar);

	});

	$.get('/entrega-antena?hotel_text=' + hotel_text, function(data){
		//console.log(data);
		$.each(JSON.parse(data), function(index, antenasObj){
      configlinemodel.data.labels.push(antenasObj.Modelo + '=' + antenasObj.Cantidad);
      configlinemodel.data.datasets[0].data.push(antenasObj.Cantidad);
		});
/*
		var areaChartOptions = {
			//Boolean - If we should show the scale at all
			showScale: true,
			//Boolean - Whether grid lines are shown across the chart
			scaleShowGridLines: true,
			//String - Colour of the grid lines
			scaleGridLineColor: "rgba(0,0,0,.05)",
			//Number - Width of the grid lines
			scaleGridLineWidth: 1,
			//Boolean - Whether to show horizontal lines (except X axis)
			scaleShowHorizontalLines: true,
			//Boolean - Whether to show vertical lines (except Y axis)
			scaleShowVerticalLines: true,
			//Boolean - Whether the line is curved between points
			bezierCurve: true,
			//Number - Tension of the bezier curve between points
			bezierCurveTension: 0.3,
			//Boolean - Whether to show a dot for each point
			pointDot: true,
			//Number - Radius of each point dot in pixels
			pointDotRadius: 4,
			//Number - Pixel width of point dot stroke
			pointDotStrokeWidth: 1,
			//Number - amount extra to add to the radius to cater for hit detection outside the drawn point
			pointHitDetectionRadius: 20,
			//Boolean - Whether to show a stroke for datasets
			datasetStroke: true,
			//Number - Pixel width of dataset stroke
			datasetStrokeWidth: 2,
			//Boolean - Whether to fill the dataset with a color
			datasetFill: false,
			//String - A legend template
			//legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
			//Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
			maintainAspectRatio: true,
			//Boolean - whether to make the chart responsive to window resizing

    	};

		$('#line-chartP').remove();

		$('#chart1-containerP').append('<canvas id="line-chartP" width="300" height="200"></canvas>');

		var areaChartCanvasP = $('#line-chartP').get(0).getContext("2d");

		var areaChartP = new Chart(areaChartCanvasP).Line(linechartData, areaChartOptions);
*/
    $('#line-chartP').remove();
    $('#chart1-containerP').append('<canvas id="line-chartP" width="20" height="20"></canvas>');
    var areaChartCanvas = document.getElementById("line-chartP").getContext("2d");
    var charlineone = new Chart(areaChartCanvas, configlinemodel);


	});

	//Tabla
	$.get('entrega-hotel?hotel_text=' + hotel_text, function(data){
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

});

$('#hoteles').on('change', function(e){
	var hotel_text = e.target.value;
	var arrayDatos = [];
	$.get('entrega-datos?hotel_text=' + hotel_text, function(data){
		//console.log(data);

		$.each(JSON.parse(data), function(index, datosReporte){
			//datosReporte.toString();
			arrayDatos.push(datosReporte);
		});

		$('#datosParrafo').remove();
		$('#datosParrafo2').remove();



		$('#datosReporte').append('<p id="datosParrafo" class="pull-left"><b>Empresa: </b>SITWIFI S.A de C.V<br>' + '<b>Responsable: </b>' + arrayDatos[0] + "<br>");
		$('#datosParrafo').append('<b>Área de Trabajo: </b>' + arrayDatos[1] + '<br>');
		$('#datosParrafo').append('<b>Direccion: </b>Hamburgo 159 Colonia Juarez,<br> CP 06600, Ciudad de México<br>');
		$('#datosParrafo').append('<b>Teléfono: </b>' + arrayDatos[3] + '<br>');
		$('#datosParrafo').append('<b>Correo: </b>' + arrayDatos[4] + '<br></p>');

		//$('#datosParrafo').append('<b>Fecha de Reporte: </b>' + fecha.getDate() + " de " + meses[fecha.getMonth()] + " de " + fecha.getFullYear() + '<br></p>');

		$('#datosReporte2').append('<p id="datosParrafo2" class="pull-left"><b>Cliente: </b>' + hotel_text + '<br>');
		$('#datosParrafo2').append('<b>Responsable: </b>' + arrayDatos[5] + '<br>');
		$('#datosParrafo2').append('<b>Área de Trabajo: </b>' + arrayDatos[6] + '<br>');
		$('#datosParrafo2').append('<b>País: </b>' + arrayDatos[7] + '<br>');
		$('#datosParrafo2').append('<b>Estado: </b>' + arrayDatos[8] + '<br>');
		$('#datosParrafo2').append('<b>Dirección: </b>' + arrayDatos[2] + '<br>');
		$('#datosParrafo2').append('<b>Teléfono: </b>' + arrayDatos[9] + '<br>');
		$('#datosParrafo2').append('<b>Correo: </b>' + arrayDatos[10] + '<br></p>');

	});
});

$('#hoteles').on('change', function(e){
	var hotel_text = e.target.value;
	var arrayDatosF = [];

	$.get('entrega-datosFecha?hotel_text=' + hotel_text, function(data){
		//console.log(data);

		$.each(JSON.parse(data), function(index, datosReporte){
			//datosReporte.toString();
			arrayDatosF.push(datosReporte);
		});

		$('#datosFechaI').remove();
		$('#datosFechaE').remove();

		$('#datosContainer').append('<div id="datosFechaI"><p id="datosFecha"><h4>Fecha de inicio del proyecto: ' + arrayDatosF[0] + '.</h4></p></div>');
		$('#datosContainer').append('<div id="datosFechaE"><p id="datosFecha2"><h4>Fecha de Entrega del proyecto: ' + arrayDatosF[1] + '.</h4></p></div>');

	});
});

$('#btn-pdf').on('click', function(e){
  //$("body").addClass('sidebar-collapse'); //Comprimir siderbar
	var searchText = $('div.dataTables_filter input').val();
	oTable.fnDestroy();

	$('#datosHotel').dataTable({
		paging: false,
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
	oTable.fnFilter(searchText);
	$('div.dataTables_filter input').hide();
	$('div.dataTables_filter label').hide();
	window.print();
	oTable.fnDestroy();
	$('#datosHotel').dataTable(
    {
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
      }
  );

	//sidebar-collapse
});


// espejo - alejandro.espejo@fodeli.com.mx
// espejo_sitwifi - aespejob@sitwifi.com
// jwalker2016 - jwalker@sitwifi.com
// ortiz_sitwifi - mortiz@sitwifi.com
// martinez2016 - jmartinez@sitiwif.com
// rangel_2016 - crangel@sitwifi.com
// sitwifi-mayorga - emayorga@sitwifi.com
// tavera-sitwifi - htavera@sitwifi.com
// montiaga-2016 - mmontiaga@sitwifi.com
// rgonzalez2016 - rgonzalez@sitwifi.com
// bautista2016 - ebautista@sitwifi.com
