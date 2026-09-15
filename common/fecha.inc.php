<?php
date_default_timezone_set('America/Argentina/Buenos_Aires');
$dia_h = date("d");
$mes_h = date("m");
$ano_h = date("Y");
$dia_hoy = $ano_h . "-" . $mes_h . "-" . $dia_h;
$hora_hoy = date("H:i:s");
function fMax($d) {
	$calc_fecha = mktime(0,0,0,date("m"),date("d"),date("Y")) + $d * 24 * 60 * 60;
	$dsem = date("w", $calc_fecha);
	if ($dsem == 0) {
		$ret_fecha = mktime(0,0,0,date("m",$calc_fecha),date("d",$calc_fecha),date("Y",$calc_fecha)) + 1 * 24 * 60 * 60;
	} else if ($dsem == 6) {
		$ret_fecha = mktime(0,0,0,date("m",$calc_fecha),date("d",$calc_fecha),date("Y",$calc_fecha)) + 2 * 24 * 60 * 60;
	} else {
		$ret_fecha = $calc_fecha;
	}
	return date("Y-m-d",$ret_fecha);
}
function copyright($fecha) {
	$ano = date("Y");
	if ($fecha == $ano) {
		$anios = $fecha;
	} else {
		$anios = $fecha . "/" . $ano;
	}
	return $anios;
}
function fecha_muestra($fechac){ 
    $mifecha = explode("-", $fechac); 
    $lafecha=$mifecha[2]."/".$mifecha[1]."/".$mifecha[0]; 
    return $lafecha; 
}
function fecha_graba($fechac){ 
    $mifecha = explode("/", $fechac); 
    $lafecha=$mifecha[2]."-".$mifecha[1]."-".$mifecha[0]; 
    return $lafecha; 
}
function calcula_dias_ssd($fechainicio, $fechafin){
	$dias_calc = (strtotime($fechafin)-strtotime($fechainicio))/86400;
	$dsemi = date('w', strtotime($fechainicio));
	$dsemf = date('w', strtotime($fechafin));
	if (($dsemi == 3 && $dsemf == 1) || ($dsemi == 4 && ($dsemf == 1 || $dsemf == 2)) || ($dsemi == 5 && ($dsemf == 1 || $dsemf == 2 || $dsemf == 3))) {
		$dias_calc -= 2;
	} else if ($dsemi == 6 && ($dsemf == 1 || $dsemf == 2 || $dsemf == 3)) {
		$dias_calc -= 1;
	}
	return ($dias_calc);
}
function calcula_dias($fechainicio, $fechafin){
	return ((strtotime($fechafin)-strtotime($fechainicio))/86400);
}
?>