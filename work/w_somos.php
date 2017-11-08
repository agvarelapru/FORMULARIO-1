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
      <li><a href="w_menu.php">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Page 1-1</a></li>
          <li><a href="#">Page 1-2</a></li>
          <li><a href="#">Page 1-3</a></li>
        </ul>
      </li>
      

      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="somos.php">Contacto <span class="caret"></span></a>
      <ul class="dropdown-menu">
          <li class="active"><a href="w_somos.php">Contacte con nosotros</a></li>
          <li><a href="w_estamos.php">Donde estamos</a></li>
          
        </ul>
    </li>
    
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span>  Hola <?php echo $_SESSION["usuario"] ?> </a></li>
      <li><a href="../salir.php"><span class="glyphicon glyphicon-log-out"></span> Salir</a></li>
    </ul>
  </div>
</nav>








<!--
  <nav class="navbar navbar-inverse" role="navigation">
    <!-- El logotipo y el icono que despliega el menú se agrupan
         para mostrarlos mejor en los dispositivos móviles
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse"
              data-target=".navbar-ex1-collapse">
        <span class="sr-only">Desplegar navegación</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Logotipo</a>
    </div>
  
    <!-- Agrupar los enlaces de navegación, los formularios y cualquier
         otro elemento que se pueda ocultar al minimizar la barra 
    <div class="collapse navbar-collapse navbar-ex1-collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Enlace #1</a></li>
        <li><a href="#">Enlace #2</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            Menú #1 <b class="caret"></b>
          </a>
          <ul class="dropdown-menu">
            <li><a href="#">Acción #1</a></li>
            <li><a href="#">Acción #2</a></li>
            <li><a href="#">Acción #3</a></li>
            <li class="divider"></li>
            <li><a href="#">Acción #4</a></li>
            <li class="divider"></li>
            <li><a href="#">Acción #5</a></li>
          </ul>
        </li>
      </ul>
  
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Buscar">
        </div>
        <button type="submit" class="btn btn-default">Enviar</button>
      </form>
  
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Enlace #3</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            Menú #2 <b class="caret"></b>
          </a>
          <ul class="dropdown-menu">
            <li><a href="#">Acción #1</a></li>
            <li><a href="#">Acción #2</a></li>
            <li><a href="#">Acción #3</a></li>
            <li class="divider"></li>
            <li><a href="#">Acción #4</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
  -->












<div class="container" >   
<h3>Contacte con nosotros</h3>
<form class="form-horizontal" role="form" id="form1" name="form1" method="post" action="w_contacto.php">
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
  
  <textarea class="form-control" name="comentarios" rows="5" cols="30" placeholder="Escriba aqui su comentario"   title="Introduzca solo caracteres A-Z , a-z y numeros de 0 a 9"></textarea>
  </div>

 
  <input class="btn btn-primary" type="reset" name="limpiar" value="Borrar" />
  <input  class="btn btn-primary" type="submit" name="enviar" id="enviar" value="Enviar" />
</form>
</div>




<br><br>
<?php
}
?>
</body>
</html>