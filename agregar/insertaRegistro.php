<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	
	<title>Alta nueva</title>
	<link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
	<script src="../jquery/jquery.min.js"></script>
      <script src="../js/bootstrap.min.js"></script>
<link href="../estilos.css" rel="stylesheet" media="screen">

<script  type="text/javascript">
/*function tiempo(){
  
  setTimeout("redirigir()", 5000);
  alert("Bienvenido " +$_POST['usuario']+" en breve se le redirijira a la pagina principal");
}
function redirigir(){
  window.location="../menu.php";
}*/
</script>


</head>
<body onload="tiempo()"> 
	
	<?php
$nick=$nombre=$pass=$apellido1=$apellido2=$email=$fecha_nacimiento="";
$nickErr=$nombreErr=$passErr=$apellido1Err=$apellido2Err=$emailErr=$fecha_nacimientoErr="";

$contra=md5($_REQUEST["pass"]);
$nick=$_REQUEST['nick'];

include '../qr-code/phpqrcode/qrlib.php';

// El nombre del fichero que se generará (una imagen PNG).
$file ='qr_'.$_REQUEST['nick'].'.png'; 
// La data que llevará.
$data = 'http://www.agvarelapru.esy.es/FORMULARIO-1/menu.php?usuario='.$nick.'&pass='.$contra; 

// Y generamos la imagen.
QRcode::png($data, $file);







