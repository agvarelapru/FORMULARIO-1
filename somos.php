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
    <ul class="nav navbar-nav" style="position=fixed">
      <li class="active"><a href="menu.php">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Page 1-1</a></li>
          <li><a href="#">Page 1-2</a></li>
          <li><a href="#">Page 1-3</a></li>
        </ul>
      </li>
      <li><a href="somos.php">Contacte con nosotros</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span>  Hola <?php echo $_SESSION["usuario"] ?> </a></li>
      <li><a href="salir.php"><span class="glyphicon glyphicon-log-out"></span> Salir</a></li>
    </ul>
  </div>
</nav>

<div class="container" >   
<h3>Contacte con nosotros</h3>
<form class="form-horizontal" role="form" id="form1" name="form1" method="post" action="contacto.php">
<div class="form-group">
   <label for="usuario">Usuario:</label>
    <input  class="form-control" type="text" name="usuario" id="usuario" placeholder="Usuario"   title="Introduzca solo caracteres A-Z , a-z y numeros de 0 a 9" value=<?php echo $_SESSION["usuario"]?>>
  </div>
  <div class="form-group">
      <label for="email">Correo electronico:</label>
    <input class="form-control" type="email" name="email" id="email" placeholder="correo@ejemplo.com" required pattern= "[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" title="Introduzca este formato correo@ejemplo.com" />
  </div>
  <div class="form-group">
   <label  for="comentario">Comentario:</label>
  <!-- <input  class="form-control" type="textarea" name="comentario" id="comentario" style="height:200px" placeholder="Escriba aqui su comentario"   title="Introduzca solo caracteres A-Z , a-z y numeros de 0 a 9"/>-->
    
  <textarea class="form-control" name="comentarios" rows="5" cols="30" placeholder="Escriba aqui su comentario"   title="Introduzca solo caracteres A-Z , a-z y numeros de 0 a 9"></textarea>
  </div>

 
  <input class="btn btn-primary" type="reset" name="limpiar" value="Borrar" />
  <input  class="btn btn-primary" type="submit" name="enviar" id="enviar" value="Enviar" />
</form>
</div>
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
Fijo: 956395619---- Movil: 605000000.
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