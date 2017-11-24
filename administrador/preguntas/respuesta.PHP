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
$codigoDuda=$fechaPregunta=$usuario=$pregunta=$respuesta=$atendidoPor=$fechaRespuesta="";
$codigoDudaErr=$fechaPreguntaErr=$usuarioErr=$preguntaErr=$respuestaErr=$atendidoPorErr=$fechaRespuestaErr="";

if(empty($_SESSION["pass"]) & empty($_SESSION["usuario"])){
  echo"<div class='container' > ";
  echo  "Inserte usuario y contraseña";
  echo"</div>";

}else{

$fecha_actual = date("Y-m-d");
$usuarioSistema=$_SESSION['usuario'];

if($codigoDudaErr=="" & $fechaPreguntaErr=="" & $usuarioErr=="" & $preguntaErr=="" & $respuestaErr=="" & $atendidoPor =="" & $fechaRespuesta==""){
  require_once('../../biblioteca/conexion.php');

  $conexion=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME) or
      die("Problemas con la conexión.");
    mysqli_set_charset($conexion,"utf8");


      mysqli_query($conexion, "update contacto
                                set resuelta=1,atendidoPor='$usuarioSistema',fechaResolucion='$fecha_actual',respuesta='$_POST[respuesta]'
                              where codigoDuda='$_POST[codigoDuda]'") or
        die("Problemas en el select:".mysqli_error($conexion));


      $fechaactual = getdate();

      mysqli_close($conexion);
      }




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



<div class="container">
<div class="form-group">



<ul>
<h2 class="envio">RESPUESTA</h2>
<hr />
<li style="border-bottom:1px solid #007BFF"><label for="codigoDuda" >Codigo:</label> <?php echo $codigoDuda = $_POST['codigoDuda'];?> <br><span class="error"><?php echo $codigoDudaErr;?></span></li>
<li style="border-bottom:1px solid #007BFF"><label for="fechaPregunta" >Fecha Pregunta:</label> <?php echo $fechaPregunta = $_POST['fechaPregunta'];?> <br><span class="error"><?php echo $fechaPreguntaErr;?></span></li>
<li style="border-bottom:1px solid #007BFF"><label for="respuesta" >Respuesta:</label> <?php echo $respuesta = $_POST['respuesta'];?><br><span class="error"><?php echo $respuestaErr;?></span></li>
<li style="border-bottom:1px solid #007BFF"><label for="respondidoPor" >Respondido por:</label> <?php echo $atendidoPor = $_SESSION['usuario'];?><br><span class="error"><?php echo $atendidoPorErr;?></span></li>
<li style="border-bottom:1px solid #007BFF"><label for="fechaRespuesta" >Fecha Respuesta:</label><?php echo " $fechaactual[mday] - $fechaactual[mon] - $fechaactual[year]";  ?><br><span class="error"><?php echo $fechaRespuestaErr;?></span></li>


<?php



if($codigoDudaErr=="" & $fechaPreguntaErr=="" & $usuarioErr=="" & $preguntaErr=="" & $respuestaErr==""){
echo "<h3 class='envio'> Larespuesta fue enviada correctamente. </h3>";

}else{
echo "<h3 style=color:red> La respuesta NO se envio. </h3>";
}
?>
<br>

</ul>
</div>

</div>
<?php } ?>


</body>
</html>
