<?php

// Start the session
session_start();

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">

	<title>Contacto</title>
  <link href="../../biblioteca/css/bootstrap.min.css" rel="stylesheet" media="screen">
  <script src="../../biblioteca/jquery/jquery.min.js"></script>
  <script src="../../biblioteca/js/bootstrap.min.js"></script>
<link href="../../biblioteca/estilos.css" rel="stylesheet" media="screen">




</head>
<body>
<?php

if(empty($_SESSION["pass"]) & empty($_SESSION["usuario"])){
  echo"<div class='container' > ";
  echo  "Inserte usuario y contraseña";
  echo"</div>";

}else{


// Set session variables
$_SESSION["usuario"];
$_SESSION["pass"];



   require_once('../../biblioteca/conexion.php');
	$conexion=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME) or die("Problemas con la conexión");

    ?>

    <nav class="navbar navbar-inverse navbar-fixed-top">

    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse"
              data-target=".navbar-ex1-collapse">
        <span class="sr-only">Desplegar navegación</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">La Pagina de Angel</a>
    </div>

  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <div class="navbar-header">



    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="../menu.php">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Page 1-1</a></li>
          <li><a href="#">Page 1-2</a></li>
          <li><a href="#">Page 1-3</a></li>
        </ul>
      </li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Contacto <span class="caret"></span></a>
      <ul class="dropdown-menu">
           <li ><a href="../somos.php">Contacte con nosotros</a></li>
          <li><a href="../estamos.php">Donde estamos</a></li>

        </ul>
    </li>
    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Administrador <span class="caret"></span></a>
      <ul class="dropdown-menu">
				<li class="active"><a href="buscar.php">Buscar usuario</a></li>
				<li><a href="../../agregar/registro.php">Agregar usuario</a></li>
			 <li><a href="../preguntas/buscarP2.php">Preguntas</a></li>
        </ul>
    </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span>  Administrador <?php echo $_SESSION["usuario"] ?> </a></li>
      <li><a href="../../salir.php"><span class="glyphicon glyphicon-log-out"></span> Salir</a></li>
    </ul>
  </div>
</nav>


<?php
if(!empty($_REQUEST["tic"])){


$checkbox=$_REQUEST['tic'];
$numero = sizeof($checkbox);
for($i=0;$i<$numero;$i++){
$del_id = $checkbox[$i];

mysqli_query($conexion,"delete from usuarios where Usuario_id='$del_id'")
or die("Problemas en el select".mysqli_error($conexion));
}
?>

<div class="container">
<div class="form-group">

<h2 class="envio">Borrado</h2>
<hr />
<h4 class="envio" style="text-align:center"><?php echo $numero ?> Usuarios Borrados</h4>
<hr />

<?php

?>
</div>
<?php
mysqli_close($conexion);
}else{
    echo"<div class='container' > ";
    echo  "<h3>No se ha borrado ningun usuario</h3>";
    echo"</div>";


}
}

?>
</body>
</html>
