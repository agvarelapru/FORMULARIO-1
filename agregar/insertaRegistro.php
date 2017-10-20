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


  $registros=mysqli_query($conexion,"select Usuario_id
  from usuarios where Usuario_nick like '$_REQUEST[nick]' ") or
die("Problemas en el select:".mysqli_error($conexion));

$id="";
while ($id = mysqli_fetch_array($registros))
{



$para = $_REQUEST["email"];
$titulo = 'Bienvenido a nuestra pagina '.$_REQUEST['nick'];
$mensaje='<html>'.
'<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"><title>Confiramacion de registroL</title><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script></head>'.
'<body><div class="container" Style="background-color: lightgray;margin-top:20px;padding-top: 10px;padding-bottom: 10px;padding-right: 5%;padding-left: 5%;width: 80%;border-radius: 25px;"><h2 style="text-align: center;font-weight: BOLD;">Confirmacion de registro</h2><hr Style="border: 2px solid #007BFF; border-radius: 300px /2px;">'.
'<h4 style="text-align: center;">Hola gracias por acceder a nuestra paguina pulse el boton que esta a continuacion para confirmar el alta<h4> '.
'<form  action="http://www.agvarelapru.esy.es/FORMULARIO-1/agregar/desbloqueo.php?nick='.$nick.'&pass='.$contra.'"  method="post"> 
<input type="hidden" name="qr"/>
<button class="btn btn-primary" Style="margin-bottom: 5px;
margin-left: 30%;
width: 40%;
background-color: solid #007BFF;
text-align: center;
padding: 3px 0;" type="submit">Confirmar registro</button></form>'.
'<hr Style="border: 2px solid #007BFF; border-radius: 300px /2px;">'.
'<h4 style="text-align: center;">Una vez confirmada la cuenta puedes acceder con el siguiente codigo QR<h4>'.
'<img src="/public_html/FORMULARIO-1/agregar/'.$file.'" alt="Codigo QR">'.
'</div></body>'.
'</html>';
$cabeceras = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
$cabeceras .= 'From: info@lapaginadeangel.com';
//$mensaje .='http://www.agvarelapru.esy.es/FORMULARIO-1/agregar/desbloqueo.php?nick='.$nick.'&pass='.$contra." "."\r\n";
//$mensaje .=$file;
//$cabeceras = 'From: info@lapaginadeangel.com' . "\r\n";

mail($para,$titulo,$mensaje,$cabeceras);
}


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


