function aMayuscula(field) {   
	field.value = field.value.toUpperCase()   
}   
function isBetween(n, a, b){
	return (n - a) * (n - b);
}
function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
    return pattern.test(emailAddress);
}
function activaOk(mensaje){
	$('#caja_ok_error').html(mensaje);
	$('#caja_ok_error').removeClass("form_error").addClass("form_ok");
	$('#caja_ok_error').show();
}
function activaError(mensaje){
	$('#caja_ok_error').html(mensaje);
	$('#caja_ok_error').removeClass("form_ok").addClass("form_error");
	$('#caja_ok_error').show();
}
function desactivaOE(){
	$('#caja_ok_error').hide();
	$('#caja_ok_error').empty();
}
window.addEventListener("scroll", function () {
  const header = document.querySelector("header");
  const cabecera = document.querySelector(".cabecera");
  const logo = document.querySelector(".logo-tipo");
  const sr = document.querySelector(".sr");
  const dsr = document.querySelector(".dsr");
  const fondo = document.querySelector(".fondo");
  const iconos = document.querySelector(".iconos_access");
  const menu = document.querySelector("nav");
  if (window.scrollY > 50) {
    header.classList.add("shrink");
    cabecera.classList.add("shrink");
    logo.classList.add("shrink");
    sr.classList.add("shrink");
    dsr.classList.add("shrink");
    fondo.classList.add("shrink");
    iconos.classList.add("shrink");
    menu.classList.add("shrink");
  } else {
    header.classList.remove("shrink");
    cabecera.classList.remove("shrink");
    logo.classList.remove("shrink");
    sr.classList.remove("shrink");
    dsr.classList.remove("shrink");
    fondo.classList.remove("shrink");
    iconos.classList.remove("shrink");
    menu.classList.remove("shrink");
}
});