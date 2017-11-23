<?php


// Start the session
session_start();

?>
<!doctype html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>Paso</title>
<!-- CSS de Bootstrap -->
<link href="biblioteca/css/bootstrap.min.css" rel="stylesheet" media="screen">
<script src="biblioteca/jquery/jquery.min.js"></script>
  <script src="biblioteca/js/bootstrap.min.js"></script>
<link href="biblioteca/estilos.css" rel="stylesheet" media="screen">


</head>

<body>
<?php

// Set session variables
$_SESSION["busqueda"]= $_REQUEST['busqueda'];


header('Location: usuarios2.php');

?>

</body>
</html>
