<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	
	<title>Desbloqueo de usuario</title>
	<link href="../biblioteca/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <script src="../biblioteca/jquery/jquery.min.js" rel="stylesheet" media="screen"></script>
      <script src="../biblioteca/js/bootstrap.min.js" rel="stylesheet" media="screen"></script>
    <link href="../biblioteca/estilos.css" rel="stylesheet" media="screen">

<script  type="text/javascript">
function tiempo(){
  
  setTimeout("redirigir()", 5000);
  
}
function redirigir(){
  window.location="../index.html";
}
</script>


</head>
<body onload="tiempo()"> 
	
  <?php

	require_once('../biblioteca/conexion.php');
	$conexion=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME) or die("Problemas con la conexión");
  
$nick= $_GET['nick'];
$pass= $_GET['pass'];


  mysqli_query($conexion, "update usuarios
  set Usuario_bloqueado = '0' where Usuario_nick = '$nick' and  Usuario_clave = '$pass'") or
die("Problemas en el select:".mysqli_error($conexion));




mysqli_close($conexion);

	?>
<div class="container">





<h2>CONFIRMACION DE ALTA</h2>
<hr/>
<br>
<h3 Style="text-align:center">Bienvenido a nuestra pagina</h3>
<h4 Style="text-align:center" >En breve se le redirigira a la pantalla principal</h4>
<br>
<hr/>

<br>




</div>

</body>
</html>