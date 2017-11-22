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




  require_once('../../biblioteca/conexion.php');

  $conexion=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME) or
      die("Problemas con la conexión.");
    mysqli_set_charset($conexion,"utf8");


    $registros=mysqli_query($conexion,"select Usuario_id,Usuario_nombre,Usuario_apellido1,Usuario_apellido2,Usuario_nick,Usuario_fecha_alta,Usuario_email,Usuario_bloqueado,Usuario_fecha_bloqueo,Usuario_numero_intentos,Usuario_fecha_ultima_conexion,Usuario_domicilio,Usuario_poblacion,Usuario_provincia,Usuario_perfil,Usuario_nif,Usuario_numero_telefono,Usuario_fotografia,Usuario_fecha_contratacion,Usuario_fecha_nacimiento from usuarios
    where Usuario_id=".$_GET['Usuario_id']) or
      die("Problemas en el select:".mysqli_error($conexion));

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
        <li><a href="buscar.php">Buscar usuario</a></li>
        <li><a href="../../agregar/registro.html">Agregar usuario</a></li>
       <li class="active"><a href="../preguntas/buscarP2.php">Preguntas</a></li>
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
$cant=0;

while ($reg = mysqli_fetch_array($registros))
{

$bloqueado="";
if($reg['Usuario_bloqueado']==1){
$bloqueado=" SI ";
}else{
  $bloqueado=" NO ";

}
$codigo=$reg['Usuario_id'];

?>



<div class="container">


<h2 class="envio">USUARIO <?php echo $reg['Usuario_nick'];?> </h2>
<hr/>

<li style="border-bottom:1px solid #007BFF"><label for="id" >Id: </label> <?php echo $id = $reg['Usuario_id'];?><br><span class="error"><?php echo $idErr;?></span></li>
<li style="border-bottom:1px solid #007BFF"><label for="nombre" >Nombre: </label> <?php echo $nombre = $reg['Usuario_nombre'];?><br><span class="error"><?php echo $nombreErr;?></span></li>
<li style="border-bottom:1px solid #007BFF"><label for="apellido1" >Apellido 1: </label> <?php echo $apellido1 = $reg['Usuario_apellido1'];?><br><span class="error"><?php echo $apellido1Err;?></span></li>
<li style="border-bottom:1px solid #007BFF"><label for="apellido2" >Apellido 2: </label> <?php echo $apellido2 = $reg['Usuario_apellido2'];?><br><span class="error"><?php echo $apellido2Err;?></span></li>
<li style="border-bottom:1px solid #007BFF"><label for="nick" >Nick: </label> <?php echo $nick = $reg['Usuario_nick'];?><br> <span class="error"><?php echo $fechaAltaErr;?></span></li>
<li style="border-bottom:1px solid #007BFF"><label for="fechaAlta" >Fecha Alta: </label> <?php echo $fechaAlta = $reg['Usuario_fecha_alta'];?> <br><span class="error"><?php echo $passErr;?></span></li>
<li style="border-bottom:1px solid #007BFF"><label for="email" >E-mail: </label> <?php echo $email = $reg['Usuario_email'];?><br><span class="error"><?php echo $emailErr;?></span></li>
<li style="border-bottom:1px solid #007BFF"><label for="bloqueado" >Bloqueado: </label> <?php echo $bloqueado;?><br><span class="error"><?php echo $bloqueadoErr;?></span></li>
<li style="border-bottom:1px solid #007BFF"><label for="fecha_bloqueo" >Fecha Bloqueo: </label> <?php echo $fechaBloqueo = $reg['Usuario_fecha_bloqueo'];?><br><span class="error"><?php echo $fechaBloqueoErr;?></span></li>
<li style="border-bottom:1px solid #007BFF"><label for="numero_intentos" >Numero de intentos: </label> <?php echo $inumeroIntentos = $reg['Usuario_numero_intentos'];?><br><span class="error"><?php echo $numeroIntentosErr;?></span></li>
<li style="border-bottom:1px solid #007BFF"><label for="fechaUltimaConexion" >Fecha Ultima conexion: </label> <?php echo $fechaUltimaConexion= $reg['Usuario_fecha_ultima_conexion'];?><br><span class="error"><?php echo $fechaUltimaConexionErr;?></span></li>
<li style="border-bottom:1px solid #007BFF"><label for="domicilio" >Domicilio: </label> <?php echo $domicilio = $reg['Usuario_domicilio'];?><br> <span class="error"><?php echo $domicilioErr;?></span></li>
<li style="border-bottom:1px solid #007BFF"><label for="poblacion" >Poblacion: </label> <?php echo $poblacion = $reg['Usuario_poblacion'];?> <br><span class="error"><?php echo $poblacionErr;?></span></li>
<li style="border-bottom:1px solid #007BFF"><label for="provincia" >Provincia: </label> <?php echo $provincia = $reg['Usuario_provincia'];?><br><span class="error"><?php echo $provinciaErr;?></span></li>
<li style="border-bottom:1px solid #007BFF"><label for="perfil" >Perfil: </label> <?php echo $perfil = $reg['Usuario_perfil'];?><br><span class="error"><?php echo $perfilErr;?></span></li>
<li style="border-bottom:1px solid #007BFF"><label for="nif" >Nif: </label> <?php echo $nif = $reg['Usuario_nif'];?><br><span class="error"><?php echo $nifErr;?></span></li>
<li style="border-bottom:1px solid #007BFF"><label for="telefono" >Numero telefono </label> <?php echo $numeroTelefono= $reg['Usuario_numero_telefono'];?><br><span class="error"><?php echo $numeroTelefonoErr;?></span></li>
<li style="border-bottom:1px solid #007BFF"><label for="fotografia" >Fotografia: </label> <?php echo $fotografia = $reg['Usuario_fotografia'];?><br> <span class="error"><?php echo $fotografiaErr;?></span></li>
<li style="border-bottom:1px solid #007BFF"><label for="contratacion" >Fecha ontratacion: </label> <?php echo $fechaContratacion = $reg['Usuario_fecha_contratacion'];?> <br><span class="error"><?php echo $fechaContratacionErr;?></span></li>
<li style="border-bottom:1px solid #007BFF"><label for="fecha_nacimiento" >Fecha de Nacimiento: </label> <?php echo $fechaNacimiento = $reg['Usuario_fecha_nacimiento'];?><br><span class="error"><?php echo $fechaNacimientoErr;?></span></li>
</ul>


<?php
}
?>

<div style="width:50%;float:left;margin-top:10px;">
<form class="form-horizontal"  action="modificar/modificarU.php"  method="post">
<input type="hidden" name="id" value="<?php echo $id;?>"/>
<button class="btn btn-primary" type="submit" >MODIFICAR</button>
</form>
</div>

<div style="width:50%;float:left;margin-top:10px;">
<form class="form-horizontal" action="borrar/confirmarborrado.php"  method="post">
<input type="hidden" name="id" value="<?php echo $id;?>"/>
<button class="btn btn-primary" type="submit">BORRAR</button>
</form>
</div>


 </div>
 <?php
}
?>
<!--
<form class="form-horizontal" role="form" id="alta" name="alta" method="post" action="insertaRegistro.php">



