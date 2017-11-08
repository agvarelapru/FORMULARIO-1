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
<!-- CSS de Bootstrap
<link href="css/bootstrap.css" rel="stylesheet" media="screen">
<link href="js/bootstrap.js" rel="stylesheet" media="screen"> -->


<link rel="stylesheet" href="../biblioteca/css/bootstrap.min.css">
  <script src="../biblioteca/jquery/jquery.min.js"></script>
  <script src="../biblioteca/js/bootstrap.min.js"></script>
  <link href="../biblioteca/estilos.css" rel="stylesheet" media="screen">

<script  type="text/javascript">

</script>


</head>
<style>

</style>

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

   
</form> 

    </div>
    <ul class="nav navbar-nav" style="position=fixed">
      <li><a href="menu.php">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Page 1-1</a></li>
          <li><a href="#">Page 1-2</a></li>
          <li><a href="#">Page 1-3</a></li>
        </ul>
      </li>
      

      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="somos.php">Contacto <span class="caret"></span></a>
      <ul class="dropdown-menu">
          <li ><a href="somos.php">Contacte con nosotros</a></li>
          <li class="active"><a href="estamos.php">Donde estamos</a></li>
          
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
      <li ><a href="salir.php"><span class="glyphicon glyphicon-log-out"></span> Salir</a></li>
    </ul>
  </div>
</nav>


<div class="container" >   
<h3>Ven a visitarnos</h3>

<div id="map" style="width:100%;height:500px"></div>

<script>
function myMap() {
  var mapCanvas = document.getElementById("map");
  var myCenter = new google.maps.LatLng(36.87096819550552,-6.1767686158418655); 
  var mapOptions = {center: myCenter, zoom: 15};
  var map = new google.maps.Map(mapCanvas,mapOptions);
  var marker = new google.maps.Marker({
    position: myCenter,
    animation: google.maps.Animation.BOUNCE
  });
  marker.setMap(map);
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRVATQuo5Z7O4IL8tbjoOAzhdKAEpTM3g&callback=myMap"></script>
<br><br>
<table>
  <tr >
    <td>
    <b>Direccion:</b>
</td>

<td>
Calle Ramon y cajal, 1. Trebujena. C.P. 11560. (CADIZ).
</td>
</tr>
<tr >
    <td>
    <b>Telefonos:</b>
</td>

<td>
Fijo: 956395619 ---- Movil: 605000000.
</td>
</tr>
<tr >
    <td>
    <b>E-mail:</b>
</td>

<td>
info@paginadeangel.es.
</td>
</tr>

</table>


</div>
<br><br>
<?php
}
?>
</body>
</html>