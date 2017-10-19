<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	
	<title>Desbloqueo de usuario</title>
	<link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
    <script src="../jquery/jquery.min.js"></script>
      <script src="../js/bootstrap.min.js"></script>
    <link href="../estilos.css" rel="stylesheet" media="screen">

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

	require_once('../conexion.php');
	$conexion=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME) or die("Problemas con la conexión");
  
$id= $_GET['id'];



  mysqli_query($conexion, "update usuarios
  set Usuario_bloqueado = '0' where Usuario_id = '$id'") or
die("Problemas en el select:".mysqli_error($conexion));




mysqli_close($conexion);

	?>
<div class="container">




<ul>
<h2 Style="text-align:center">CONFIRMACION DE ALTA</h2>
<hr/>
<br>
<h3 Style="text-align:center">Bienvenido a nuestra pagina</h3>
<h4 Style="text-align:center">En breve se le redirigira a la pantalla principal</h4>
<br>
<hr/>

<br>




</div>

</body>
</html>