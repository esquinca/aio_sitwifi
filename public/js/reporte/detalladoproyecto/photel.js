$(document).ready(function() {
  //- START PIE CHART ANTENAS
  var contenedorOneLabel = [];
  var contenedorOneData = [];
		 $('#tableAP').dataTable( {
		    paging: false,
			  bFilter: false,
				ordering: false,
				bInfo: false,
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
		            var iTotalMarket1 = 0;
		            var iTotalMarket2 = 0;
		            var iTotalMarket3 = 0;
		            var iTotalMarket4 = 0;
		            var iTotalMarket5 = 0;
		            var iTotalMarket6 = 0;
		            var iTotalMarket7 = 0;
		            for ( var i=0 ; i<aaData.length ; i++ )
		            {
		            	  iTotalMarket1 += aaData[i][1]*1;
		            	  iTotalMarket2 += aaData[i][2]*1;
		            	  iTotalMarket3 += aaData[i][3]*1;
		            	  iTotalMarket4 += aaData[i][4]*1;
		                iTotalMarket5 += aaData[i][5]*1;
		                iTotalMarket6 += aaData[i][6]*1;
		                iTotalMarket7 += aaData[i][7]*1;
		            }

		            /* Calculate the market share for browsers on this page */
		            var iPageMarket1 = 0;
		            var iPageMarket2 = 0;
		            var iPageMarket3 = 0;
		            var iPageMarket4 = 0;
		            var iPageMarket5 = 0;
		            var iPageMarket6 = 0;
		            var iPageMarket7 = 0;
		            for ( var i=iStart ; i<iEnd ; i++ )
		            {
		                iPageMarket1 += aaData[ aiDisplay[i] ][1]*1;
		                iPageMarket2 += aaData[ aiDisplay[i] ][2]*1;
		                iPageMarket3 += aaData[ aiDisplay[i] ][3]*1;
		                iPageMarket4 += aaData[ aiDisplay[i] ][4]*1;
		                iPageMarket5 += aaData[ aiDisplay[i] ][5]*1;
		                iPageMarket6 += aaData[ aiDisplay[i] ][6]*1;
		                iPageMarket7 += aaData[ aiDisplay[i] ][7]*1;
		            }

		            /* Modify the footer row to match what we want */
		            var nCells = nRow.getElementsByTagName('th');
		            nCells[1].innerHTML = parseFloat(iPageMarket1 * 100)/100;
		            nCells[2].innerHTML = parseFloat(iPageMarket2 * 100)/100;
		            nCells[3].innerHTML = parseFloat(iPageMarket3 * 100)/100;
		            nCells[4].innerHTML = parseFloat(iPageMarket4 * 100)/100;
		            nCells[5].innerHTML = parseFloat(iPageMarket5 * 100)/100;
		         	  nCells[6].innerHTML = parseFloat(iPageMarket6 * 100)/100;
		            nCells[7].innerHTML = parseFloat(iPageMarket7 * 100)/100;

		            $("#apstock").text(nCells[1].innerHTML); /*AP_Stock*/
      					$("#apventa").text(nCells[3].innerHTML); /*AP_Venta*/
      					$("#aprenta").text(nCells[4].innerHTML); /*AP_Renta*/
      					$("#apprestamo").text(nCells[2].innerHTML); /*AP_Prestamo*/
      					$("#apdemo").text(nCells[5].innerHTML); /*AP_Demo*/
      					$("#swrenta").text(nCells[7].innerHTML);/*SW_Renta*/


                contenedorOneLabel = [];
                contenedorOneLabel.push("AP Stock");
                contenedorOneLabel.push("AP Venta");
                contenedorOneLabel.push("AP Renta");
                contenedorOneLabel.push("AP Prestamo");
                contenedorOneLabel.push("AP Demo");

                contenedorOneData = [];
                contenedorOneData.push(nCells[1].innerHTML);
                contenedorOneData.push(nCells[3].innerHTML);
                contenedorOneData.push(nCells[4].innerHTML);
                contenedorOneData.push(nCells[2].innerHTML);
                contenedorOneData.push(nCells[5].innerHTML);
                var configpastelpieone = {
                  type: 'pie',
                  data: 	{
                        labels: contenedorOneLabel,
                          datasets: [{
                                  data: contenedorOneData,
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
                $('#pieChart2').remove();
                $('#canvas-char2').append('<canvas id="pieChart2" height="180"></canvas>');
    						var pieChartCanvas_antenas = document.getElementById("pieChart2").getContext("2d");
    						var pieChart_antenas = new Chart(pieChartCanvas_antenas, configpastelpieone);
    						pieChart_antenas.destroy();
    						pieChart_antenas = new Chart(pieChartCanvas_antenas, configpastelpieone);
		        }
		    });

		    $('#tableSWZD').dataTable( {
		    	paging: false,
			    bFilter: false,
				ordering: false,
				bInfo: false,
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
		            var iTotalMarket1 = 0;
		            var iTotalMarket2 = 0;
		            var iTotalMarket3 = 0;
		            var iTotalMarket4 = 0;
		            var iTotalMarket5 = 0;
		            var iTotalMarket6 = 0;
		            var iTotalMarket7 = 0;
		            for ( var i=0 ; i<aaData.length ; i++ )
		            {
		            	iTotalMarket1 += aaData[i][1]*1;
		            	iTotalMarket2 += aaData[i][2]*1;
		            	iTotalMarket3 += aaData[i][3]*1;
		            	iTotalMarket4 += aaData[i][4]*1;
		                iTotalMarket5 += aaData[i][5]*1;
		                iTotalMarket6 += aaData[i][6]*1;
		                iTotalMarket7 += aaData[i][7]*1;
		            }

		            /* Calculate the market share for browsers on this page */
		            var iPageMarket1 = 0;
		            var iPageMarket2 = 0;
		            var iPageMarket3 = 0;
		            var iPageMarket4 = 0;
		            var iPageMarket5 = 0;
		            var iPageMarket6 = 0;
		            var iPageMarket7 = 0;
		            for ( var i=iStart ; i<iEnd ; i++ )
		            {
		                iPageMarket1 += aaData[ aiDisplay[i] ][1]*1;
		                iPageMarket2 += aaData[ aiDisplay[i] ][2]*1;
		                iPageMarket3 += aaData[ aiDisplay[i] ][3]*1;
		                iPageMarket4 += aaData[ aiDisplay[i] ][4]*1;
		                iPageMarket5 += aaData[ aiDisplay[i] ][5]*1;
		                iPageMarket6 += aaData[ aiDisplay[i] ][6]*1;
		                iPageMarket7 += aaData[ aiDisplay[i] ][7]*1;
		            }

		            /* Modify the footer row to match what we want */
		            var nCells = nRow.getElementsByTagName('th');
		            nCells[1].innerHTML = parseFloat(iPageMarket1 * 100)/100;
		            nCells[2].innerHTML = parseFloat(iPageMarket2 * 100)/100;
		            nCells[3].innerHTML = parseFloat(iPageMarket3 * 100)/100;
		            nCells[4].innerHTML = parseFloat(iPageMarket4 * 100)/100;
		            nCells[5].innerHTML = parseFloat(iPageMarket5 * 100)/100;
		         	  nCells[6].innerHTML = parseFloat(iPageMarket6 * 100)/100;
		            nCells[7].innerHTML = parseFloat(iPageMarket7 * 100)/100;

    					$("#swprest").text(nCells[5].innerHTML);/*SW_Prestamo*/
    					$("#swdemo").text(nCells[7].innerHTML); /*SW_Demo*/
    					$("#swstock").text(nCells[4].innerHTML);/*SW_Stock*/
    					$("#swventa").text(nCells[7].innerHTML);/*SW_venta*/
					    var swrentass=$("#swrenta").text();

					    //- START PIE CHART SWITCH
              var configpastelpietwo = {
                type: 'pie',
                data: 	{
                      labels: [
                        "SW Renta", "SW Prestamo", "SW Demo", "SW Stock", "SW Venta"
                        ],
                        datasets: [{
                                data: [
                                  swrentass, nCells[5].innerHTML, nCells[7].innerHTML, nCells[4].innerHTML, nCells[7].innerHTML,
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
              $('#pieChart1').remove();
              $('#canvas-char1').append('<canvas id="pieChart1" height="180"></canvas>');
              var pieChartCanvas_switch = document.getElementById("pieChart1").getContext("2d");
              var pieChart_switch = new Chart(pieChartCanvas_switch, configpastelpietwo);
              pieChart_switch.destroy();
              pieChart_switch = new Chart(pieChartCanvas_switch, configpastelpietwo);

		        }
		    });
			  $('#tablegraphs').dataTable( {
		    	paging: false,
			    bFilter: false,
  				ordering: false,
  				bInfo: false,
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
		            var iTotalMarket1 = 0;
		            var iTotalMarket2 = 0;
		            var iTotalMarket3 = 0;
		            var iTotalMarket4 = 0;
		            var iTotalMarket5 = 0;
		            for ( var i=0 ; i<aaData.length ; i++ )
		            {
		            	iTotalMarket1 += aaData[i][1]*1;
		            	iTotalMarket2 += aaData[i][2]*1;
		            	iTotalMarket3 += aaData[i][3]*1;
		            	iTotalMarket4 += aaData[i][4]*1;
		                iTotalMarket5 += aaData[i][5]*1;
		            }

		            /* Calculate the market share for browsers on this page */
		            var iPageMarket1 = 0;
		            var iPageMarket2 = 0;
		            var iPageMarket3 = 0;
		            var iPageMarket4 = 0;
		            var iPageMarket5 = 0;
		            for ( var i=iStart ; i<iEnd ; i++ )
		            {
		                iPageMarket1 += aaData[ aiDisplay[i] ][1]*1;
		                iPageMarket2 += aaData[ aiDisplay[i] ][2]*1;
		                iPageMarket3 += aaData[ aiDisplay[i] ][3]*1;
		                iPageMarket4 += aaData[ aiDisplay[i] ][4]*1;
		                iPageMarket5 += aaData[ aiDisplay[i] ][5]*1;
		            }

		            /* Modify the footer row to match what we want */
		            var nCells = nRow.getElementsByTagName('th');
		            nCells[1].innerHTML = parseFloat(iPageMarket1 * 100)/100;
		            nCells[2].innerHTML = parseFloat(iPageMarket2 * 100)/100;
		            nCells[3].innerHTML = parseFloat(iPageMarket3 * 100)/100;
		            nCells[4].innerHTML = parseFloat(iPageMarket4 * 100)/100;
		            nCells[5].innerHTML = parseFloat(iPageMarket5 * 100)/100;

		        }
		    });
			 $(".select2").select2();
		});
		var C001=0;
		var arrayDT01=[];

		$('#selectregproyect').on('change', function() {
		  C001=validarSelectreg ('selectregproyect');
		  $("#generaPDF").hide();
		});

		(function(){
		    $('#generarReg').on('click', function() {
		     	 C001=validarSelectreg ('selectregproyect');

			 	var client_name=$('#selectregproyect').val();
				var arrayIMG = [];
				var arrayDT=[];
				var arrayDT01=[];
				var arrayDTMODELOS=[];
				var TableT1 = $('#tableAP').dataTable();
				var TableT2 = $('#tableSWZD').dataTable();
				var TableT3 = $('#tablegraphs').dataTable();

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


			 	if ( C001===true){
			 		$('#generaPDF').show();/*Muestro el boton de impresion*/
			 		$('#invoiceContep').show();/*Muestro la vista Previa*/

			 		/*Obtener los valores del header de la vista previa*/
			 		$.get('/ajax-data-proyecto?proyecto='+client_name,function (data){
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
					$.get('/ajax-data-img-proy?imgrf='+client_name,function(data){
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
					$.get('/ajax-num-equip-proy?proyecto='+client_name,function(data){
						TableT3.fnClearTable();
						$.each(JSON.parse(data), function(index, datosT1){
							TableT3.fnAddData([
								datosT1.Nombre_hotel,
								datosT1.AP,
								datosT1.SW,
								datosT1.ZD,
								datosT1.Sonda,
								datosT1.CCTV,
								datosT1.SonicWall,
								datosT1.SW_Rent
							]);
						});
					});
					/*Generar Tabla de  AP*/
					$.get('/ajax-desg-tableO-proy?proyecto='+client_name,function(data){
						TableT1.fnClearTable();
						$.each(JSON.parse(data), function(index, datosT1){
							TableT1.fnAddData([
								datosT1.Nombre_hotel,
								datosT1.AP_Stock,
								datosT1.AP_Prestamo,
								datosT1.AP_Venta,
								datosT1.AP_Renta,
								datosT1.AP_Demo,
								datosT1.AP_Cambio,
								datosT1.SW_Rent,
							]);
						});
					});

					/*Generar Tabla de ZD & SW*/
        			$.get('/ajax-desg-tableT-proy?proyecto='+client_name,function(data){
						TableT2.fnClearTable();
						$.each(JSON.parse(data), function(index, datosT1){
							TableT2.fnAddData([
								datosT1.Nombre_hotel,
								datosT1.ZD_Venta,
								datosT1.ZD_Renta,
								datosT1.ZD_Demo,
								datosT1.SW_Stock,
								datosT1.SW_Prestamo,
								datosT1.SW_Demo,
								datosT1.SW_Venta
							]);
						});
					});

					/*Generacion de grafica de barras*/
					$.get('/ajax-content-bar-proy?proyecto='+client_name,function(data){
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
					$.get('/ajax-content-lin-proy?proyecto='+client_name,function(data) {
						$.each(JSON.parse(data),function(index, objsd){
							configlinemodel.data.labels.push(objsd.Equipo+'='+objsd.Modelo+'='+objsd.Cantidad);
							configlinemodel.data.datasets[0].data.push(objsd.Cantidad);
						});

            $('#chart-area-lin').remove();
						$('#canvas-holder-lin').append('<canvas id="chart-area-lin" height="200" style="padding-right: 30px;"></canvas>');
						var ctx4 = document.getElementById("chart-area-lin").getContext("2d");
						var chartline = new Chart(ctx4, configlinemodel);
						chartline.destroy();
						chartline = new Chart(ctx4, configlinemodel);
					});

			 	}
			 	if ( C001===false){
			 		$("#invoiceContep").hide(); /*Oculto la vista Previa*/
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
			if (campo==='selectregproyect') {
				selectProy=document.getElementById(campo).selectedIndex;
				if( selectProy == null || selectProy == 0 ) {
				    $('#selectregproyect').parent().parent().attr("class", "form-group has-error");
				    $('#invoiceContep').hide();
				    return false;
				}
				else {
					$("#selectregproyect").parent().parent().attr("class","form-group has-success");
					return true;
				}
			};
		}
