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
<link href="../../biblioteca/css/bootstrap.min.css" rel="stylesheet" media="screen">
<script src="../../biblioteca/jquery/jquery.min.js"></script>
  <script src="../../biblioteca/js/bootstrap.min.js"></script>
<link href="../../biblioteca/estilos.css" rel="stylesheet" media="screen">

<script  type="text/javascript">

</script>


</head>
<style>


    .navbar-brand{

        border: none;
        background-color: black;
    }
    .btn-primary{
        margin-left: 30%;
    }
</style>


<body>
<?php
$usuarioErr =$passErr = "";
$usuario = $pass = "";


if(empty($_SESSION["pass"]) & empty($_SESSION["usuario"])){
  echo"<div class='container' > ";
  echo  "Inserte usuario y contraseña";
  echo"</div>";

}else{
    

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
           <li><a href="somos.php">Contacte con nosotros</a></li>
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
      <li><a href="../../salir.php"><span class="glyphicon glyphicon-log-out"></span> Salir</a></li>
    </ul>
  </div>
</nav>





   <div class="container" >   
<h2>Buscar Usuario</h2>
<hr>  
<form class="form-horizontal"  action="buscarUsuarios.php" method="post">


<div class="form-group">
<label for="nombre" >Ingrese el nombre del usuario:</label>
<input  class="form-control" type="text" name="nombre"/>
    </div>
  <div class="form-group">  
<label for="apellido1" >Ingrese el apellido 1 del usuario:</label>
<input  class="form-control" type="text" name="apellido1"/>
    </div>
    <div class="form-group"> 
<label for="apellid2" >Ingrese apellido 2 del usuario:</label>
<input  class="form-control" type="text" name="apellido2"/>
    </div>
    <div class="form-group"> 
<label for="email" >Ingrese Email del usuario:</label>
<input  class="form-control" type="email" name="email"/>
    </div>
<br>


<input class="btn btn-primary" type="submit" name="buscar" id="buscar" value="Buscar">

</form>
    </div>
</body>
</html>