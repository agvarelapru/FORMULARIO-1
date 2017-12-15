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
<link href="../biblioteca/css/bootstrap.min.css" rel="stylesheet" media="screen">
<script src="../biblioteca/jquery/jquery.min.js"></script>
<script src="../biblioteca/js/bootstrap.min.js"></script>
<link href="../biblioteca/estilos.css" rel="stylesheet" media="screen">

<script  type="text/javascript">

window.onload = function(){

  document.getElementById("enviar").addEventListener('click',pass,false);
    }

function pass(eventoClick){
var pass=document.getElementById('pass').value;
var pass2=document.getElementById('pass2').value;


if(pass!=pass2){
eventoClick.preventDefault();
document.getElementById('error').style.color="red";
document.getElementById('error').innerHTML="Las contraseñas deben de ser iguales";
}
}
</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-111179481-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-111179481-1');
</script>

</head>


<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
         <div class="navbar-header">
              <a class="navbar-brand" href="../salir.php">La Pagina de Angel</a>
            </div>
        </nav>
<?php
if(empty($_SESSION['nick']) || empty($_SESSION['nombre']) || empty($_SESSION['apellido1']) || empty($_SESSION['apellido2']) || empty($_SESSION['email']) || empty($_SESSION['fecha_nacimiento'])){
$_SESSION['nick']=$_SESSION['nombre']=$_SESSION['apellido1']=$_SESSION['apellido2']=$_SESSION['email']=$_SESSION['fecha_nacimiento']="";

?>
<div class="container" >
<h2>ALTA NUEVO USUARIO</h2>

<hr />

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
var pass2=document.getElementById('pass2').value;
if(pass!=pass2){
  document.getElementById('error').innerHTML="Repetir Contraseña   <IMG SRC='../imagenes/error.png'>";

}else{
  document.getElementById('error').style.color="black";
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
    <input class="form-control" type="text" name="apellido1" id="apellido1" placeholder="Apellido 1" pattern="[ A-Za-z ñÑ]{1,50}"  title="Introduzca el apellido 1"   required/>
  </div>
  <div class="form-group">
    <label for="apellido2">Apellido 2</label>
    <input class="form-control" type="text" name="apellido2" id="apellido2 "placeholder="Apellido 2" pattern="[ A-Za-z ñÑ]{1,50}"  title="Introduzca el apellido 2"  required/>
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input class="form-control" type="email" name="email" id="email" placeholder="correo@ejemplo.com" required pattern= "[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" title="Introduzca este formato correo@ejemplo.com"  />
  </div>
  <div class="form-group">
    <label for="fecha_nacimiento">Fecha de Nacimiento</label>
    <input  class="form-control" type="date" name="fecha_nacimiento" id="fecha_nacimiento" placeholder="aaaa/mm/dd" required pattern= "[0-9]{4}/(0[1-9]|1[012])/(0[1-9]|1[0-9]|2[0-9]|3[01])" title="Introduzca este formato aaaa/mm/dd" />
  </div><br><br>



  <input class="btn btn-primary" type="reset" name="limpiar" value="Borrar" />
  <input  class="btn btn-primary" type="submit" name="enviar" id="enviar" value="Enviar"/>


</form>
 </div>
 <?php


}else{


?>
<div class="container" >
<h2>ALTA NUEVO USUARIO</h2>

<hr />

<form class="form-horizontal" role="form" id="alta" name="alta" method="post" action="insertaRegistro.php">



<div class="form-group">
  <label for="nick">Usuario</label>
  <input  class="form-control" type="text" name="nick" id="nick" placeholder="Usuario" pattern="[.-_A-Za-z0-9 ñÑ]{1,50}"  title="Introduzca nombre de usuario .-_A-Za-z0-9 ñÑ" required value="<?php echo $_SESSION['nick'];?>"/><span class="error"><?php echo $_SESSION["nickErr"];?></span>
</div>

<div class="form-group">
  <label for="pass">Contraseña</label>
  <input  class="form-control" type="password" name="pass" id="pass" onblur="comprueba()" placeholder="Contraseña" pattern="[.-_A-Za-z0-9 ñÑ]{1,50}"  title="Introduzca contraseña .-_A-Za-z0-9 ñÑ" required/><span class="error"><?php echo $_SESSION["passErr"];?></span>

</div>
<div class="form-group">
  <label for="pass2" id="error">Repetir Contraseña</label>
  <input  class="form-control" type="password" name="pass2" id="pass2" onblur="comprueba()" placeholder="Contraseña" pattern="[.-_A-Za-z0-9 ñÑ]{1,50}"  title="Introduzca contraseña .-_A-Za-z0-9 ñÑ"   required/><span class="error"><?php echo $_SESSION["pass2Err"];?></span>
  <h5 id="error"></h5>
</div>
<h5 id="error"></h5>

<script  type="text/javascript">

function comprueba(){
var pass=document.getElementById('pass').value;
var pass2=document.getElementById('pass2').value;
if(pass!=pass2){
  document.getElementById('error').innerHTML="Repetir Contraseña   <IMG SRC='../imagenes/error.png'>";

}else{
    document.getElementById('error').style.color="black";
  document.getElementById('error').innerHTML="Repetir Contraseña   <IMG SRC='../imagenes/bien.png'>";
}
}
</script>
<br>


  <div class="form-group">
    <label for="nombre">Nombre</label>
    <input  class="form-control" type="text" name="nombre" id="nombre" placeholder="Nombre" pattern="[ A-Za-z ñÑ]{1,50}"  title="Introduzca nombre"  value="<?php echo $_SESSION['nombre'];?>" required /><span class="error"><?php echo $_SESSION["nombreErr"];?></span>
  </div>
  <div class="form-group">
    <label for="apellido1">Apellido 1</label>
    <input class="form-control" type="text" name="apellido1" id="apellido1" placeholder="Apellido 1" pattern="[ A-Za-z ñÑ]{1,50}"  title="Introduzca el apellido 1" value="<?php echo $_SESSION['apellido1'];?>"  required/><span class="error"><?php echo $_SESSION["apellido1Err"];?></span>
  </div>
  <div class="form-group">
    <label for="apellido2">Apellido 2</label>
    <input class="form-control" type="text" name="apellido2" id="apellido2 "placeholder="Apellido 2" pattern="[ A-Za-z ñÑ]{1,50}"  title="Introduzca el apellido 2" value="<?php echo $_SESSION['apellido2'];?>" required/><span class="error"><?php echo $_SESSION["apellido2Err"];?></span>
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input class="form-control" type="email" name="email" id="email" placeholder="correo@ejemplo.com" required pattern= "[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" title="Introduzca este formato correo@ejemplo.com" value="<?php echo $_SESSION['email'];?>"/><span class="error"><?php echo $_SESSION["emailErr"];?></span>
  </div>
  <div class="form-group">
    <label for="fecha_nacimiento">Fecha de Nacimiento</label>
    <input  class="form-control" type="date" name="fecha_nacimiento" id="fecha_nacimiento" placeholder="aaaa/mm/dd" required pattern= "[0-9]{4}/(0[1-9]|1[012])/(0[1-9]|1[0-9]|2[0-9]|3[01])" title="Introduzca este formato aaaa/mm/dd" value="<?php echo $_SESSION['fecha_nacimiento'];?>" /><span class="error"><?php echo $_SESSION["fecha_nacimientoErr"];?></span>
  </div><br><br>



  <input class="btn btn-primary" type="reset" name="limpiar" value="Borrar" />
  <input  class="btn btn-primary" type="submit" name="enviar" id="enviar" value="Enviar"/>




</form>
 </div>
 <?php
}
  ?>
</body>
</html>
