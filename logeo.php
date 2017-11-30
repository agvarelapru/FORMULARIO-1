<?php


// Start the session
session_start();

?>
<!doctype html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>Logeo</title>
<!-- CSS de Bootstrap -->
<link href="biblioteca/css/bootstrap.min.css" rel="stylesheet" media="screen">
<script src="biblioteca/jquery/jquery.min.js"></script>
  <script src="biblioteca/js/bootstrap.min.js"></script>
<link href="biblioteca/estilos.css" rel="stylesheet" media="screen">

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
require_once('biblioteca/conexion.php');
$conexion=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME) or
die("Problemas con la conexión.");

$admin="admin";
$work="work";
$user="user";

if(!empty($_GET['usuario']) & !empty($_GET['pass'])){

  mysqli_set_charset($conexion,"utf8");
  $registros=mysqli_query($conexion,"select Usuario_nick,Usuario_clave,Usuario_bloqueado,Usuario_perfil
                        from usuarios where (Usuario_nick like '$_GET[usuario]' or Usuario_email like '$_GET[usuario]')") or
  die("Problemas en el select:".mysqli_error($conexion));
  $numero=mysqli_affected_rows($conexion);//cuenta el numero de lineas del array

  $_SESSION["usuario"] = $_GET['usuario'];
  $_SESSION["pass"] = $_GET['pass'];

    $contra=$_GET["pass"];

}else if(!empty($_REQUEST['usuario']) & !empty($_REQUEST['pass'])){

  $_SESSION["usuario"] = $_REQUEST['usuario'];
  $_SESSION["pass"] = $_REQUEST['pass'];

mysqli_set_charset($conexion,"utf8");
$registros=mysqli_query($conexion,"select Usuario_nick,Usuario_clave,Usuario_bloqueado,Usuario_perfil
                      from usuarios where (Usuario_nick like '$_REQUEST[usuario]' or Usuario_email like '$_REQUEST[usuario]')") or
die("Problemas en el select:".mysqli_error($conexion));
$numero=mysqli_affected_rows($conexion);//cuenta el numero de lineas del array


$contra=md5($_REQUEST["pass"]);


}else {

  echo"<div class='container' > ";
  echo  "Inserte usuario y contraseña";
  echo"</div>";

  session_unset();
  session_destroy();//Literalmente la destruimos

}


/*
if(empty($_REQUEST["pass"]) & empty($_REQUEST["usuario"])){
  echo"<div class='container' > ";
  echo  "Inserte usuario y contraseña";
  echo"</div>";

  session_unset();
  session_destroy();//Literalmente la destruimos
}else{
*/






/*
if(!empty($_GET['usuario']) & !empty($_GET['pass'])){

  mysqli_set_charset($conexion,"utf8");
  $registros=mysqli_query($conexion,"select Usuario_nick,Usuario_clave,Usuario_bloqueado,Usuario_perfil
                        from usuarios where (Usuario_nick like '$_GET[usuario]' or Usuario_email like '$_GET[usuario]')") or
  die("Problemas en el select:".mysqli_error($conexion));
  $numero=mysqli_affected_rows($conexion);//cuenta el numero de lineas del array



    $contra=$_GET["pass"];

}else{

mysqli_set_charset($conexion,"utf8");
$registros=mysqli_query($conexion,"select Usuario_nick,Usuario_clave,Usuario_bloqueado,Usuario_perfil
                      from usuarios where (Usuario_nick like '$_REQUEST[usuario]' or Usuario_email like '$_REQUEST[usuario]')") or
die("Problemas en el select:".mysqli_error($conexion));
$numero=mysqli_affected_rows($conexion);//cuenta el numero de lineas del array


$contra=md5($_REQUEST["pass"]);

}*/
while ($reg = mysqli_fetch_array($registros))
{

if($reg['Usuario_clave']==$contra & $reg['Usuario_bloqueado']==0 & $reg['Usuario_perfil']==$admin){


    header('Location: administrador/menu.php');

}else if ($reg['Usuario_clave']==$contra & $reg['Usuario_bloqueado']==0 & $reg['Usuario_perfil']==$work){

        header('Location: work/w_menu.php');

    }else if ($reg['Usuario_clave']==$contra & $reg['Usuario_bloqueado']==0 & $reg['Usuario_perfil']==$user){

        header('Location: user/u_menu.php');

}else if ($reg['Usuario_bloqueado']==1){
echo"<div class='container' > ";
        echo  "Usuario bloqueado";
        echo"</div>";
}else{
        echo"<div class='container' > ";
                echo  "La contraseña no es correcta";
                echo"</div>";

                session_unset();
                session_destroy();//Literalmente la destruimos

              }

    }

    if($numero==0){
      echo"<div class='container' > ";
      echo  "No existe el usuario";
      echo"</div>";

      session_unset();
      session_destroy();//Literalmente la destruimos

    }


?>

</body>
</html>