<div class="form-group">
  <label for="nick">Usuario</label>
  <input  class="form-control" type="text" name="nick" id="nick" placeholder="Usuario" pattern="[.-_A-Za-z0-9 ñÑ]{1,50}"  title="Introduzca nombre de usuario .-_A-Za-z0-9 ñÑ" required/>
</div>

<div class="form-group">
  <label for="pass">Contraseña</label>
  <input  class="form-control" type="password" name="pass" id="pass" onblur="comprueba()" placeholder="Contraseña" pattern="[.-_A-Za-z0-9 ñÑ]{1,50}"  title="Introduzca contraseña .-_A-Za-z0-9 ñÑ" required/>

</div>
<div class="form-group">
  <label for="pass2" id="error">Repetir Contraseña</label>
  <input  class="form-control" type="password" name="pass2" id="pass2" onblur="comprueba()" placeholder="Contraseña" pattern="[.-_A-Za-z0-9 ñÑ]{1,50}"  title="Introduzca contraseña .-_A-Za-z0-9 ñÑ"   required/>
  <h5 id="error"></h5>
</div>
<h5 id="error"></h5>

<script  type="text/javascript">

function comprueba(){
var pass=document.getElementById('pass').value;
var pass2=document.getElementById('pass2').value
if(pass!=pass2){
  document.getElementById('error').innerHTML="Repetir Contraseña   <IMG SRC='../imagenes/error.png'>";
}else{
  document.getElementById('error').innerHTML="Repetir Contraseña   <IMG SRC='../imagenes/bien.png'>";
}
}
</script>
<br>


  <div class="form-group">
    <label for="nombre">Nombre</label>
    <input  class="form-control" type="text" name="nombre" id="nombre" placeholder="Nombre" pattern="[ A-Za-z ñÑ]{1,50}"  title="Introduzca nombre"  required />
  </div>
  <div class="form-group">
    <label for="apellido1">Apellido 1</label>
    <input class="form-control" type="text" name="apellido1" id="apellido1" placeholder="Apellido 1" pattern="[ A-Za-z ñÑ]{1,50}"  title="Introduzca el apellido 1" required/>
  </div>
  <div class="form-group">
    <label for="apellido2">Apellido 2</label>
    <input class="form-control" type="text" name="apellido2" id="apellido2 "placeholder="Apellido 2" pattern="[ A-Za-z ñÑ]{1,50}"  title="Introduzca el apellido 2" required/>
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input class="form-control" type="email" name="email" id="email" placeholder="correo@ejemplo.com" required pattern= "[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" title="Introduzca este formato correo@ejemplo.com"/>
  </div>
  <div class="form-group">
    <label for="fecha_nacimiento">Fecha de Nacimiento</label>
    <input  class="form-control" type="date" name="fecha_nacimiento" id="fecha_nacimiento" placeholder="aaaa/mm/dd" required pattern= "[0-9]{4}/(0[1-9]|1[012])/(0[1-9]|1[0-9]|2[0-9]|3[01])" title="Introduzca este formato aaaa/mm/dd"/>
  </div><br><br>



  <input class="btn btn-primary" type="reset" name="limpiar" value="Borrar" />
  <input  class="btn btn-primary" type="submit" name="enviar" id="enviar" value="Enviar"/>


</form>
-->

</body>
</html>
