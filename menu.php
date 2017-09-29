<!doctype html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">	
<title>Formulario</title>
<!-- CSS de Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="estilos.css" rel="stylesheet" media="screen">

</head>


<body>
<?php


$usuarioErr =$contraseñaErr = "";
$usuario = $contraseña =  "";

if (empty($_POST["usuario"])) {
    $usuarioErr = "Usuario y contraseñas obligatorios";
  } else {
    $usuario = test_input($_POST["usuario"]);  

    if (!preg_match("/^[a-zA-Z0-9 -.,\/]*$/",$usuario)) {
      $usuarioErr = "Solo letras y espacio en blanco";
    }
  }
  if (empty($_POST["usuario"])) {
    $usuarioErr = "Usuario y contraseñas obligatorios";
  } else {
    $usuario = test_input($_POST["usuario"]);  

    if (!preg_match("/^[a-zA-Z0-9 -.,\/]*$/",$usuario)) {
      $usuarioErr = "Solo letras y espacio en blanco";
    }
  }

?>
<div class="container" >   
<h1>HOLA</h1>
<div>
</body>
</html>