		$(document).ready(function() {
			$("#clienteProyectos").change(function (e) {
		      var cliente_proy= e.target.value;
		      $.get('/ajax-selectclientes?cliente_proy=' + cliente_proy, function (data) {
		      	$('#hotelesProyectos').empty();
		      	$('#hotelesProyectos').val('');
		      	$("#hotelesProyectos").select2({
				    placeholder: "Seleccione una opción",
				    //allowClear: true
				});
		      	$('#hotelesProyectos').append('<option value="" selected>Seleccione una opción</option>');
		      	$.each(JSON.parse(data), function(index, selectClientObj) {
		      		$('#hotelesProyectos').append('<option value="'+selectClientObj.Nombre_hotel+'">'+selectClientObj.Nombre_hotel+'</option>');
		      	});
		      });
		   });
			$(".select2").select2();

			$('#contentTableDetalles').dataTable( {
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
				}
		    });



		});
		var C001=0;
		$("#contregfirma").hide();
		$('#selectregprecios').on('change', function() {
		  C001=validarSelectreg ('selectregprecios');
		  $("#generaPDF").hide();
		});
		function ocultarDa() {
			$("#contregfirma").hide();$('#generaPDF').hide();$('#invoiceContep').hide();
		}
		function validarSelectreg(campo) {
			if (campo==='clienteProyectos') {
				selectProy=document.getElementById(campo).selectedIndex;
				if( selectProy == null || selectProy == 0 ) {
				    $('#clienteProyectos').parent().parent().attr("class", "form-group has-error");
				    return false;
				}
				else {
					$("#clienteProyectos").parent().parent().attr("class","form-group has-success");
					return true;
				}
			};
			if (campo==='hotelesProyectos') {
				selectProy2=document.getElementById(campo).selectedIndex;
				if( selectProy2 == null || selectProy2 == 0 ) {
				    $('#hotelesProyectos').parent().parent().attr("class", "form-group has-error");
					return false;
				}
				else {
					$("#hotelesProyectos").parent().parent().attr("class","form-group has-success");
					return true;
				}
			};
		}
		(function(){
		    $('#generarReg').on('click', function() {
		     	var a=0,b=0;
		     	var arrayDT = [], arrayIMG= [], arrayDT01=[];
		     	var client_name=$('#hotelesProyectos').val();
				var name_hotel=$('#clienteProyectos').val();
				var TableT1 = $('#contentTableDetalles').dataTable();
				var barChartData = {
						labels : [],
						datasets : [
							{
								fillColor : "#e9e225",
								strokeColor : "#ffffff",
								highlightFill : "#ee7f49",
								highlightStroke : "#ffffff",
								data : [],
								borderWidth: 1

							},
						]
				};
				var lineChartData = {
					labels : [],
					datasets : [
						{
							label: "Segunda serie de datos",
							fillColor : "rgba(151,187,205,0.2)",
							strokeColor : "#e9e225",
							pointColor : "#faab12",
							pointStrokeColor : "#fff",
							pointHighlightFill : "#fff",
							pointHighlightStroke : "rgba(151,187,205,1)",
							data : []
						}
					]
				};
				//*La configuracion de la grafica de barras*/
				var configCTX3= {
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
				a=validarSelectreg ('clienteProyectos');
				b=validarSelectreg ('hotelesProyectos');
				if (a===false && b===false){ toastr.error('Datos Requeridos. !!', 'Error', {timeOut: 3000});	$("#contregfirma").hide();$('#generaPDF').hide();$('#invoiceContep').hide();}
				if (a===false && b===true) { toastr.error('Datos Requeridos. !!', 'Error', {timeOut: 3000});	$("#contregfirma").hide();$('#generaPDF').hide();$('#invoiceContep').hide();}
				if (a===true  && b===false){ toastr.error('Datos Requeridos. !!', 'Error', {timeOut: 3000});	$("#contregfirma").hide();$('#generaPDF').hide();$('#invoiceContep').hide();}
				if (a===true  && b===true) {
					$("#contregfirma").show();/*Muestro la vista Previa*/
			 		$('#generaPDF').show();/*Muestro el boton de impresion*/
			 		$('#invoiceContep').show();
			 	/*-------Start la generacion del archivo---------------------------*/
			 		/*Obtener los valores del header de la vista previa*/
			 		$.get('/ajax-detalle-uno?cliente='+client_name,function (data){
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
					$.get('/ajax-img?imght='+client_name,function(data){
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
					$.get('/ajax-desglose-cant?hotel='+client_name,function(data){
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
						$("#cliente17").text(arrayDT01[6]); /*AP_Cambio*/
						$("#cliente18").text(arrayDT01[7]); /*AP_Garantia*/

						$("#cliente19").text(arrayDT01[8]); /*SW_Prestamo*/
						$("#cliente20").text(arrayDT01[9]); /*SW_Demo*/
						$("#cliente21").text(arrayDT01[10]);/*SW_Rent*/
						$("#cliente22").text(arrayDT01[11]);/*ZD_Venta*/
						$("#cliente23").text(arrayDT01[12]);/*ZD_Renta*/
						$("#cliente24").text(arrayDT01[13]);/*ZD_Demo*/


						$("#apstock").text(arrayDT01[1]); /*AP_Stock*/
						$("#apprestamo").text(arrayDT01[2]); /*AP_Prestamo*/
						$("#apventa").text(arrayDT01[3]); /*AP_Venta*/
						$("#aprenta").text(arrayDT01[4]); /*AP_Renta*/
						$("#apdemo").text(arrayDT01[5]); /*AP_Demo*/
						$("#swrentas").text(arrayDT01[10]); /*SW_Rent*/

						//- PIE CHART -
						//-------------
						// Get context with jQuery - using jQuery's .get() method.

	/*					var PieData = [
						    {
						      value: arrayDT01[1],
						      color: "#f56954",
						      highlight: "#f56954",
						      label: "AP Stock"
						    },
						    {
						      value: arrayDT01[4],
						      color: "#00a65a",
						      highlight: "#00a65a",
						      label: "AP Renta"
						    },
						    {
						      value: arrayDT01[2],
						      color: "#f39c12",
						      highlight: "#f39c12",
						      label: "AP Prestamo"
						    },
						    {
						      value: arrayDT01[3],
						      color: "#00c0ef",
						      highlight: "#00c0ef",
						      label: "AP Venta"
						    },
						    {
						      value: arrayDT01[5],
						      color: "#3c8dbc",
						      highlight: "#3c8dbc",
						      label: "AP Demo"
						    },
						    {
						      value: arrayDT01[12],
						      color: "#d2d6de",
						      highlight: "#d2d6de",
						      label: "SW Rent"
						    }
						];
*/

							var configpastelpie = {
								type: 'pie',
	 							data: 	{
											labels: ["AP Stock",	"AP Renta",	"AP Prestamo",	"AP Venta",	"AP Demo",	"SW Rent"],
										    datasets: [{
										            data: [
																	arrayDT01[1],arrayDT01[4],	arrayDT01[2],	arrayDT01[3],	arrayDT01[5],	arrayDT01[12],
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

						/*var pieOptions = {
						    //Boolean - Whether we should show a stroke on each segment (Si debemos mostrar de golpe cada segmento)
						    //segmentShowStroke: true, Genera el error container null por eso lo comente
						    //String - The colour of each segment stroke (El color de cada trazo de segmento)
						    segmentStrokeColor: "#fff",
						    //Number - The width of each segment stroke (La anchura de cada trazo de segmento)
						    segmentStrokeWidth: 1,
						    //Number - The percentage of the chart that we cut out of the middle (El porcentaje del gráfico que cortamos del medio)
						    percentageInnerCutout: 0, // Se asigna 0 para Pie charts (Grafica de pasteles)
						    //Number - Amount of animation steps (Cantidad de pasos de animación)
						    animationSteps: 100,
						    //String - Animation easing effect (Efecto de relajación de la animación)
						    animationEasing: "easeOutBounce",
						    //Boolean - Whether we animate the rotation of the Doughnut (Si animamos la rotación del Donut)
						    animateRotate: true,
						    //Boolean - Whether we animate scaling the Doughnut from the centre(Ya sea que animemos la ampliación del Donut desde el centro)
						    animateScale: false,
						    //Boolean - whether to make the chart responsive to window resizing(Si desea que el gráfico responda al cambio de tamaño de la ventana)
						    responsive: true, //<--Por esto se genera el error de resolucion

						    // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container(Si mantener la relación de aspecto inicial o no cuando la respuesta, si se establece en falso, ocupará todo el contenedor)
						    maintainAspectRatio: false,
						    //String - A legend template(Una plantilla de leyenda)
						    legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
						    //String - A tooltip template(Una plantilla de información de herramientas)
						    //tooltipTemplate: "<%=value %> <%=label%> users"
						};
*/
					$('#pieChart').remove();
					$('#canvas-char1').append('<canvas id="pieChart" height="300"></canvas>');
						var ctxepiepastel = document.getElementById("pieChart").getContext("2d");
						var myChartPieChart = new Chart(ctxepiepastel, configpastelpie);
						myChartPieChart.destroy();
						myChartPieChart = new Chart(ctxepiepastel, configpastelpie);

						//var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
						//var pieChart = new Chart(pieChartCanvas);
						//pieChart.Pie(PieData, pieOptions);

						//-----------------
						//- END PIE CHART -
						//-----------------
					});

					/*Generacion de grafica de barras*/

					$.get('/ajax-content-bar-det?hotel='+client_name,function(data){
						$.each(JSON.parse(data),function(index, objsd){
							//barChartData.labels.push(objsd.Equipo + '=' + objsd.Cantidad);
							//barChartData.datasets[0].data.push(objsd.Cantidad);

							configCTX3.data.labels.push(objsd.Equipo + '=' + objsd.Cantidad);
							configCTX3.data.datasets[0].data.push(objsd.Cantidad);

						});
						$('#chart-area3').remove();
						$('#canvas-holder').append('<canvas id="chart-area3" height="100"></canvas>');

						var ctx3 = document.getElementById("chart-area3").getContext("2d");
						//window.myPie = new Chart(ctx3).Bar(barChartData, {responsive:true});

						var charvart = new Chart(ctx3, configCTX3);
						charvart.destroy();
						charvart = new Chart(ctx3, configCTX3);

					});
					/*Generacion de grafica de lineas*/
					$.get('/ajax-content-lin-det?hotel='+client_name,function(data) {
						$.each(JSON.parse(data),function(index, objsd){

							configlinemodel.data.labels.push(objsd.Equipo+'='+objsd.Modelo+'='+objsd.Cantidad);
							configlinemodel.data.datasets[0].data.push(objsd.Cantidad);

						});
						$('#chart-area-lin').remove();
						$('#canvas-holder-lin').append('<canvas id="chart-area-lin" height="200" style="padding-right: 30px;"></canvas>');

						var ctx4 = document.getElementById("chart-area-lin").getContext("2d");
						//window.myPie = new Chart(ctx4).Line(lineChartData, {responsive:true});
						var charline = new Chart(ctx4, configlinemodel);
						charline.destroy();
						charline = new Chart(ctx4, configlinemodel);

					});
					/*Insercion de datos a la Tabla de detalles por equipo*/
					$.get('/ajax-content-tDet?hotel='+client_name,function(data){
						TableT1.fnClearTable();
						$.each(JSON.parse(data), function(index, datosT1){
							TableT1.fnAddData([
								datosT1.Equipo,
								datosT1.MAC,
								datosT1.Serie,
								datosT1.Modelo,
								datosT1.Descripcion,
								datosT1.Nombre_marca,
								datosT1.Nombre_estado,
								datosT1.Nombre_servicio,
							]);
						});
					});
			 	/*-------End la generacion del archivo-----------------------------*/

				}
		    });
		})();

		$('#generaPDF').on('click', function(e){
			//$('#sidebar-burger').addClass('sidebar-collapse');

			//$("#sidebar-burger").addClass("sidebar-collapse");
			$('#titulos').hide();
			$('#opciones').hide();
			window.print();
			$('#titulos').show();
			$('#opciones').show();
		});
		$(document).ready(function() {
		        console.log('el documento está preparado');
		});
