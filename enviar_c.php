<?php
//estos archivos facilitan la conexion con servidores de correo
include("corr/class.phpmailer.php"); 
include("corr/class.smtp.php"); 
//configuracion para utilizar un servidor de google como puente para el envio
// esta configuracion no se modifica
$mail = new PHPMailer(); 
$mail->IsSMTP(); 
$mail->SMTPAuth = true; 
$mail->SMTPSecure = "ssl"; 
$mail->Host = "smtp.gmail.com"; 
$mail->Port = 465; 
$mail->Username = "webmailvibebrand@gmail.com"; 
$mail->Password = "Acatenlor23";


//estos datos son obtenidos de la pagina al momento de dar click en el boton

$mail->From = $_POST['correo']; //correo del cliente
$mail->FromName = $_POST['nombre'];; //nombre del cliente
$mail->Subject = "FORMULARIO DE VOYASTIC"; //asunto para la cabecera
//$mail->AltBody = $_POST['message']; 
$mail->MsgHTML("correo: ".$_POST['correo']."<br><br>"."Telefono: ".$_POST['telefono']."<br><br>"."mensaje: ".$_POST['message']); //contenido del mensaje
$mail->AddAddress("hi@voyastic.com", "site administrator"); 
$mail->IsHTML(true); 
if(!$mail->Send())
{ 
	 echo "Error: " . $mail->ErrorInfo;
}else{
header("Location:index.html");
}
?>