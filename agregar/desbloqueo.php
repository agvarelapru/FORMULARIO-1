<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	
	<title>Desbloqueo de usuario</title>
	<link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
    <script src="../jquery/jquery.min.js"></script>
      <script src="../js/bootstrap.min.js"></script>
    <link href="../estilos.css" rel="stylesheet" media="screen">

<script  type="text/javascript">
/*function tiempo(){
  
  setTimeout("redirigir()", 5000);
  alert("Bienvenido " +$_REQUEST['nombre']);
}
function redirigir(){
  window.location="../index.html";
}*/
</script>


</head>
<body onload="tiempo()"> 
	
	<?php

	require_once('../conexionLocal.php');
	$conexion=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME) or die("Problemas con la conexión");
	


	mysqli_query($conexion,"insert into usuarios(Usuario_nick,Usuario_clave,Usuario_nombre,Usuario_apellido1,Usuario_apellido2,Usuario_email,Usuario_fecha_nacimiento,Usuario_bloqueado,Usuario_numero_intentos) values 
                       ('$_REQUEST[nick]','$contra','$_REQUEST[nombre]','$_REQUEST[apellido1]','$_REQUEST[apellido2]','$_REQUEST[email]','$_REQUEST[fecha_nacimiento]','1','0')")
  or die("Problemas en el select".mysqli_error($conexion));




mysqli_close($conexion);

	?>
<div class="container">
<div class="form-group">



<ul>
<h2 class="envio">ALTA USUARIO</h2>
<hr />

<br>







</div>

</body>
</html>