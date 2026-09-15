<?php
function validaEmail($email) {
	$mail_correcto = 0;
	$exp = "/^[A-z0-9\\._-]+@[A-z0-9][A-z0-9-]*(\\.[A-z0-9_-]+)*\\.([A-z]{2,6})$/"; 
	$matches = null;
    if(filter_var($email, FILTER_VALIDATE_EMAIL)) { 
		list($usuario, $dominio) = explode("@", $email);
		if(checkdnsrr($dominio, "MX") === TRUE){ 
			return 0;
		}else{ 
			return 2;
		} 
    }else{ 
		return 1;
    } 
}
?>
