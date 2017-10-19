<?php


// Start the session
session_start();

if(isset($_SESSION["usuario"]) & isset($_SESSION["pass"])){
  $_REQUEST['usuario']= $_SESSION["usuario"];
  $contra =md5( $_SESSION["pass"]);

}

?>
<!doctype html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">	
<title>Formulario</title>
<!-- CSS de Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<script src="jquery/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
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
$usuarioErr =$passErr = "";
$usuario = $pass = "";


if(empty($_REQUEST["pass"]) & empty($_REQUEST["usuario"])){
  echo"<div class='container' > ";
  echo  "Inserte usuario y contraseña";
  echo"</div>";

}else{
    
  


// Set session variables

$_SESSION["usuario"] = $_REQUEST['usuario'];
if(empty($_SESSION["pass"])){
$_SESSION["pass"] = $_REQUEST['pass'];
}




/*
if (empty($_REQUEST["usuario"])) {
    $usuarioErr = "Usuarioobligatorio";
  } else {
    $usuario = test_input($_REQUEST["usuario"]);  

    if (!preg_match("/^[a-zñA-ZÑ0-9 -.,\/]*$/",$usuario)) {
      $usuarioErr = "Solo letras y espacio en blanco";
    }
  }
  if (empty($_REQUEST["pass"])) {
    $passErr = "contraseña obligatoria";
  } else {
    $pass = test_input($_REQUEST["pass"]);  

    if (!preg_match("/^[a-zñA-ZÑ0-9 -.,\/]*$/",$pass)) {
      $passErr = "Solo letras y espacio en blanco";
    }
  }*/

  require_once('conexionLocal.php');
  $conexion=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME) or
  die("Problemas con la conexión.");

  

 

mysqli_set_charset($conexion,"utf8");
$registros=mysqli_query($conexion,"select Usuario_nick,Usuario_clave,Usuario_bloqueado
                      from usuarios where (Usuario_nick like '$_REQUEST[usuario]' or Usuario_email like '$_REQUEST[usuario]')") or
die("Problemas en el select:".mysqli_error($conexion));
$numero=mysqli_affected_rows($conexion);//cuenta el numero de lineas del array

if(empty($contra)){
$contra=md5($_REQUEST["pass"]);

}
while ($reg = mysqli_fetch_array($registros))
{

if(($reg['Usuario_clave']==$contra) & $reg['Usuario_bloqueado']==0){
  ?> 





  <nav class="navbar navbar-inverse">

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
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
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
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span>  Hola <?php echo $reg['Usuario_nick'] ?> </a></li>
      <li><a href="salir.php"><span class="glyphicon glyphicon-log-out"></span> Salir</a></li>
    </ul>
  </div>
</nav>





   <div class="container" >   
<h1>HOLA</h1>

<?php
include 'qr-code/phpqrcode/qrlib.php';

// El nombre del fichero que se generará (una imagen PNG).
$file = 'jr-qrcode.png'; 
// La data que llevará.
$data = 'http://agvarelapru.esy.es/FORMULARIO-1/'; 

// Y generamos la imagen.
QRcode::png($data, $file);

?>

<img src="jr-qrcode.png">


<div>
  
 





   <?php
      }  else if ($reg['Usuario_bloqueado']==1){
echo"<div class='container' > ";
        echo  "Usuario bloqueado";
        echo"</div>";
      }else{
        echo"<div class='container' > ";
                echo  "La contraseña no es correcta";
                echo"</div>";
                session_start();//Reanudamos sesion
                session_unset();
                session_destroy();//Literalmente la destruimos
                
              }
     
    }
    
    if($numero==0){
      echo"<div class='container' > ";
      echo  "No existe el usuario";
      echo"</div>";
      session_start();//Reanudamos sesion
      session_unset();
      session_destroy();//Literalmente la destruimos
      
    }
  
  } 
?>

</body>
</html>