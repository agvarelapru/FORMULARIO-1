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


<link rel="stylesheet" href="../../biblioteca/css/bootstrap.min.css">
  <script src="../../biblioteca/jquery/jquery.min.js"></script>
  <script src="../../biblioteca/js/bootstrap.min.js"></script>
  <link href="../../biblioteca/estilos.css" rel="stylesheet" media="screen">


<script  type="text/javascript">

</script>


</head>
<style>
.container{
    background-color: white;
    margin-top:50px;
    padding-top: 10px;
    padding-bottom: 10px;
    padding-right: 5%;
    padding-left: 5%;
   width: 80%;
   border-radius: 0px;
}
@media screen and (max-width: 725px) {
    .container{
        margin-top:50px;
        padding-top: 60px;
        padding-bottom: 10px;
        padding-right: 5%;
        padding-left: 5%;
        margin-top:0px;
       border-radius: 0px;
       width: 100%;

    }
}
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




    </div>
    <ul class="nav navbar-nav" style="position=fixed">
      <li><a href="../../menu.php">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Page 1-1</a></li>
          <li><a href="#">Page 1-2</a></li>
          <li><a href="#">Page 1-3</a></li>
        </ul>
      </li>


      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="../somos.php">Contacto <span class="caret"></span></a>
      <ul class="dropdown-menu">
          <li><a href="../somos.php">Contacte con nosotros</a></li>
          <li><a href="../estamos.php">Donde estamos</a></li>

        </ul>
    </li>
    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Administrador <span class="caret"></span></a>
      <ul class="dropdown-menu">
        <li><a href="../buscar/buscar.php">Buscar usuario</a></li>
        <li><a href="../../agregar/registro.html">Agregar usuario</a></li>
       <li class="active"><a href="preguntas/buscarP.php">Preguntas</a></li>
        </ul>
    </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span>  Administrador <?php echo $_SESSION["usuario"] ?> </a></li>
      <li><a href="../../salir.php"><span class="glyphicon glyphicon-log-out"></span> Salir</a></li>
    </ul>
  </div>
</nav>

<div class='container'>

<?php
require_once('../../biblioteca/conexionLocal.php');

$conexion=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME) or
    die("Problemas con la conexión.");
  mysqli_set_charset($conexion,"utf8");
/*  $where[]="";
  if($_POST['usuario']!=""){
    $where[]="usuario LIKE '%".$_POST['usuario']."%' ";
  }
  if($_POST['email']!=""){
    $where[]="email LIKE '%".$_POST['email']."%' ";
  }
  if($_POST['fechaPregunta']!=""){
    $where[]="fechaPregunta= ".$_POST['fechaPregunta']." ";
  }

if(isset($_POST['resuelta'])){
    $where[]="resuelta = 1 ";
}else if(empty($_POST['resuelta'])){
    $where[]="resuelta = 0 ";
}*/
$where="";
  if($_POST['usuario']!=""){
    $where.=" usuario LIKE '%".$_POST['usuario']."%' ";
  }
  if($_POST['email']!=""){
    $where.=" email LIKE '%".$_POST['email']."%' ";
  }
  if($_POST['fechaPregunta']!=""){
    $where.=" fechaPregunta= ".$_POST['fechaPregunta']." ";
  }

if(isset($_POST['resuelta'])){
    $where.=" resuelta = 1 ";
}else if(empty($_POST['resuelta'])){
    $where.=" resuelta = 0 ";
}

/*
$registros=mysqli_query($conexion,"select codigoDuda, usuario, resuelta, fechaPregunta  from contacto where ".implode(' AND ',$where)." order by fechaPregunta") or
  die("Problemas en el select:".mysqli_error($conexion));

*/
$registros=mysqli_query($conexion,"select codigoDuda, usuario, resuelta, fechaPregunta  from contacto where ".$where." order by fechaPregunta") or
  die("Problemas en el select:".mysqli_error($conexion));

$cant=0;
while ($reg = mysqli_fetch_array($registros))
{

$resuelta="";
if($reg['resuelta']==1){
$resuelta=" SI ";
}else{
  $resuelta=" NO ";

}
$codigo=$reg['codigoDuda'];

/*
<div class="list-group">
  <a href="mostrarP.php?codigoDuda='<?php.$codigo ?>'" class="list-group-item active">"
    <h4 class="list-group-item-heading" style="float:left;"><?php echo "Codigo: ".$reg['codigoDuda']?> </h4>
<h4 class="list-group-item-heading" style="float:right;"><?php echo "Resuelta: ".$resuelta?> </h4><br><br>
    <p class="list-group-item-text"><?php echo "Usuario: ".$reg['usuario'];?></p>
    <p class="list-group-item-text"><?php echo "Fecha Pregunta: ".$reg['fechaPregunta']?></p>

  </a>
</div>
*/

echo "<div class='list-group'>";
  echo "<a href='mostrarP.php?codigoDuda=".$codigo."' class='list-group-item active'>";
  echo "<h4 class='list-group-item-heading' style='float:left;'> Codigo: ".$reg['codigoDuda']."</h4>";
echo "<h4 class='list-group-item-heading' style='float:right;'> Resuelta: ".$resuelta."</h4><br><br>";
echo    "<p class='list-group-item-text'>Usuario: ".$reg['usuario']."</p>";
  echo  "<p class='list-group-item-text'>Fecha Pregunta: ".$reg['fechaPregunta']."</p>";

  echo "</a>";
echo "</div>";








$cant++;
}
?>

</div>
<?php
if($cant==0){
 echo "<div class=container>";


echo "<p> No hay preguntas</p>";

echo "</div>";}
mysqli_close($conexion);

}
?>

</body>
</html>
