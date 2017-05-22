$('#generaPDF').on('click', function(e){
			$('#titulos').hide();
			$('#opciones').hide();
			$('#contenedor1Chart').addClass('col-sm-9');
			//$("body").addClass('sidebar-collapse'); //Comprimir siderbar
			window.print();
			$('#titulos').show();
			$('#opciones').show();
			$('#contenedor1Chart').removeClass('col-sm-9');
});
document.addEventListener("DOMContentLoaded", function(event) {
    $.get('/reporte_distrib_data',function(data){
      var configdoughnutone = {
        type: 'doughnut',
        data: 	{
          labels:[],
          //["Oficinas Centro y Norte=25","Oficina Sureste y Caribe=50"],
          datasets: [{
            data:[],
            //[25,50],
            backgroundColor: [
              "#3C8DBC",
              "#F39C12",
              "#f39c12",
              "#00c0ef",
              "#3c8dbc",
              "#d2d6de",
            ],
            hoverBackgroundColor: [
              "#3C8DBC",
              "#F39C12",
              "#f39c12",
              "#00c0ef",
              "#3c8dbc",
              "#d2d6de",
            ]
          }]
        },
        options: {
          legend: {
            display: true,
            alignment: 'far',
            position: 'bottom',
          },
          title: { display: true, text: 'Monitoreo por sonda' },
        }
      };
      $.each(JSON.parse(data),function(index, objsd){
        configdoughnutone.data.labels.push(objsd.Nombre_Operacion+' = '+objsd.Cantidad);
        configdoughnutone.data.datasets[0].data.push(objsd.Cantidad);
      });

      $('#pieChart').remove();
      $('#contenedor1Chart').append('<canvas id="pieChart" height="250"></canvas>');
      var ctxdoughnut = document.getElementById("pieChart").getContext("2d");
      var myChartdoughnutone = new Chart(ctxdoughnut, configdoughnutone);
      myChartdoughnutone.destroy();
      myChartdoughnutone = new Chart(ctxdoughnut, configdoughnutone);
    });

    $.get('/reporte_distrib_gfc1',function(data){
        var configdoughnuttwo = {
          type: 'doughnut',
          data: 	{
            labels: [],
            //["Mexico=10365","Republica Dominicana=1286","Jamaica=421"],
            datasets: [{
              data: [],
              //[10365,1286,421],
              backgroundColor: [
                "#3C8DBC",
                "#F39C12",
                "#BD0006",
                "#00c0ef",
                "#3c8dbc",
                "#d2d6de",
              ],
              hoverBackgroundColor: [
                "#3C8DBC",
                "#F39C12",
                "#BD0006",
                "#00c0ef",
                "#3c8dbc",
                "#d2d6de",
              ]
            }]
          },
          options: {
            legend: {
              display: true,
              alignment: 'far',
              position: 'bottom',
            },
            title: { display: true, text: 'Grafica de la distribución de antenas por país' },
          }
        };
	    	$.each(JSON.parse(data),function(index, objsd){
          configdoughnuttwo.data.labels.push(objsd.Pais+' = '+objsd.Cantidad);
          configdoughnuttwo.data.datasets[0].data.push(objsd.Cantidad);
			  });

        $('#pieChart2').remove();
        $('#canvas-holder-br1').append('<canvas id="pieChart2" height="250" style="padding-right: 30px;"></canvas>');
        var ctxdoughnuttwo = document.getElementById("pieChart2").getContext("2d");
        var myChartdoughnuttwo = new Chart(ctxdoughnuttwo, configdoughnuttwo);
        myChartdoughnuttwo.destroy();
        myChartdoughnuttwo = new Chart(ctxdoughnuttwo, configdoughnuttwo);
    });

    $.get('/reporte_distrib_gfc2',function(data){
      var configCTX1= {
        type: 'horizontalBar',
        data: {
          //labels:  ["Enero 2017", "Febrero 2017", "Marzo 2017", "April 2017", "Mayo 2017", "Junio 2017"],
          labels: [],
          datasets: [{
            label: 'Valor',
            //data: [200, 185, 590, 621, 250, 400],
            data: [],
            backgroundColor: ["#F7464A","#46BFBD","#FDB45C","#949FB1","#4D5360","#49287B",'#1e98e4','#ff2a00','#ffc500','#9bfc48','#563d7c','#fd9104','#1abc9c','#d11f6c','#008ee4','#dc78c4','#36d331','#d3ce31','#d35c31','#d34631','#d37531','#5931d3','#776d97','#7f1578'],
            //['rgba(233, 226, 37, 1)','rgba(255, 99, 132, 0.2)','rgba(54, 162, 235, 0.2)','rgba(255, 206, 86, 0.2)','rgba(75, 192, 192, 0.2)','rgba(153, 102, 255, 0.2)'],
            borderColor: ["#F7464A","#46BFBD","#FDB45C","#949FB1","#4D5360","#49287B",'#1e98e4','#ff2a00','#ffc500','#9bfc48','#563d7c','#fd9104','#1abc9c','#d11f6c','#008ee4','#dc78c4','#36d331','#d3ce31','#d35c31','#d34631','#d37531','#5931d3','#776d97','#7f1578'],
            //['rgba(233, 226, 37, 1)','rgba(255, 99, 132, 0.2)','rgba(54, 162, 235, 0.2)','rgba(255, 206, 86, 0.2)','rgba(75, 192, 192, 0.2)','rgba(153, 102, 255, 0.2)'],

            borderWidth: 1
          }]
        },
        options: {
          responsive: true,
          tooltips: {
            mode: 'label'
          },
          elements: { line: { fill: true } },
          title: { display: true, text: 'Grafica de la distribución de antenas por vertical' },
          legend: {
            display: false,
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
	    	$.each(JSON.parse(data),function(index, objsd){
	    		configCTX1.data.labels.push(objsd.Vertical+"->"+objsd.Pais+"="+objsd.Cantidad);
          configCTX1.data.datasets[0].data.push(objsd.Cantidad);
			});
        $('#pieChart3').remove();
        $('#canvas-holder-br2').append('<canvas id="pieChart3" height="150" style="padding-right: 70px;"></canvas>');
        var ctx1 = document.getElementById("pieChart3").getContext("2d");
        var chartbarone = new Chart(ctx1, configCTX1);
        chartbarone.destroy();
        chartbarone = new Chart(ctx1, configCTX1);
    });
		$.get('/reporte_distrib_gfc2',function(data){
			var configCTX2= {
				type: 'horizontalBar',
				data: {
					//labels:  ["Enero 2017", "Febrero 2017", "Marzo 2017", "April 2017", "Mayo 2017", "Junio 2017"],
					labels: [],
					datasets: [{
						label: 'Valor',
						//data: [200, 185, 590, 621, 250, 400],
						data: [],
						backgroundColor: ["#F7464A","#46BFBD","#FDB45C","#949FB1","#4D5360","#49287B",'#1e98e4','#ff2a00','#ffc500','#9bfc48','#563d7c','#fd9104','#1abc9c','#d11f6c','#008ee4','#dc78c4','#36d331','#d3ce31','#d35c31','#d34631','#d37531','#5931d3','#776d97','#7f1578'],
						//['rgba(233, 226, 37, 1)','rgba(255, 99, 132, 0.2)','rgba(54, 162, 235, 0.2)','rgba(255, 206, 86, 0.2)','rgba(75, 192, 192, 0.2)','rgba(153, 102, 255, 0.2)'],
						borderColor: ["#F7464A","#46BFBD","#FDB45C","#949FB1","#4D5360","#49287B",'#1e98e4','#ff2a00','#ffc500','#9bfc48','#563d7c','#fd9104','#1abc9c','#d11f6c','#008ee4','#dc78c4','#36d331','#d3ce31','#d35c31','#d34631','#d37531','#5931d3','#776d97','#7f1578'],
						//['rgba(233, 226, 37, 1)','rgba(255, 99, 132, 0.2)','rgba(54, 162, 235, 0.2)','rgba(255, 206, 86, 0.2)','rgba(75, 192, 192, 0.2)','rgba(153, 102, 255, 0.2)'],

						borderWidth: 1
					}]
				},
				options: {
					responsive: true,
					tooltips: {
						mode: 'label'
					},
					elements: { line: { fill: true } },
					title: { display: true, text: 'Grafica de la distribución de antenas por pais' },
					legend: {
						display: false,
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
				$.each(JSON.parse(data),function(index, objsd){
					configCTX2.data.labels.push(objsd.Vertical+"->"+objsd.Pais+"="+objsd.Cantidad);
					configCTX2.data.datasets[0].data.push(objsd.Cantidad);
			});

				$('#pieChart4').remove();
				$('#canvas-holder-br3').append('<canvas id="pieChart4" height="150" style="padding-right: 30px;"></canvas>');
				var ctx2 = document.getElementById("pieChart4").getContext("2d");
				var chartbarotwo = new Chart(ctx2, configCTX2);
				chartbarotwo.destroy();
				chartbarotwo = new Chart(ctx2, configCTX2);
				$('#canvas-holder-br3').append('<b>Nota: Datos de prueba</b>');
		});

		$.get('/reporte_distrib_gfc3',function(data){
			var configCTX3= {
				type: 'horizontalBar',
				data: {
					//labels:  ["Enero 2017", "Febrero 2017", "Marzo 2017", "April 2017", "Mayo 2017", "Junio 2017"],
					labels: [],
					datasets: [{
						label: 'Valor',
						//data: [200, 185, 590, 621, 250, 400],
						data: [],
						backgroundColor: ["#F7464A","#46BFBD","#FDB45C","#949FB1","#4D5360","#49287B",'#1e98e4','#ff2a00','#ffc500','#9bfc48','#563d7c','#fd9104','#1abc9c','#d11f6c','#008ee4','#dc78c4','#36d331','#d3ce31','#d35c31','#d34631','#d37531','#5931d3','#776d97','#7f1578','#FF6347'],
						//['rgba(233, 226, 37, 1)','rgba(255, 99, 132, 0.2)','rgba(54, 162, 235, 0.2)','rgba(255, 206, 86, 0.2)','rgba(75, 192, 192, 0.2)','rgba(153, 102, 255, 0.2)'],
						borderColor: ["#F7464A","#46BFBD","#FDB45C","#949FB1","#4D5360","#49287B",'#1e98e4','#ff2a00','#ffc500','#9bfc48','#563d7c','#fd9104','#1abc9c','#d11f6c','#008ee4','#dc78c4','#36d331','#d3ce31','#d35c31','#d34631','#d37531','#5931d3','#776d97','#7f1578','#FF6347'],
						//['rgba(233, 226, 37, 1)','rgba(255, 99, 132, 0.2)','rgba(54, 162, 235, 0.2)','rgba(255, 206, 86, 0.2)','rgba(75, 192, 192, 0.2)','rgba(153, 102, 255, 0.2)'],

						borderWidth: 1
					}]
				},
				options: {
					responsive: true,
					tooltips: {
						mode: 'label'
					},
					elements: { line: { fill: true } },
					title: { display: true, text: 'Grafica de sitios por país y estados',},
					legend: {
						display: false,
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
				$.each(JSON.parse(data),function(index, objsd){
					configCTX3.data.labels.push(objsd.Pais+"->"+objsd.Estado+"="+objsd.Cantidad);
					configCTX3.data.datasets[0].data.push(objsd.Cantidad);
			});

				$('#pieChart5').remove();
				$('#canvas-holder-br4').append('<canvas id="pieChart5" height="150"style="padding-right: 30px;"></canvas>');
				var ctx3 = document.getElementById("pieChart5").getContext("2d");
				var chartbarothree = new Chart(ctx3, configCTX3);
				chartbarothree.destroy();
				chartbarothree = new Chart(ctx3, configCTX3);
		});








});
