//Formulario de perfil
$('#update_data').on('click', function() {
	var z0=validarInput('inputNamefull');
	var z1=validarInput('inputdateing');
	var z2=validarInput('inputdatenac');
	var z3=validarInput('inputgradoest');
  var z4=validarInput('inputapellido');

	 if (z0 == false || z1 == false || z2 == false || z3 == false || z4 == false) {
	 	  toastr.error('Datos Requeridos. !!', 'Error', {timeOut: 1000});
	 }
	 else {
		 $("#formPerfil").submit();
	 }

});

function validarInput(campo) {
  if (campo != '') {
    select=document.getElementById(campo).value;
    if( select == null || select == 0 ) {
      $('#'+campo).parent().parent().attr("class", "form-group has-error");
      return false;
    }
    else {
      $("#"+campo).parent().parent().attr("class","form-group has-default");
      return true;
    }
  };
}
//Codigos para el profile
$('#inputdateing').datepicker({
		format: "yyyy-mm-dd",
    //viewMode: "months",
    //minViewMode: "months",
    //startDate: '0y',
    //endDate: '+3y',
    //startDate: '0m',
    //endDate: '0m',
    autoclose: true
});

$('#inputdatenac').datepicker({
    format: "yyyy-mm-dd",
    //viewMode: "months",
    //minViewMode: "months",
    //startDate: '0y',
    //endDate: '+3y',
    //startDate: '0m',
    //endDate: '0m',
    autoclose: true
});
	$.getJSON('http://api.wipmania.com/jsonp?callback=?', function (data) {
	    $("#divcontexto").text(data.address.country);
	});

    function control(f){
        var ext=['jpg','jpeg','png'];
        var v=f.value.split('.').pop().toLowerCase();
        for(var i=0,n;n=ext[i];i++){
            if(n.toLowerCase()==v)
                return
        }
        var t=f.cloneNode(true);
        t.value='';
        f.parentNode.replaceChild(t,f);
        //alert('Extensión no válida solo validas JPG, JPEG, PNG');
				toastr.error('Extensión no válida solo validas JPG, JPEG, PNG.!', 'Error', {timeOut: 3000});

        //$("#danger-alert").fadeTo(2000, 500).slideUp(500, function(){
          //$("#danger-alert").slideUp(500);
        //});
    }
    document.addEventListener("DOMContentLoaded", function(event) {
			var limpnacimiento= $("#inputdatenac").val();
			if(limpnacimiento == '--'){
				$("#inputdatenac").val('');
			}


			$("#cumpleEmpleado").hide();
      var arrayDT01 = [];
      //$("#danger-alert").hide();
			$.get('/profiles',function(data){
        $.each(JSON.parse(data),function(index, objdatablasr){
          objdatablasr.toString();
          arrayDT01.push(objdatablasr);
        });
        $("#jefediract").text(arrayDT01[0].Jefe);
				var dateOrigen= arrayDT01[0].date_ingreso;
				var diaC1= arrayDT01[0].dia;
				var mesC1= arrayDT01[0].mes;
				$('#diaCumpl').val(diaC1);
				$('#mesCumpl').val(mesC1);
				if (dateOrigen == '0000-00-00' || dateOrigen == null) {
					$("#fechaIngreso").text('No Disponible');
				}
				else {
					//console.log(arrayDT01);
					$("#fechaIngreso").text(dateOrigen);
					var fecha = dateOrigen.split('-');
				  var mesSinf=fecha[1];
				  var mes_inf="";
				  switch (mesSinf) {
				    case '01': mes_inf="Enero"; break;
				    case '02': mes_inf="Febrero"; break;
				    case '03': mes_inf="Marzo"; break;
				    case '04': mes_inf="Abril"; break;
				    case '05': mes_inf="Mayo"; break;
				    case '06': mes_inf="Junio"; break;
				    case '07': mes_inf="Julio"; break;
				    case '08': mes_inf="Agosto"; break;
				    case '09': mes_inf="Septiembre"; break;
				    case '10': mes_inf="Octubre"; break;
				    case '11': mes_inf="Noviembre"; break;
				    case '12': mes_inf="Diciembre"; break;
				  }
				  $("#fechaIngreso").text(fecha[2]+'-'+mes_inf+'-'+fecha[0]);
				}


				var diaA= $('#diaAct').val();		var mesA= $('#mesAct').val();
				var diaC= $('#diaCumpl').val();	var mesC= $('#mesCumpl').val();

				if (mesC === mesA) {
					if (diaC === diaA) {
						$("#cumpleEmpleado").show();
					}
					if (diaC != diaA) {
						$("#cumpleEmpleado").hide();
					}
				}
				else {
					$("#cumpleEmpleado").hide();
				}

      });
    });


$('#update_pass').on('click', function(){
  var z1=validarInput('inputnpass');
  var passnueva=$('#inputnpass').val();
  var mailact= $('#inputEmail').val();

  var _token = $('input[name="_token"]').val();

   if (z1 == false) {
      toastr.error('Datos Requeridos. !!', 'Error', {timeOut: 1000});
   }
   else {
     $("#formPerfilpass").submit();
   }
});

  $('#formPerfilpass :checkbox').change(function() {
      if (this.checked) {
        //alert('Clickeado');
        $('#inputnpass').attr('type', 'text');
          // the checkbox is now checked
      } else {
        //alert('NOClickeado');
        $('#inputnpass').attr('type', 'password');
          // the checkbox is now no longer checked
      }
  });