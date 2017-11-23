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




</head>
<style>


    .navbar-brand{

        border: none;
        background-color: black;
    }
    .btn-primary{
        margin-left: 30%;

    }
    input[type=checkbox] {
  transform: scale(1.5);

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
      <li ><a href="../menu.php">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Page 1-1</a></li>
          <li><a href="#">Page 1-2</a></li>
          <li><a href="#">Page 1-3</a></li>
        </ul>
      </li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Contacto <span class="caret"></span></a>
      <ul class="dropdown-menu">
           <li><a href="../somos.php">Contacte con nosotros</a></li>
          <li><a href="../estamos.php">Donde estamos</a></li>

        </ul>
    </li>
    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Administrador <span class="caret"></span></a>
      <ul class="dropdown-menu">
        <li class="active"><a href="buscar/buscar.php">Buscar usuario</a></li>
        <li><a href="../agregar/registro.html">Agregar usuario</a></li>
       <li ><a href="preguntas/buscarP2.php">Preguntas</a></li>
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
<h2>Buscar Usuarios</h2>
<hr>

<form class="form-horizontal"   action="paso2.php" method="post" style="width:100%">

  <div class="form-group">
 <label  for="busqueda" >Busqueda unica</label>

<input  class="form-control" type="text" name="busqueda"  placeholder="Busqueda" style="display:inline;width:85%;"  title="Indique el contenido a buscar"/>

<button class="btn btn-default" type="submit" name="buscar" style=" float:right; width:15%;"  id="buscar"><span class="glyphicon glyphicon-search" ></span></button>
</div>


</form>
<hr>

<form class="form-horizontal"  action="paso.php" method="post">


<div class="form-group">
<label for="usuario" >Ingrese el nick del usuario:</label>
<input  class="form-control" type="text" name="usuario" placeholder="Usuario" pattern="[.-_A-Za-z0-9 ñÑ]{1,50}"  title="Introduzca nombre de usuario .-_A-Za-z0-9 ñÑ"/>
    </div>


<div class="form-group">
<label for="localidad" >Ingrese la Localidad del usuario:</label>

  <?php
  require_once('../../biblioteca/conexion.php');
  $conexion=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME) or
      die("Problemas con la conexión.");
    mysqli_set_charset($conexion,"utf8");

$consulta_mysql=mysqli_query($conexion,"select DISTINCT Usuario_poblacion
             from usuarios;") or
die("Problemas en el select:".mysqli_error($conexion));

?>

<select class="form-control" name="poblacion"/>
<?php

while($reg=mysqli_fetch_array($consulta_mysql)){
echo "<option value='".$reg["Usuario_poblacion"]."'>".$reg["Usuario_poblacion"]." </option>";

}
?>
 </select>
</div>



  <div class="form-group">
<label for="email" >Ingrese Email del usuario:</label>
<input  class="form-control" type="email" name="email" placeholder="correo@ejemplo.com"  pattern= "[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" title="Introduzca este formato correo@ejemplo.com"/>
</div>

<div class="form-group">
<label for="fechaPregunta" >Ingrese la fecha de alta:</label>
<input  class="form-control" type="date" name="fechaAlta" placeholder="aaaa/mm/dd"  pattern= "[0-9]{4}/(0[1-9]|1[012])/(0[1-9]|1[0-9]|2[0-9]|3[01])" title="Introduzca este formato aaaa/mm/dd"/>
</div>

  <div class="form-group">
  <label for="resuelta" >Indique si esta bloqueado:</label>
  <input  class="form-control" type="checkbox" name="bloqueado" id="bloqueado"/>
  </div>

<br>


<input class="btn btn-primary" type="submit" name="buscar" id="buscar" value="Buscar">

</form>
    </div>
    <?php
  }
      ?>
</body>
</html>
