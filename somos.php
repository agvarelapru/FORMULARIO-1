<?php

// Start the session
session_start();

?>
<!doctype html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">	
<title>Formulario</title>
<!-- CSS de Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="estilos.css" rel="stylesheet" media="screen">
<script  type="text/javascript">

</script>


</head>
<style>


    .navbar-brand{

        border: none;
        background-color: black;
    }
</style>

<body>
<?php

// Set session variables
$_SESSION["usuario"];
$_SESSION["pass"];

?>
 <nav class="navbar navbar-inverse">

  <div class="container-fluid">
    <div class="navbar-header">

   <!--  <form role="form" id="form1" name="form1" method="post" action="menu.php">
    <input  type="hidden" name="usuario" id="usuario"  value="<?php //echo $_REQUEST['usuario'] ?>"/>
    <input  type="hidden" name="pass" id="pass"  value="<?php //echo $_REQUEST['pass']?>" />
    <input  class="navbar-brand" type="submit" name="enviar" id="enviar" value="La Pagina de Angel" />-->
   <a class="navbar-brand" type="submit" name="enviar" id="enviar" href="">La Pagina de Angel</a>
</form> 

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
      <li><a href="#">Page 2</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span>  Hola <?php echo $_SESSION["usuario"] ?> </a></li>
      <li><a href="index.html"><span class="glyphicon glyphicon-log-out"></span> Salir</a></li>
    </ul>
  </div>
</nav>




</body>
</html>