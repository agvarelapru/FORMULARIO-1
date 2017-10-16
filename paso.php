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
function tiempo(){
  
  setTimeout("redirigir()", 5000);
  alert("Bienvenido " +$_REQUEST['nombre']);
}
function redirigir(){
  window.location="menu.php";
}
</script>


</head>
<body onload="tiempo()"> 



<?php


$usuarioErr =$passErr = "";
$usuario = $pass =  "";
/*
if (empty($_POST["usuario"])) {
    $usuarioErr = "Usuarioobligatorio";
  } else {
    $usuario = test_input($_POST["usuario"]);  

    if (!preg_match("/^[a-zA-Z0-9 -.,\/]*$/",$usuario)) {
      $usuarioErr = "Solo letras y espacio en blanco";
    }
  }
  if (empty($_POST["pass"])) {
    $passErr = "contraseña obligatoria";
  } else {
    $pass = test_input($_POST["pass"]);  

    if (!preg_match("/^[a-zA-Z0-9 -.,\/]*$/",$pass)) {
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
$contra=md5($_REQUEST["pass"]);
while ($reg = mysqli_fetch_array($registros))
{

if(($reg['Usuario_clave']==$contra) & $reg['Usuario_bloqueado']==0){
  ?> 






   <div class="container" >   
<h1>BIENVENIDO <?php echo $reg['Usuario_nick'] ?></h1>
<h4>Redirigiendo a pagina principal</h4>
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
              }
     
    }
    
    if($numero==0){
      echo"<div class='container' > ";
      echo  "No existe el usuario";
      echo"</div>";
    }
   
?>

</body>
</html>