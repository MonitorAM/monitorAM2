<?php
header('Content-Type: text/html; charset=UTF-8'); 
include("conex.php");
include("PHPMailer/class.phpmailer.php");
include("PHPMailer/class.smtp.php");

$usuario= $_POST['rut'];
$buscarCorreo="SELECT email,acceso.clave from usuario,acceso where rut='$usuario' and usuario.idUsuario=acceso.usuario";
$result=mysql_query($buscarCorreo,$enlace);
$row=mysql_fetch_array($result);
$correo=$row['email'];
$clave=$row['clave'];
	
$text="Estimado(a) :\nSe ha recibido una solicitud de recuperacion de su contraseña. "."\n\n";
$text=$text."Contraseña Temporal : ".$clave.",
con ella puede realizar el cambio de su contraseña. 
Este correo es informativo, favor eliminar luego del ingreso exitoso.";

//echo $text;
//echo $text;
//Conexion con  Email AM
$mail             = new PHPMailer();
$mail->IsSMTP();
$mail->Host = "smtp-mail.outlook.com";
$mail->SMTPAuth= true;
$mail->Port = 587;  
$mail->SMTPSecure = 'tls';               
$mail->Username   = "monitor_asistencia@outlook.cl";  
$mail->Password   = "monitor_pass";  
$mail->From       = "monitor_asistencia@outlook.cl";
$mail->FromName   = "Administrador AM:Monitor de Asistencia";
$mail->Subject    = "Olvido su contraseña?";
$mail->Body       = $text; 
$mail->CharSet = 'UTF-8';          
$mail->AddBCC($correo);
if(!$mail->Send()){
  	echo "Mailer Error: " . $mail->ErrorInfo;
}
?>
<h1> Se envio su contraseña a su correo asociado. </h1>

<h3> <?php echo $correo; ?> </h3>