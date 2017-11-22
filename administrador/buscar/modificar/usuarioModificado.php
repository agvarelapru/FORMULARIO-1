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
<link href="../../../biblioteca/css/bootstrap.min.css" rel="stylesheet" media="screen">
<script src="../../../biblioteca/jquery/jquery.min.js"></script>
  <script src="../../../biblioteca/js/bootstrap.min.js"></script>
<link href="../../../biblioteca/estilos.css" rel="stylesheet" media="screen">




</head>
<style>


    .navbar-brand{

        border: none;
        background-color: black;
    }

    input[type=checkbox] {
  transform: scale(1.5);

}
.btn-primary{
    margin-bottom: 5px;
    margin-left: 10%;
    width: 80%;
    text-align: center;
    padding: 3px 0;
    flot:left;
}
li{
  list-style-type:none;
}
</style>


<body>
<?php
$id=$nick=$nombre=$pass=$apellido1=$apellido2=$fechaAta=$email=$bloqueado=$fechaBloqueo=$numeroIntentos=$fechaUltimaConexion=$domicilio=$poblacion=$provincia=$perfil=$nif=$numeroTelefono=$fotografia=$fechaContratacion=$fechaNacimiento="";
$idErr=$nickErr=$nombreErr=$passErr=$apellido1Err=$apellido2Err=$fechaAltaErr=$emailErr=$bloqueadoErr=$fechaBloqueoErr=$numeroIntentosErr=$fechaUltimaConexionErr=$domicilioErr=$poblacionErr=$provinciaErr=$perfilErr=$nifErr=$numeroTelefonoErr=$fotografiaErr=$fechaContratacionErr=$fechaNacimientoErr="";

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
    <li ><a href="../../menu.php">Home</a></li>
    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
      <ul class="dropdown-menu">
        <li><a href="#">Page 1-1</a></li>
        <li><a href="#">Page 1-2</a></li>
        <li><a href="#">Page 1-3</a></li>
      </ul>
    </li>
    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Contacto <span class="caret"></span></a>
    <ul class="dropdown-menu">
         <li><a href="../../somos.php">Contacte con nosotros</a></li>
        <li><a href="../../estamos.php">Donde estamos</a></li>

      </ul>
  </li>
  <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Administrador <span class="caret"></span></a>
    <ul class="dropdown-menu">
      <li class="active"><a href="../buscar.php">Buscar usuario</a></li>
      <li><a href="../../../agregar/registro.html">Agregar usuario</a></li>
     <li ><a href="../../preguntas/buscarP2.php">Preguntas</a></li>
      </ul>
  </li>
  </ul>
  <ul class="nav navbar-nav navbar-right">
    <li><a href="#"><span class="glyphicon glyphicon-user"></span>  Administrador <?php echo $_SESSION["usuario"] ?> </a></li>
    <li><a href="../../../salir.php"><span class="glyphicon glyphicon-log-out"></span> Salir</a></li>
  </ul>
</div>
</nav>
<div class="container">
<?php

if($idErr=="" & $nickErr=="" & $nombreErr=="" & $passErr=="" & $apellido1Err=="" & $apellido2Err=="" & $fechaAltaErr=="" & $emailErr=="" & $bloqueadoErr=="" & $fechaBloqueoErr=="" & $numeroIntentosErr=="" & $fechaUltimaConexionErr=="" & $domicilioErr=="" & $poblacionErr=="" & $provinciaErr=="" & $perfilErr=="" & $nifErr=="" & $numeroTelefonoErr=="" & $fotografiaErr=="" & $fechaContratacionErr=="" & $fechaNacimientoErr==""){

$bloqueado;

if(isset($_REQUEST['bloqueado'])){
  $bloqueado=1;
}else if(empty($_REQUEST['bloqueado'])){
  $bloqueado=0;
}


require_once('../../../biblioteca/conexion.php');

$conexion=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME) or
    die("Problemas con la conexión.");
  mysqli_set_charset($conexion,"utf8");
