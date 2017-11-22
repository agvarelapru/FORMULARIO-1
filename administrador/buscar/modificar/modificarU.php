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




  require_once('../../../biblioteca/conexion.php');

  $conexion=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME) or
      die("Problemas con la conexión.");
    mysqli_set_charset($conexion,"utf8");


    $registros=mysqli_query($conexion,"select * from usuarios
    where Usuario_id=".$_REQUEST['id']) or
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


<form class="form-horizontal" role="form" id="editar" name="editar" method="post" action="usuarioModificado.php">

  <div class="form-group">
    <label for="id">Id</label>
    <input  class="form-control" type="text" name="id" id="id"  placeholder="id" pattern="[0-9]{1,500}"  title="Introduzca nombre de usuario 0-9" value="<?php echo $reg['Usuario_id'];?>"/>
  </div>

  <div class="form-group">
    <label for="nombre">Nombre</label>
    <input  class="form-control" type="text" name="nombre" id="nombre" placeholder="Nombre" pattern="[.-_A-Za-z ñÑ]{1,50}"  title="Introduzca nombre de usuario .-_A-Za-z ñÑ" required value="<?php echo $reg['Usuario_nombre'];?>"/>
  </div>

  <div class="form-group">
    <label for="apellido1">Apellido 1</label>
    <input  class="form-control" type="text" name="apellido1" id="apellido1" placeholder="Apellido 1" pattern="[.-_A-Za-z ñÑ]{1,50}"  title="Introduzca nombre de usuario .-_A-Za-z ñÑ" required value="<?php echo $reg['Usuario_apellido1'];?>"/>
  </div>

  <div class="form-group">
    <label for="apellido2">Apellido 2</label>
    <input  class="form-control" type="text" name="apellido2" id="apellido2" placeholder="Apellido 2" pattern="[.-_A-Za-z ñÑ]{1,50}"  title="Introduzca nombre de usuario .-_A-Za-z ñÑ" required value="<?php echo $reg['Usuario_apellido2'];?>"/>
  </div>

<div class="form-group">
  <label for="nick">Usuario</label>
  <input  class="form-control" type="text" name="nick" id="nick" placeholder="Usuario" pattern="[.-_A-Za-z0-9 ñÑ]{1,50}"  title="Introduzca nombre de usuario .-_A-Za-z0-9 ñÑ" required value="<?php echo $reg['Usuario_nick'];?>"/>
</div>
<!--
<div class="form-group">
  <label for="pass">Contraseña</label>
  <input  class="form-control" type="password" name="pass" id="pass" onblur="comprueba()" placeholder="Contraseña" pattern="[.-_A-Za-z0-9 ñÑ]{1,50}"  title="Introduzca contraseña .-_A-Za-z0-9 ñÑ" required />

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
-->
  <div class="form-group">
    <label for="email">Email</label>
    <input class="form-control" type="email" name="email" id="email" placeholder="correo@ejemplo.com" required pattern= "[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" title="Introduzca este formato correo@ejemplo.com" value="<?php echo $reg['Usuario_email'];?>"/>
  </div>

  <div class="form-group">
    <label for="bloqueado">Bloqueado</label>
    <?php
    if($reg['Usuario_bloqueado']==1){
      ?><input class='form-control' type='checkbox' name='tic' id='tic' checked><?php
    }else{
      ?><input class='form-control' type='checkbox' name='tic' id='tic'><?php
    }
     ?>
  </div>

  <div class="form-group">
    <label for="fecha_bloqueo">Fecha de bloqueo</label>
    <input  class="form-control" type="date" name="fecha_bloqueo" id="fecha_bloqueo" placeholder="aaaa/mm/dd"  pattern= "[0-9]{4}/(0[1-9]|1[012])/(0[1-9]|1[0-9]|2[0-9]|3[01])" title="Introduzca este formato aaaa/mm/dd" value="<?php echo $reg['Usuario_fecha_bloqueo'];?>"/>
  </div>

  <div class="form-group">
    <label for="numero_intentos">Numero intentos</label>
    <input  class="form-control" type="number" name="numero_intentos" id="numero_intentos" placeholder="Numero intentos" pattern="[0-9]{1,3}"  title="Introduzca numero 0-3"  value="<?php echo $reg['Usuario_numero_intentos'];?>"/>
  </div>

  <div class="form-group">
    <label for="fecha_ultima_conexion">Fecha de ultima conexion</label>
    <input  class="form-control" type="date" name="fecha_ultima_conexion" id="fecha_ultima_conexion" placeholder="aaaa/mm/dd"  pattern= "[0-9]{4}/(0[1-9]|1[012])/(0[1-9]|1[0-9]|2[0-9]|3[01])" title="Introduzca este formato aaaa/mm/dd" value="<?php echo $reg['Usuario_fecha_ultima_conexion'];?>"/>
  </div>

  <div class="form-group">
    <label for="domicilio">Domicilio</label>
    <input  class="form-control" type="text" name="domicilio" id="domicilio" placeholder="Domicilio" pattern="[.-/,º:_A-Za-z0-9 ñÑ]{1,50}"  title="Introduzca direccion .-/,º:_A-Za-z0-9 ñÑ"  value="<?php echo $reg['Usuario_domicilio'];?>"/>
  </div>

  <div class="form-group">
    <label for="poblacion">Poblacion</label>
    <input  class="form-control" type="text" name="poblacion" id="poblacion" placeholder="Poblacion" pattern="[.-/,º:_A-Za-z0-9 ñÑ]{1,50}"  title="Introduzca poblacion .-/,º:_A-Za-z0-9 ñÑ"  value="<?php echo $reg['Usuario_poblacion'];?>"/>
  </div>

  <div class="form-group">
    <label for="provincia">Provincia</label>
    <input  class="form-control" type="text" name="provincia" id="provincia" placeholder="Provincia" pattern="[A-Za-z ñÑ]{1,50}"  title="Introduzca poblacion A-Za-z ñÑ"  value="<?php echo $reg['Usuario_provincia'];?>"/>
  </div>


  <div class="form-group">
    <label for="perfil">Perfil</label>
    <select class="form-control" name="perfil" id="perfil">

      <?php
      if($reg['Usuario_perfil']=="admin"){
        ?>
        <option value="admin">admin</option>
        <option value="work">work</option>
        <option value="user">user</option>
          <?php
      }else if($reg['Usuario_perfil']=="work"){
        ?>  <option value="work">work</option>
        <option value="user">user</option>
          <option value="admin">admin</option><?php
      }else{
        ?><option value="user">user</option>
        <option value="work">work</option>
        <option value="admin">admin</option><?php
      }
       ?>

    </select>
  </div>


  <div class="form-group">
    <label for="nif">Nif</label>
    <input  class="form-control" type="text" name="nif" id="nif" placeholder="NIF" pattern="[-A-Za-z0-9 ñÑ]{1,50}"  title="Introduzca NIF 00000000-A"  value="<?php echo $reg['Usuario_nif'];?>"/>
  </div>

  <div class="form-group">
    <label for="numero_telefono">Telefono</label>
    <input  class="form-control" type="text" name="numero_telefono" id="numero_telefono" placeholder="Telefono" pattern="[0-9]{9}"  title="Introduzca telefono"  value="<?php echo $reg['Usuario_numero_telefono'];?>"/>
  </div>

  <div class="form-group">
    <label for="fotografia">fotografia</label>
    <input  class="form-control" type="text" name="fotografia" id="fotografia" placeholder="fotografia" pattern="[.-/,º:_A-Za-z0-9]{1,50}"  title="Introduzca fotografia"  value="<?php echo $reg['Usuario_fotografia'];?>"/>
  </div>

  <div class="form-group">
    <label for="fecha_contratacion">Fecha de Contratacion</label>
    <input  class="form-control" type="date" name="fecha_contratacion" id="fecha_contratacion" placeholder="aaaa/mm/dd"  pattern= "[0-9]{4}/(0[1-9]|1[012])/(0[1-9]|1[0-9]|2[0-9]|3[01])" title="Introduzca este formato aaaa/mm/dd" value="<?php echo $reg['Usuario_fecha_contratacion'];?>"/>
  </div>

  <div class="form-group">
    <label for="fecha_nacimiento">Fecha de Nacimiento</label>
    <input  class="form-control" type="date" name="fecha_nacimiento" id="fecha_nacimiento" placeholder="aaaa/mm/dd" required pattern= "[0-9]{4}/(0[1-9]|1[012])/(0[1-9]|1[0-9]|2[0-9]|3[01])" title="Introduzca este formato aaaa/mm/dd" value="<?php echo $reg['Usuario_fecha_nacimiento'];?>"/>
  </div><br><br>



  <input class="btn btn-primary" type="reset" name="limpiar" value="Borrar" />
  <input  class="btn btn-primary" type="submit" name="enviar" id="enviar" value="Modificar"/>


</form>


<?php
}
?>

 </div>
 <?php
}
?>



</body>
</html>