if($nickErr=="" & $passErr=="" & $nombreErr=="" & $apellido1Err=="" & $apellido2Err=="" & $emailErr=="" & $fecha_nacimientoErr==""){
	require_once('../conexion.php');
	$conexion=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME) or die("Problemas con la conexión");
	


	mysqli_query($conexion,"insert into usuarios(Usuario_nick,Usuario_clave,Usuario_nombre,Usuario_apellido1,Usuario_apellido2,Usuario_email,Usuario_fecha_nacimiento,Usuario_bloqueado,Usuario_numero_intentos) values 
                       ('$_REQUEST[nick]','$contra','$_REQUEST[nombre]','$_REQUEST[apellido1]','$_REQUEST[apellido2]','$_REQUEST[email]','$_REQUEST[fecha_nacimiento]','1','0')")
  or die("Problemas en el select".mysqli_error($conexion));





$para = $_REQUEST["email"];
$titulo = 'Bienvenido a nuestra pagina '.$_REQUEST['nick'];
$mensaje=

'<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Confiramacion de registroL</title>
    <link rel="stylesheet" href="http://www.agvarelapru.esy.es/FORMULARIO-1/css/bootstrap.min.css">
    <script src="http://www.agvarelapru.esy.es/FORMULARIO-1/jquery/jquery.min.js"></script>
    <script src="http://www.agvarelapru.esy.es/FORMULARIO-1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="http://www.agvarelapru.esy.es/FORMULARIO-1/estilos.css">
</head>

<body>
        <nav class="navbar navbar-inverse">  
                <a class="navbar-brand" href="http://www.agvarelapru.esy.es/FORMULARIO-1/">La Pagina de Angel</a>
          </nav>

        <div class="container" Style="width: 80%; margin-left:10%">
      
               
                        
                          
        
                <h2>Confirmacion de registro</h2>
                <hr>
                <h4 Style="text-align:center">Hola gracias por acceder a nuestra paguina pulse el boton que esta a continuacion para confirmar el alta</h4>
                
                       <a class="btn btn-primary" Style="margin-left: 30%;" href="http://www.agvarelapru.esy.es/FORMULARIO-1/agregar/desbloqueo.php?nick='.$nick.'&pass='.$contra.'" >Confirmar registro</a>
                        <hr>
                        <h4 Style="text-align:center">Una vez confirmada la cuenta puedes acceder con el siguiente codigo QR:</h4>
                      <div class="qr">
                            <nav class="navbar navbar-inverse">  
                                    <a class="navbar-brand" href="http://www.agvarelapru.esy.es/FORMULARIO-1/">La Pagina de Angel</a>
                              </nav>
                            <h4>Usuario:'.$nick.'</h4>
                                <img src="http://www.agvarelapru.esy.es/FORMULARIO-1/agregar/'.$file.'" alt="Codigo QR">
                            </div>


                           
    </div>
    <div Style="width:90%; margin-left:5%">
    <hr Style="border-radius: 0px /0px;">
    <p Style="text-align:justify; color:rgb(94, 91, 91); "> Este correo electrónico contiene información confidencial. Cualquier reproducción, distribución o divulgación de su contenido están estrictamente prohibidos.Si no eres el destinatario indicado en el mismo y recibes este correo electrónico, te ruego me lo notifiques de inmediato a la dirección agvarelapru@gmail.com y destruyas el mensaje recibido sin obtener copia del mismo, ni distribuirlo, ni revelar su contenido. Angel Varela Pruaño no se hace responsable del mal uso de esta información.
      </p> 
       
      
    <p Style="text-align:justify; color:rgb(94, 91, 91);" >  Information in this message is confidential and may be legally privileged. It is intended solely for the person to whom it is addressed. If you are not the intended recipient, please notify the sender agvarelapru@gmail.com and please delete the message from your system immediately.
      </p>
    </div>

</body>

</html>';







/*'<html>'.
'<head><meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>Confiramacion de registroL</title>
<link rel="stylesheet" href="http://www.agvarelapru.esy.es/FORMULARIO-1/css/bootstrap.min.css">
<script src="http://www.agvarelapru.esy.es/FORMULARIO-1/jquery/jquery.min.js"></script>
<script src="http://www.agvarelapru.esy.es/FORMULARIO-1/js/bootstrap.min.js"></script>
<script src="http://www.agvarelapru.esy.es/FORMULARIO-1/estilos.css"></script></head>'.
'<body><div class="container" Style="background-color: lightgray;margin-top:20px;padding-top: 10px;padding-bottom: 10px;padding-right: 5%;padding-left: 5%;width: 80%;border-radius: 25px;"><h2 style="text-align: center;font-weight: BOLD;">Confirmacion de registro</h2><hr Style="border: 2px solid #007BFF; border-radius: 300px /2px;">'.
'<h4 style="text-align: center;">Hola gracias por acceder a nuestra paguina pulse el boton que esta a continuacion para confirmar el alta<h4> '.
'<a href="http://www.agvarelapru.esy.es/FORMULARIO-1/agregar/desbloqueo.php?nick='.$nick.'&pass='.$contra.'" class="btn btn-primary">Confirmar registro</a>'.
'<hr Style="border: 2px solid #007BFF; border-radius: 300px /2px;">'.
'<h4 style="text-align: center;">Una vez confirmada la cuenta puedes acceder con el siguiente codigo QR<h4>'.
'<img src="http://www.agvarelapru.esy.es/FORMULARIO-1/agregar/'.$file.'" alt="Codigo QR">'.
'</div></body>'.
'</html>';*/
$cabeceras = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
$cabeceras .= 'From: info@lapaginadeangel.com';
//$mensaje .='http://www.agvarelapru.esy.es/FORMULARIO-1/agregar/desbloqueo.php?nick='.$nick.'&pass='.$contra." "."\r\n";
//$mensaje .=$file;
//$cabeceras = 'From: info@lapaginadeangel.com' . "\r\n";
/*
'<form  action="http://www.agvarelapru.esy.es/FORMULARIO-1/agregar/desbloqueo.php?nick='.$nick.'&pass='.$contra.'"  method="post"> 
	<input type="hidden" name="qr"/>
	<button class="btn btn-primary" Style="margin-bottom: 5px;
	margin-left: 30%;
	width: 40%;
	background-color: solid #007BFF;
	text-align: center;
	padding: 3px 0;" type="submit">Confirmar registro</button></form>'.

*/

mail($para,$titulo,$mensaje,$cabeceras);


/*
// include phpmailer class
require_once '../PHPMailer/_lib/class.phpmailer.php';
// creates object
$mail = new PHPMailer(true); 


$full_name  =$nick;
$email      = strip_tags($_REQUEST['email']);
$subject    = "Sending HTML eMail using PHPMailer.";
$text_message    = "Hello $full_name, <br /><br /> This is HTML eMail Sent using PHPMailer. isn't it cool to send HTML email rather than plain text, it helps to improve your email marketing.";  

$mensaje='<html>'.
'<head><meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>Confiramacion de registroL</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="http://www.agvarelapru.esy.es/FORMULARIO-1/estilos.css"></script></head>'.
'<body><div class="container" Style="background-color: lightgray;margin-top:20px;padding-top: 10px;padding-bottom: 10px;padding-right: 5%;padding-left: 5%;width: 80%;border-radius: 25px;"><h2 style="text-align: center;font-weight: BOLD;">Confirmacion de registro</h2><hr Style="border: 2px solid #007BFF; border-radius: 300px /2px;">'.
'<h4 style="text-align: center;">Hola gracias por acceder a nuestra paguina pulse el boton que esta a continuacion para confirmar el alta<h4> '.
'<a href="http://www.agvarelapru.esy.es/FORMULARIO-1/agregar/desbloqueo.php?nick='.$nick.'&pass='.$contra.'" class="btn btn-primary">Confirmar registro</a>'.
'<hr Style="border: 2px solid #007BFF; border-radius: 300px /2px;">'.
'<h4 style="text-align: center;">Una vez confirmada la cuenta puedes acceder con el siguiente codigo QR<h4>'.
'<img src="http://www.agvarelapru.esy.es/FORMULARIO-1/agregar/'.$file.'" alt="Codigo QR">'.
'</div></body>'.
'</html>';



try
{
 $mail->IsSMTP(); 
 $mail->isHTML(true);
 $mail->SMTPDebug  = 0;                     
 $mail->SMTPAuth   = true;                  
 $mail->SMTPSecure = "ssl";                 
 $mail->Host       = "smtp.gmail.com";      
 $mail->Port       = 465;             
 $mail->AddAddress($email);
 $mail->Username   ="agvarelapru@gmail.com";  
					  $mail->Password   ="24del5del05";            
					 // $mail->SetFrom('agvarelapru@gmail.com','Pagina de angel');
					  $mail->AddReplyTo("agvarelapru@gmail.com","Pagina de angel");
 $mail->Subject    = $subject;
 $mail->Body    = $mensaje;
 $mail->AltBody    = $mensaje;
}
 catch(phpmailerException $ex)
 {
  $msg = "<div class='alert alert-warning'>".$ex->errorMessage()."</div>";
 }
*/


mysqli_close($conexion);
}	
	?>