$filas_afectadas=0;

  mysqli_query($conexion, "update usuarios
                            set Usuario_id='$_REQUEST[id]', Usuario_nombre='$_REQUEST[nombre]', Usuario_apellido1='$_REQUEST[apellido1]', Usuario_apellido2='$_REQUEST[apellido2]',Usuario_nick='$_REQUEST[nick]',Usuario_email='$_REQUEST[email]',Usuario_bloqueado='$bloqueado',Usuario_fecha_bloqueo='$_POST[fecha_bloqueo]',Usuario_numero_Intentos='$_POST[numero_intentos]',Usuario_fecha_ultima_conexion='$_POST[fecha_ultima_conexion]',Usuario_domicilio='$_POST[domicilio]', Usuario_poblacion='$_POST[poblacion]',Usuario_provincia='$_POST[provincia]',Usuario_perfil='$_POST[perfil]', Usuario_nif='$_POST[nif]',Usuario_numero_telefono='$_POST[numero_telefono]',Usuario_fotografia='$_POST[fotografia]',Usuario_fecha_contratacion='$_POST[fecha_contratacion]',Usuario_fecha_nacimiento='$_POST[fecha_nacimiento]'
                          where Usuario_id='$_REQUEST[id]'") or
    die("Problemas en el select:".mysqli_error($conexion));







if($bloqueado==1){
$bloqueado=" SI ";
}else{
  $bloqueado=" NO ";

}


?>






<h2 class="envio">USUARIO <?php echo $_REQUEST['nick'];?> </h2>
<hr/>

<li style="border-bottom:1px solid #007BFF"><label for="id" >Id: </label> <?php echo $id = $_REQUEST['id'];?><br><span class="error"><?php echo $idErr;?></span></li>
<li style="border-bottom:1px solid #007BFF"><label for="nombre" >Nombre: </label> <?php echo $nombre = $_REQUEST['nombre'];?><br><span class="error"><?php echo $nombreErr;?></span></li>
<li style="border-bottom:1px solid #007BFF"><label for="apellido1" >Apellido 1: </label> <?php echo $apellido1 = $_REQUEST['apellido1'];?><br><span class="error"><?php echo $apellido1Err;?></span></li>
<li style="border-bottom:1px solid #007BFF"><label for="apellido2" >Apellido 2: </label> <?php echo $apellido2 = $_REQUEST['apellido2'];?><br><span class="error"><?php echo $apellido2Err;?></span></li>
<li style="border-bottom:1px solid #007BFF"><label for="nick" >Nick: </label> <?php echo $nick = $_REQUEST['nick'];?><br> <span class="error"><?php echo $fechaAltaErr;?></span></li>

<li style="border-bottom:1px solid #007BFF"><label for="email" >E-mail: </label> <?php echo $email = $_REQUEST['email'];?><br><span class="error"><?php echo $emailErr;?></span></li>
<li style="border-bottom:1px solid #007BFF"><label for="bloqueado" >Bloqueado: </label> <?php echo $bloqueado;?><br><span class="error"><?php echo $bloqueadoErr;?></span></li>
<li style="border-bottom:1px solid #007BFF"><label for="fecha_bloqueo" >Fecha Bloqueo: </label> <?php echo $fechaBloqueo = $_REQUEST['fecha_bloqueo'];?><br><span class="error"><?php echo $fechaBloqueoErr;?></span></li>
<li style="border-bottom:1px solid #007BFF"><label for="numero_intentos" >Numero de intentos: </label> <?php echo $inumeroIntentos = $_REQUEST['numero_intentos'];?><br><span class="error"><?php echo $numeroIntentosErr;?></span></li>
<li style="border-bottom:1px solid #007BFF"><label for="fechaUltimaConexion" >Fecha Ultima conexion: </label> <?php echo $fechaUltimaConexion= $_REQUEST['fecha_ultima_conexion'];?><br><span class="error"><?php echo $fechaUltimaConexionErr;?></span></li>
<li style="border-bottom:1px solid #007BFF"><label for="domicilio" >Domicilio: </label> <?php echo $domicilio = $_REQUEST['domicilio'];?><br> <span class="error"><?php echo $domicilioErr;?></span></li>
<li style="border-bottom:1px solid #007BFF"><label for="poblacion" >Poblacion: </label> <?php echo $poblacion = $_REQUEST['poblacion'];?> <br><span class="error"><?php echo $poblacionErr;?></span></li>
<li style="border-bottom:1px solid #007BFF"><label for="provincia" >Provincia: </label> <?php echo $provincia = $_REQUEST['provincia'];?><br><span class="error"><?php echo $provinciaErr;?></span></li>
<li style="border-bottom:1px solid #007BFF"><label for="perfil" >Perfil: </label> <?php echo $perfil = $_REQUEST['perfil'];?><br><span class="error"><?php echo $perfilErr;?></span></li>
<li style="border-bottom:1px solid #007BFF"><label for="nif" >Nif: </label> <?php echo $nif = $_REQUEST['nif'];?><br><span class="error"><?php echo $nifErr;?></span></li>
<li style="border-bottom:1px solid #007BFF"><label for="telefono" >Numero telefono </label> <?php echo $numeroTelefono= $_REQUEST['numero_telefono'];?><br><span class="error"><?php echo $numeroTelefonoErr;?></span></li>
<li style="border-bottom:1px solid #007BFF"><label for="fotografia" >Fotografia: </label> <?php echo $fotografia = $_REQUEST['fotografia'];?><br> <span class="error"><?php echo $fotografiaErr;?></span></li>
<li style="border-bottom:1px solid #007BFF"><label for="contratacion" >Fecha ontratacion: </label> <?php echo $fechaContratacion = $_REQUEST['fecha_contratacion'];?> <br><span class="error"><?php echo $fechaContratacionErr;?></span></li>
<li style="border-bottom:1px solid #007BFF"><label for="fecha_nacimiento" >Fecha de Nacimiento: </label> <?php echo $fechaNacimiento = $_REQUEST['fecha_nacimiento'];?><br><span class="error"><?php echo $fechaNacimientoErr;?></span></li>

<?php

}
?>

 <?php

 if($idErr=="" & $nickErr=="" & $nombreErr=="" & $passErr=="" & $apellido1Err=="" & $apellido2Err=="" & $fechaAltaErr=="" & $emailErr=="" & $bloqueadoErr=="" & $fechaBloqueoErr=="" & $numeroIntentosErr=="" & $fechaUltimaConexionErr=="" & $domicilioErr=="" & $poblacionErr=="" & $provinciaErr=="" & $perfilErr=="" & $nifErr=="" & $numeroTelefonoErr=="" & $fotografiaErr=="" & $fechaContratacionErr=="" & $fechaNacimientoErr==""){
   echo "<h2> Modificacion realizada con exito</h2>";
 }else{
 echo "<h2> No se modifico el usuario</h2>";
 }



 }




?>

</div>

</body>
</html>
