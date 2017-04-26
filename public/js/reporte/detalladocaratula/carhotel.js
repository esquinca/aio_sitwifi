$(document).ready(function() {
			$(".select2").select2();
		});
		var C001=0;
		var arrayDT01=[];

		$('#selectcarta').on('change', function() {
		  C001=validarSelectreg ('selectcarta');
		  $("#generaPDF").hide();
		});

		(function(){
		    $('#generarReg').on('click', function() {
		     	 C001=validarSelectreg ('selectcarta');

			 	var client_name=$('#selectcarta').val();
				var arrayIMG = [];
				var arrayCE=[];
				var arrayDT01=[];
        var configCTX1= {
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
        var configCTX2= {
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

        var barChartData1 = {
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
				var barChartData2 = {
						labels : [],
						datasets : [
							{
								fillColor : "#337AB7",
								strokeColor : "#ffffff",
								highlightFill : "#41C8F5",
								highlightStroke : "#ffffff",
								data : [],
								borderWidth: 1

							},
						]
				};


			 	if ( C001===true){
			 		$('#generaPDF').show();/*Muestro el boton de impresion*/
			 		$('#invoiceContep').show();/*Muestro la vista Previa*/
			 		/*Obtener los valores de las tablas de la vista previa*/
			 		$.get('/reporte_detalladoc_data?cliente='+client_name,function (data){
						$.each(JSON.parse(data),function(index, objdataw){
							if (objdataw==null) {objdataw='';}
							objdataw.toString();
							arrayCE.push(objdataw);
						});

						$('#responsableEmpresa').text(arrayCE[0]);
						$('#areaEmpresa').text(arrayCE[1]);
						$('#telefonoEmpresa').text(arrayCE[2]);
						$('#correoEmpresa').text(arrayCE[3]);

						$('#nameEmpCliente').text(arrayCE[4]);

						$('#respEmpCliente').text(arrayCE[5]);
						$('#paisEmpCliente').text(arrayCE[6]);
						$('#estadoEmpCliente').text(arrayCE[7]);
						$('#dirEmpCliente').text(arrayCE[8]);

						$('#telfEmpCliente').text(arrayCE[9]);
						$('#correoEmpCliente').text(arrayCE[10]);

						$('#fechaInicio').text(arrayCE[11]);
						$('#fechaFin').text(arrayCE[12]);
					});
					/*Generacion de grafica de barras de equipos instalados*/
					$.get('/reporte_detalladoc_gfc1?proyecto='+client_name,function(data){
						$.each(JSON.parse(data),function(index, objsd){
              configCTX1.data.labels.push(objsd.Equipo + '=' + objsd.Cantidad);
              configCTX1.data.datasets[0].data.push(objsd.Cantidad);
						});
            $('#chart-areabr1').remove();
            $('#canvas-holder-br1').append('<canvas id="chart-areabr1" height="200"></canvas>');
            var ctx3 = document.getElementById("chart-areabr1").getContext("2d");
            var chartbar = new Chart(ctx3, configCTX1);
            chartbar.destroy();
            chartbar = new Chart(ctx3, configCTX1);

					});
					/*Generacion de grafica de barras de modelos*/
					$.get('/reporte_detalladoc_gfc2?proyecto='+client_name,function(data){
						$.each(JSON.parse(data),function(index, objsd){
              configCTX2.data.labels.push(objsd.Equipo +'='+ objsd.Modelo + '=' + objsd.Cantidad);
              configCTX2.data.datasets[0].data.push(objsd.Cantidad);
						});
            $('#chart-areabr2').remove();
            $('#canvas-holder-br2').append('<canvas id="chart-areabr2" height="200"></canvas>');
            var ctx4 = document.getElementById("chart-areabr2").getContext("2d");
            var chartbardos = new Chart(ctx4, configCTX2);
            chartbardos.destroy();
            chartbardos = new Chart(ctx4, configCTX2);
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
			$('#tablegraphs').addClass('TamañoLetra');
			$('#tablegraphs2').addClass('TamañoLetra');
			window.print();
			$('#titulos').show();
			$('#opciones').show();
			$('#tablegraphs').removeClass('TamañoLetra');
			$('#tablegraphs2').removeClass('TamañoLetra');
		});

		function validarSelectreg(campo) {
			if (campo==='selectcarta') {
				selectProy=document.getElementById(campo).selectedIndex;
				if( selectProy == null || selectProy == 0 ) {
				    $('#selectcarta').parent().parent().attr("class", "form-group has-error");
				    $('#invoiceContep').hide();
				    return false;
				}
				else {
					$("#selectcarta").parent().parent().attr("class","form-group has-success");
					return true;
				}
			};
		}
