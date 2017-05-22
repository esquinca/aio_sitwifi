<?PHP
	$dias = array("Domingo","Lunes","Martes","Mi&eacute;rcoles","Jueves","Viernes","S&aacute;bado");
	$diaDD = date('d');
	$diaMM = date('m');
	$diaYYYY = date('Y');
	$meses = array("enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre");
	echo $dias[date("w")].', '.$diaDD.' de '.$meses[date("w")].' de '.$diaYYYY;	
?>