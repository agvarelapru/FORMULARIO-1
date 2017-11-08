<?php

// Start the session
session_start();

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	
	<title>Contacto</title>
  <link href="../biblioteca/css/bootstrap.min.css" rel="stylesheet" media="screen">
  <script src="../biblioteca/jquery/jquery.min.js"></script>
  <script src="../biblioteca/js/bootstrap.min.js"></script>
<link href="../biblioteca/estilos.css" rel="stylesheet" media="screen">




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

if(!empty($_REQUEST["usuario"]) & !empty($_REQUEST["email"]) & !empty($_REQUEST["comentarios"])){
$para ='agvarelapru@gmail.com';
$titulo = 'Comentario pagina del usuario '.$_REQUEST["usuario"];
$mensaje = $_REQUEST["comentarios"];
$cabeceras = 'From: info@paginaangel.com' . "\r\n";

mail($para,$titulo,$mensaje,$cabeceras);
	
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
      <li class="active"><a href="menu.php">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Page 1-1</a></li>
          <li><a href="#">Page 1-2</a></li>
          <li><a href="#">Page 1-3</a></li>
        </ul>
      </li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Contacto <span class="caret"></span></a>
      <ul class="dropdown-menu">
           <li class="active"><a href="somos.php">Contacte con nosotros</a></li>
          <li><a href="estamos.php">Donde estamos</a></li>
          
        </ul>
    </li>
    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Administrador <span class="caret"></span></a>
      <ul class="dropdown-menu">
           <li><a href="gestion/buscar.php">Buscar</a></li>
           <li><a href="gestion/agregar.php">Agregar</a></li>
          <li><a href="gestion/editar.php">Editar</a></li>
          <li><a href="gestion/borrar.php">Borrar</a></li>
        </ul>
    </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span>  Administrador <?php echo $_SESSION["usuario"] ?> </a></li>
      <li><a href="../salir.php"><span class="glyphicon glyphicon-log-out"></span> Salir</a></li>
    </ul>
  </div>
</nav>




<div class="container">
<div class="form-group">



<ul>
<h2 class="envio">Comentario</h2>
<hr />
<li style="border-bottom:1px solid #007BFF"><label for="usuario" >Usuario:</label><?php echo $_POST['usuario'];?><br></li>
<li style="border-bottom:1px solid #007BFF"><label for="email" >E-mail:</label><?php echo $_POST['email'];?><br></li>
<li><label for="comentarios" >Comentario:</label><?php echo $_POST['comentarios'];?><br></li>
<hr />

<h4 class="envio" style="text-align:center">Mensaje enviado, muchas gracias</h4>
</ul>



<?php 


?>

</div>
<?php 
}else{
    echo"<div class='container' > ";
    echo  "Envie un comentario";
    echo"</div>";


}
}
?>
</body>
</html>
