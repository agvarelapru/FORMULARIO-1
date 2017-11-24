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




  require_once('../../biblioteca/conexion.php');

  $conexion=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME) or
      die("Problemas con la conexión.");
    mysqli_set_charset($conexion,"utf8");


    $registros=mysqli_query($conexion,"select codigoDuda, usuario,email,pregunta, resuelta, fechaPregunta,latitud, longitud, atendidoPor, fechaResolucion, respuesta  from contacto
    where codigoDuda=".$_GET['codigoDuda']) or
      die("Problemas en el select:".mysqli_error($conexion));

    $cant=0;
    while ($reg = mysqli_fetch_array($registros))
    {

    $resuelta="";
    if($reg['resuelta']==1){
    $resuelta=" SI ";
    }else{
      $resuelta=" NO ";

    }
    $codigo=$reg['codigoDuda'];



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
        <li><a href="../buscar/buscar.php">Buscar usuario</a></li>
        <li><a href="../../agregar/registro.php">Agregar usuario</a></li>
       <li class="active"><a href="buscarP2.php">Preguntas</a></li>
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
<h3 style="float:left;">Codigo: <?php echo $_GET["codigoDuda"] ?></h3>
<h3 style="float:right;">Resuelta: <?php echo $resuelta ?></h3><br><br><br>
<h5>Fecha: <?php echo $reg["fechaPregunta"] ?></h5>

<form class="form-horizontal" role="form" id="form1" name="form1" method="post" action="respuesta.php">
    <input type="hidden"   name="codigoDuda" id="codigoDuda" value=<?php echo $reg['codigoDuda']?>>
    <input type="hidden"   name="fechaPregunta" id="fechaPregunta" value=<?php echo $reg['fechaPregunta']?>>
<div class="form-group">
   <label for="usuario">Usuario:</label>
    <input  class="form-control" type="text"  disabled name="usuario" id="usuario"  value=<?php echo $reg['usuario']?>>
  </div>
  <div class="form-group">
      <label for="email">Correo electronico:</label>
    <input class="form-control" type="email" name="email" disabled id="email" value=<?php echo $reg['email']?> />
  </div>
  <div class="form-group">
   <label  for="comentario">Comentario:</label>

  <textarea class="form-control" name="pregunta" rows="5" cols="30" disabled> <?php echo $reg['pregunta']?></textarea>
  </div>
  <div class="form-group">
   <label  for="comentario">Respuesta:</label>
  <textarea class="form-control" name="respuesta" rows="5" cols="30" placeholder="Escriba aqui su respuesta"   title="Introduzca solo caracteres A-Z , a-z y numeros de 0 a 9"><?php echo $reg['respuesta']?></textarea>
  </div>
<h5>Atendido por: <?php echo $reg["atendidoPor"] ?></h5>
<h5>Fecha respuesta: <?php echo $reg["fechaResolucion"] ?></h5><br>

<h4>Situacion de usuario:</h4>
<div id="map" style="width:100%;height:500px"></div>

<script>
function myMap() {
  var latitud=<?php echo $reg['latitud']?>;
  var longitud=<?php echo $reg['longitud']?>;

  var mapCanvas = document.getElementById("map");
  var myCenter = new google.maps.LatLng(latitud,longitud);
  var mapOptions = {center: myCenter, zoom: 15};
  var map = new google.maps.Map(mapCanvas,mapOptions);
  var marker = new google.maps.Marker({
    position: myCenter,
  //  animation: google.maps.Animation.BOUNCE
  });
  marker.setMap(map);
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRVATQuo5Z7O4IL8tbjoOAzhdKAEpTM3g&callback=myMap"></script>
<br><br>







  <input class="btn btn-primary" type="reset" name="limpiar" value="Borrar" />
  <input  class="btn btn-primary" type="submit" name="enviar" id="enviar" value="Enviar" />
</form>
</div>



    <?php
  $cant++;
  }

  }

      ?>
</body>
</html>
