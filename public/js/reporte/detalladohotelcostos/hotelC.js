		$(document).ready(function() {
		 $('#contentTablePrice').dataTable( {
		    	paging: false,
			    bFilter: false,
					ordering: false,
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
						},
		        "fnFooterCallback": function ( nRow, aaData, iStart, iEnd, aiDisplay ) {
		            /*
		             * Calculate the total market share for all browsers in this table (ie inc. outside
		             * the pagination)
		             */
		            var iTotalMarket = 0;
		            for ( var i=0 ; i<aaData.length ; i++ )
		            {
		                iTotalMarket += aaData[i][5]*1;
		            }

		            /* Calculate the market share for browsers on this page */
		            var iPageMarket = 0;
		            for ( var i=iStart ; i<iEnd ; i++ )
		            {
		                iPageMarket += aaData[ aiDisplay[i] ][5]*1;
		            }

		            /* Modify the footer row to match what we want */
		            var nCells = nRow.getElementsByTagName('th');
		            nCells[1].innerHTML = '$ '+parseFloat(iPageMarket * 100)/100 +
	                ' USD';
		        }
		    });
			$(".select2").select2();
		});
		var C001=0;
		var arrayDT01=[];
		$("#contregfirma").hide();

		$('#selectregprecios').on('change', function() {
		  C001=validarSelectreg ('selectregprecios');
		  $("#generaPDF").hide();
		});

		(function(){
		    $('#generarReg').on('click', function() {
		     	 C001=validarSelectreg ('selectregprecios');

			 	var client_name=$('#selectregprecios').val();
				var arrayIMG = [];
				var arrayDT=[];
				var arrayDT01=[];
				var arrayDTMODELOS=[];
				var TableT1 = $('#contentTablePrice').dataTable();
				var configCTX4= {
				    type: 'bar',
				    data: {
				        //labels:  ["Enero 2017", "Febrero 2017", "Marzo 2017", "April 2017", "Mayo 2017", "Junio 2017"],
								labels: [],
				        datasets: [{
				            label: 'Valor',
				            //data: [200, 185, 590, 621, 250, 400],
										data: [],
				            backgroundColor: 'rgba(233, 226, 37, 1)',
				            borderColor: 'rgba(233, 226, 37, 1)',
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


			 	if ( C001===true){
			 		$("#contregfirma").show();/*Muestro la vista Previa*/
			 		$('#generaPDF').show();/*Muestro el boton de impresion*/
			 		$('#invoiceContep').show();

			 		/*Obtener los valores del header de la vista previa*/
			 		$.get('/ajax-data-precio?cliente='+client_name,function (data){
						//console.log(data);
						$.each(JSON.parse(data),function(index, objdataw){
							objdataw.toString();
							arrayDT.push(objdataw);
						});
						$("#cliente01").text(arrayDT[0]);
						$("#cliente02").text(arrayDT[1]);
						$("#cliente03").text(arrayDT[2]);
						$("#cliente04").text(arrayDT[3]);
						$("#cliente05").text(arrayDT[4]);

						$("#cliente06").text(arrayDT[5]+' '+arrayDT[6]);
						$("#cliente07").text(arrayDT[7]);
						$("#cliente08").text(arrayDT[8]);
						$("#cliente09").text(arrayDT[9]);
					});
					/*Obtener los valores para la url de la imagen de la vista previa*/
					$.get('/ajax-data-img-precio?imgrf='+client_name,function(data){
						$.each(JSON.parse(data),function(index, objdaimg){
							objdaimg.toString();
							arrayIMG.push(objdaimg);
						});
						/*Comparo isEmptyObject con el array no esta vacio me devuelve false*/
						if (jQuery.isEmptyObject(arrayIMG[0].Imagen) == false) {
							$("#imgH").attr("src","../img/hoteles/"+arrayIMG[0].Imagen);
						}
						/*Comparo isEmptyObject con el array si esta vacio me devuelve true*/
						if (jQuery.isEmptyObject(arrayIMG[0].Imagen) != false) {
              $("#imgH").attr("src","../img/hoteles/Sin_imagen.png");

						}
					});
					/*Obtener los valores para las tablas de desglose de cantidades*/
					$.get('/ajax-desglose-cant-precio?hotel='+client_name,function(data){
						$.each(JSON.parse(data),function(index, objdatablasr){
							objdatablasr.toString();
							arrayDT01.push(objdatablasr);
						});
						$("#cliente11").text(arrayDT01[0]); /*Nombre_hotel*/
						$("#cliente12").text(arrayDT01[1]); /*AP_Stock*/
						$("#cliente13").text(arrayDT01[2]); /*AP_Prestamo*/
						$("#cliente14").text(arrayDT01[3]); /*AP_Venta*/
						$("#cliente15").text(arrayDT01[4]); /*AP_Renta*/
						$("#cliente16").text(arrayDT01[5]); /*AP_Demo*/
						$("#cliente17").text(arrayDT01[8]); /*SW_Stock*/
						$("#cliente18").text(arrayDT01[9]); /*SW_Prestamo*/

						$("#cliente19").text(arrayDT01[0]); /*Nombre_hotel*/
						$("#cliente20").text(arrayDT01[10]); /*SW_Demo*/
						$("#cliente21").text(arrayDT01[11]);/*SW_Rent*/
						$("#cliente22").text(arrayDT01[12]);/*ZD_Venta*/
						$("#cliente23").text(arrayDT01[13]);/*ZD_Renta*/
						$("#cliente24").text(arrayDT01[14]);/*ZD_Demo*/
						$("#cliente25").text(arrayDT01[6]);/*AP_Cambio*/

						$("#apstock").text(arrayDT01[1]); /*AP_Stock*/
						$("#aprenta").text(arrayDT01[4]); /*AP_Renta*/
						$("#apprestamo").text(arrayDT01[2]); /*AP_Prestamo*/
						$("#apventa").text(arrayDT01[3]); /*AP_Venta*/
						$("#apdemo").text(arrayDT01[5]); /*AP_Demo*/
						$("#swrentas").text(arrayDT01[11]); /*SW_Rent*/

						//- PIE CHART -
						//-------------
						// Get context with jQuery - using jQuery's .get() method.

						var configpastelpie = {
							type: 'pie',
							data: 	{
										labels: ["AP Stock","AP Renta","AP Prestamo","AP Venta","AP Demo","SW Rent"],
											datasets: [{
															data: [
																arrayDT01[1],arrayDT01[4],arrayDT01[2],arrayDT01[3],arrayDT01[5],arrayDT01[11],
															],
															backgroundColor: [
																"#f56954",
																"#00a65a",
																"#f39c12",
																"#00c0ef",
																"#3c8dbc",
																"#d2d6de",
															],
															hoverBackgroundColor: [
																"#f56954",
																"#00a65a",
																"#f39c12",
																"#00c0ef",
																"#3c8dbc",
																"#d2d6de",
															]
										}]
								},
								options: {
									legend: { position: 'top', display: false,},
									title: { display: false, text: 'title' },
								}
						};

						$('#pieChart').remove();
						$('#canvas-char1').append('<canvas id="pieChart" height="300"></canvas>');
						var ctxepiepastel = document.getElementById("pieChart").getContext("2d");
						var myChartPieChart = new Chart(ctxepiepastel, configpastelpie);
						myChartPieChart.destroy();
						myChartPieChart = new Chart(ctxepiepastel, configpastelpie);
						//-----------------
						//- END PIE CHART -
						//-----------------
					});

					/*Insercion de datos a la Tabla de Costos por equipo*/
					$.get('/ajax-content-tP?hotel='+client_name,function(data){
						TableT1.fnClearTable();
						$.each(JSON.parse(data), function(index, datosT1){
							TableT1.fnAddData([
								datosT1.Equipo,
								datosT1.MAC,
								datosT1.Serie,
								datosT1.Modelo,
								datosT1.Descripcion,
								datosT1.Costo,
							]);
						});
					});
					/*Generacion de grafica de barras*/
					$.get('/ajax-content-bar?hotel='+client_name,function(data){
						$.each(JSON.parse(data),function(index, objsd){
							configCTX4.data.labels.push(objsd.Equipo + '=' + objsd.Cantidad);
							configCTX4.data.datasets[0].data.push(objsd.Cantidad);
						});
						$('#chart-area3').remove();
						$('#canvas-holder').append('<canvas id="chart-area3" height="100"></canvas>');

						var ctx3 = document.getElementById("chart-area3").getContext("2d");
						var chartbar = new Chart(ctx3, configCTX4);
						chartbar.destroy();
						chartbar = new Chart(ctx3, configCTX4);
					});
					/*Generacion de grafica de lineas*/
					$.get('/ajax-content-lin?hotel='+client_name,function(data) {
						$.each(JSON.parse(data),function(index, objsd){
							configlinemodel.data.labels.push(objsd.Equipo+'='+objsd.Modelo+'='+objsd.Cantidad);
							configlinemodel.data.datasets[0].data.push(objsd.Cantidad);
						});
						$('#chart-area-lin').remove();
						$('#canvas-holder-lin').append('<canvas id="chart-area-lin" height="200" style="padding-right: 30px;"></canvas>');
						var ctx4 = document.getElementById("chart-area-lin").getContext("2d");
						//window.myPie = new Chart(ctx4).Line(lineChartData, {responsive:true});
						var chartline = new Chart(ctx4, configlinemodel);
						chartline.destroy();
						chartline = new Chart(ctx4, configlinemodel);
					});

			 	}
			 	if ( C001===false){
			 		//alert('NOselecciono');
			 		$("#contregfirma").hide(); /*Oculto la vista Previa*/
          toastr.error('Datos Requeridos. !!', 'Error', {timeOut: 3000});
			 	}
		    });
		})();

		$('#generaPDF').on('click', function(e){
			//$("#sidebar-burger").addClass("sidebar-collapse");
			$('#titulos').hide();
			$('#opciones').hide();
			window.print();
			$('#titulos').show();
			$('#opciones').show();
		});

		function validarSelectreg(campo) {
			if (campo==='selectregprecios') {
				selectProy=document.getElementById(campo).selectedIndex;
				if( selectProy == null || selectProy == 0 ) {
				    $('#selectregprecios').parent().parent().attr("class", "form-group has-error");
				    $('#invoiceContep').hide();
				    return false;
				}
				else {
					$("#selectregprecios").parent().parent().attr("class","form-group has-success");
					return true;
				}
			};
		}
