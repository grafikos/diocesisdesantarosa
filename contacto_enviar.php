<?php
include("common/fecha.inc.php");
require('PHPmailer/PHPMailer.php');
require('PHPmailer/Exception.php');
require('PHPmailer/SMTP.php');

$error_form = 0;
$error_datos = "";
if ($_POST['nombre'] == "") {
	$error_datos .= "<br>Falta Nombre";
	$error_form = 1;
}
if ($_POST['email'] == "") {
	$error_datos .= "<br>Falta Correo Electr&oacute;nico";
	$error_form = 1;
} else {
	require_once "common/valida_email.inc.php";
	if($_POST['email']) {
		$error = validaEmail($_POST['email']);
		if ($error == 1) {
			$error_datos .= "<br>El Correo Electr&oacute;nico no es v&aacute;lido";
			$error_form = 1;
		} else if ($error == 2) {
			$error_datos .= "<br>El Correo no existe";
			$error_form = 1;
		}
	}
}
if ($_POST['asunto'] == "") {
	$error_datos .= "<br>Falta Asunto";
	$error_form = 1;
}
if ($_POST['mensaje'] == "") {
	$error_datos .= "<br>Falta Mensaje";
	$error_form = 1;
}
if ($error_form == 0) {
	$hoy = date("d-m-Y H:i:s");

	$nombre = $_POST['nombre'];
	$asunto = $_POST['asunto'];
	$mail_manda = trim($_POST['email']);
	$comentario = $_POST['mensaje'];
	
	$mensaje = '<html>
				<head>
				</head>
				<body>
					<left>
					<span style="font-size:12pt; color:red">Correo enviado: '.$hoy.'</span><br><br>
					<span style="font-size:12pt; color:blue">Nombre: <b>'.$nombre.'</b></span><br><br>
					<span style="font-size:12pt; color:black">Mensaje: <b>'.$comentario.'</b></span><br>
					</left>
				</body></html>';
	//echo $Mensaje;

	
$mail = new PHPMailer\PHPMailer\PHPMailer();

    //Server settings
	$mail->setLanguage('es', 'PHPmailer/language/');
	$mail->SMTPDebug = 0;                		      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'blue174.dnsmisitio.net';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
 	$mail->CharSet = 'UTF-8';
   	$mail->Username   = 'contacto@diocesisdesantarosa.org';                     //SMTP username
    $mail->Password   = 'Diocesis#2026';                               //SMTP password
    $mail->SMTPSecure = 'ssl';         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 465;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
	$mail->XMailer = ' ';

    //Recipients
    $mail->setFrom(trim($_POST['email']), $_POST['nombre']);     //Add a recipient
    $mail->addAddress('obsantarosa@gmail.com.ar', 'Diocesis de Santa Rosa');
//    $mail->addAddress('ellen@example.com');               //Name is optional
    $mail->addReplyTo(trim($_POST['email']), $_POST['nombre']);
//    $mail->addCC('cc@example.com');
//    $mail->addBCC('bcc@example.com');

    //Attachments
//    $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
//    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = mb_convert_encoding('Mensaje desde el sitio web: ' . $asunto, 'ISO-8859-1', 'UTF-8');
    $mail->Body    = $mensaje;
    $mail->AltBody = $mensaje;

    
	if(!$mail->send()) {
		$bd_error = 'Error del Mailer: ' . $mail->ErrorInfo;
	} else {
		$db_error = 0;
	}

} else {
	echo $error_datos;
}
?>
