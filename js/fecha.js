//Fecha actual con nombre de día y mes más la hora actual 
	var nombres_dias = new Array("Domingo", "Lunes", "Martes", "Mi&eacute;rcoles", "Jueves", "Viernes", "S&aacute;bado");
	var nombres_meses = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

function startTime(){
	'use strict';
	var fecha_actual = new Date();
	var dia_mes = fecha_actual.getDate();
	var dia_semana = fecha_actual.getDay(); 
	var mes = fecha_actual.getMonth() + 1;
	var anio = fecha_actual.getFullYear();
	document.getElementById('hoy').innerHTML=nombres_dias[dia_semana] + " " + dia_mes + " de " + nombres_meses[mes - 1] + " de " + anio;
	var today=new Date();
	var h=today.getHours();
	var m=today.getMinutes();
	var s=today.getSeconds();
	m=checkTime(m);
	s=checkTime(s);
	document.getElementById('reloj').innerHTML=h+":"+m+":"+s;
	setTimeout('startTime()',500);
}
function checkTime(i){
	'use strict';
	if (i<10) {
		i = "0" + i;
	}
	return i;
}
window.onload=function(){
	'use strict';
	startTime();
};
