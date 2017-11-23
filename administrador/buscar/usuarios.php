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
input[type=checkbox] {
transform: scale(1.5);

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
      <li><a href="../menu.php">Home</a></li>
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
        <li class="active"><a href="../buscar/buscar.php">Buscar usuario</a></li>
        <li><a href="../../agregar/registro.html">Agregar usuario</a></li>
       <li ><a href="../preguntas/buscarP2.php">Preguntas</a></li>
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
require_once('../../biblioteca/conexion.php');

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
/*
if(isset($_REQUEST['email']) || isset($_REQUEST['fechaPregunta']) || isset($_REQUEST['resuelta'])){
  $_SESSION["email"] = $_REQUEST['email'];
  $_SESSION["fechaPregunta"] = $_REQUEST['fechaPregunta'];
  $_SESSION["resuelta"] = $_REQUEST['resuelta'];
}
*/

$where="";



  if($_SESSION['user']!=""){
    $where.=" Usuario_nick LIKE '%".$_SESSION['user']."%' ";
  }
  if($_SESSION['poblacion']!=""){
    if($where==""){
        $where.=" Usuario_poblacion LIKE '%".$_SESSION['poblacion']."%' ";
    }else{
      $where.=" and Usuario_poblacion LIKE '%".$_SESSION['poblacion']."%' ";
    }

  }
  if($_SESSION['email']!=""){
    if($where==""){
        $where.=" Usuario_email LIKE '%".$_SESSION['email']."%' ";
    }else{
      $where.=" and Usuario_email LIKE '%".$_SESSION['email']."%' ";
    }

  }
  if($_SESSION['fechaAlta']!=""){
    if($where==""){
        $where.="  Usuario_fecha_alta= ".$_SESSION['fechaAlta']." ";
    }else{
      $where.="  and Usuario_fecha_alta= ".$_SESSION['fechaAlta']." ";
    }

  }
$bloqueado;

if(isset($_SESSION['bloqueado'])){
  $bloqueado=1;
  if($where==""){
    $where.=" Usuario_bloqueado = 1 ";
  }else{
    $where.=" and Usuario_bloqueado = 1 ";
  }

}else if(empty($_SESSION['bloqueado'])){
  $bloqueado=0;
  if($where==""){
    $where.=" Usuario_bloqueado = 0 ";
  }else{
      $where.=" and Usuario_bloqueado = 0 ";
  }

}

/*
$registros=mysqli_query($conexion,"select codigoDuda, usuario, resuelta, fechaPregunta  from contacto where ".implode(' AND ',$where)." order by fechaPregunta") or
  die("Problemas en el select:".mysqli_error($conexion));

*/

//$consulta_contactos = "SELECT * FROM contacto where resuelta=".$_SESSION['resuelta']."";
$rs_contactos = mysqli_query($conexion, "select * from usuarios where ".$where);
$num_total_registros = mysqli_num_rows($rs_contactos);

//Limito la busqueda
$TAMANO_PAGINA = 4;

//examino la página a mostrar y el inicio del registro a mostrar
if(isset($_GET["pagina"])){
  $pagina = $_GET["pagina"];
}else{
  $inicio = 0;
  $pagina = 1;
}

if (!$pagina) {
   $inicio = 0;
   $pagina = 1;
}
else {
   $inicio = ($pagina - 1) * $TAMANO_PAGINA;
}
//calculo el total de páginas
$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);



$registros=mysqli_query($conexion,"select Usuario_id, Usuario_nick, Usuario_bloqueado, Usuario_fecha_alta  from usuarios where ".$where." order by Usuario_fecha_alta  DESC LIMIT ".$inicio."," . $TAMANO_PAGINA) or
  die("Problemas en el select:".mysqli_error($conexion));

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
echo"<form class='form-horizontal'  action='borrar.php' method='post'>";
echo "<div style='float:left;margin-top:25px;margin-right:0%; z-index:1'>";
echo "<input class='form-control' type='checkbox' name='tic[]' id='tic' value='".$reg['Usuario_id']."'>";
echo "</div>";
echo "<div class='list-group' style='width:88%; margin-left:6%;'>";

  echo "<a href='mostrarU.php?Usuario_id=".$codigo."' class='list-group-item active'>";
  echo "<h4 class='list-group-item-heading' style='float:left;'>Cod. ".$reg['Usuario_id']."</h4>";
echo "<h4 class='list-group-item-heading' style='float:right;'>Bloqueado: ".$bloqueado."</h4><br><br>";
echo    "<p class='list-group-item-text'>Usuario: ".$reg['Usuario_nick']."</p>";
  echo  "<p class='list-group-item-text'>Fecha alta: ".$reg['Usuario_fecha_alta']."</p>";

  echo "</a>";

echo "</div>";








$cant++;
}
?><input class="btn btn-primary" type="submit" name="buscar" id="buscar" value="Borrar" style="margin-left:30%;">
</form>
<?php
$self="usuarios.php";
if ($total_paginas > 1) {
  ?><ul class="pagination" ><?php
   if ($pagina != 1){
?><li class="previous"><?php   echo '<a href="'.$self.'?pagina=0">Inicio</a>'  ?> </li><?php
?><li class="previous"><?php   echo '<a href="'.$self.'?pagina='.($pagina-1).'"><span class="glyphicon glyphicon-arrow-left"></a>'  ?> </li><?php
}




      for ($i=1;$i<=$total_paginas;$i++) {
         if ($pagina == $i){
            //si muestro el índice de la página actual, no coloco enlace
          ?>  <li class="active"><a href="#"><?php echo $pagina; ?></a></li><?php

        }else{
            //si el índice no corresponde con la página mostrada actualmente,
            //coloco el enlace para ir a esa página
          ?><li ><?php  echo '  <a href="'.$self.'?pagina='.$i.'">'.$i.'</a>  ';?></li><?php
      }
    }

      if ($pagina != $total_paginas){
    ?><li class="next"><?php   echo '<a href="'.$self.'?pagina='.($pagina+1).'"><span class="glyphicon glyphicon-arrow-right"></a>'  ?> </li><?php
    ?><li class="previous"><?php   echo '<a href="'.$self.'?pagina='.$total_paginas.'">Final</a>'  ?> </li><?php
  }
?></ul><?php

}
//<img src="../../biblioteca/anterior.png" border="0" style="max-width: 100%;">
//<img src="../../biblioteca/siguiente.png" border="0" style="max-width: 100%;">

?>

</div>
<?php
if($num_total_registros==0){
 echo "<div class=container>";


echo "<p> No hay usuarios</p>";

echo "</div>";}
mysqli_close($conexion);

}
?>

</body>
</html>
