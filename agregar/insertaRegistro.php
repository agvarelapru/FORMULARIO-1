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

if($nickErr=="" & $passErr=="" & $nombreErr=="" & $apellido1Err=="" & $apellido2Err=="" & $emailErr=="" & $fecha_nacimientoErr==""){
	require_once('../conexion.php');
	$conexion=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME) or die("Problemas con la conexión");
	$contra=md5($_REQUEST["pass"]);


	mysqli_query($conexion,"insert into usuarios(Usuario_nick,Usuario_clave,Usuario_nombre,Usuario_apellido1,Usuario_apellido2,Usuario_email,Usuario_fecha_nacimiento,Usuario_bloqueado,Usuario_numero_intentos) values 
                       ('$_REQUEST[nick]','$contra','$_REQUEST[nombre]','$_REQUEST[apellido1]','$_REQUEST[apellido2]','$_REQUEST[email]','$_REQUEST[fecha_nacimiento]','1','0')")
  or die("Problemas en el select".mysqli_error($conexion));


  $registros=mysqli_query($conexion,"select Usuario_id
  from usuarios where Usuario_nick like '$_REQUEST[nick]' ") or
die("Problemas en el select:".mysqli_error($conexion));

$id="";
while ($id = mysqli_fetch_array($registros))
{
$nick=$_REQUEST['nick'];


$para = $_REQUEST["email"];
$titulo = 'Bienvenido a nuestra pagina '.$_REQUEST['nick'];
$mensaje ='Hola gracias por acceder a nuestra paguina pulse el link que esta acontinuacion para confirmar el alta. ' ."\r\n";
$mensaje .='http://www.agvarelapru.esy.es/FORMULARIO-1/agregar/desbloqueo.php?nick='.$nick.'&pass='.$contra;
$cabeceras = 'From: info@lapaginadeangel.com' . "\r\n";

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