<div class="container">
<div class="form-group">



<ul>
<h2 class="envio">ALTA USUARIO</h2>
<hr />
<li style="border-bottom:1px solid #007BFF"><label for="nick" >Nick:</label><?php echo $nick = $_POST['nick'];?><br> <span class="error"><?php echo $nickErr;?></span></li>
<li style="border-bottom:1px solid #007BFF"><label for="pass" >Contraseña:</label><?php echo $pass = $contra;?> <br><span class="error"><?php echo $passErr;?></span></li>
<li style="border-bottom:1px solid #007BFF"><label for="nombre" >Nombre:</label><?php echo $nombre = $_POST['nombre'];?><br><span class="error"><?php echo $nombreErr;?></span></li>
<li style="border-bottom:1px solid #007BFF"><label for="apellido1" >Apellido 1:</label><?php echo $apellido1 = $_POST['apellido1'];?><br><span class="error"><?php echo $apellido1Err;?></span></li>
<li style="border-bottom:1px solid #007BFF"><label for="apellido2" >Apellido 2:</label><?php echo $apellido2 = $_POST['apellido2'];?><br><span class="error"><?php echo $apellido2Err;?></span></li>
<li style="border-bottom:1px solid #007BFF"><label for="email" >E-mail:</label><?php echo $email = $_POST['email'];?><br><span class="error"><?php echo $emailErr;?></span></li>
<li style="border-bottom:1px solid #007BFF"><label for="fecha_nacimiento" >Fecha de Nacimiento:</label><?php echo $fecha_nacimiento = $_POST['fecha_nacimiento'];?><br><span class="error"><?php echo $fecha_nacimientoErr;?></span></li>




<?php echo "<img src='qr_".$_REQUEST['nick'].".png'>";?>
<br>
<?php 



if($nickErr=="" & $passErr=="" & $nombreErr=="" & $apellido1Err=="" & $apellido2Err=="" & $emailErr=="" & $fecha_nacimientoErr==""){
echo "<h3 class='envio'> El usuario fue dado de alta correctamente. </h3>";
echo "<h4 class='envio'> Compruebe su cuenta de correo para confirmar la cuenta. </h4>";
}else{
echo "<h3 style=color:red> El Usuario NO se agrego. </h3>";
}
?>
<br>

</ul>
</div>

</body>
</html>


