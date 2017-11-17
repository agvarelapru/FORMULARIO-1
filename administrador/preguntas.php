<html>
<head>
<title>Formulario</title>
<html lang="es">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width" charset="UTF-8" />
<link href="../../biblioteca/css/bootstrap.min.css" rel="stylesheet" media="screen">
<script src="../../biblioteca/jquery/jquery.min.js"></script>
  <script src="../../biblioteca/js/bootstrap.min.js"></script>
<link href="../../biblioteca/estilos.css" rel="stylesheet" media="screen">
</head>
<style>
   @font-face {
    font-family: optimus;
    src: url(../fuente/Optimus.otf);
}
body{
    margin:auto;
   background-color: darkgrey;


}
header{
width: 97%;
height:110px;
   border:3px solid red;
    background-color: #000099;

    MARGIN:1%;
    color:white;
}
h2 {
    font-family: optimus;
    text-align:center;

}
h3{
    font-weight: bold;
    font-size:1.1em;
}
#proveedores{
background-color: #000099;

    border-collapse: collapse;
    margin-left:8.5%;
     margin-top:20px;
    color:white;
    width: 80%;
    height:260PX;
    padding: 10px;
font-family:optimus;
/*margin:auto;*/
border:3px solid red;
}
hr{
    color:red;
}
.error {
    width:40%;
    height:150px;
    list-style-type:none;
	margin:0px;
	padding:0px;
    background-color: darkgrey;
    margin:auto;

}
fieldset{
    border:6px solid red;
background:#000099;
color:white;
font-family: optimus;
}
legend{
font-weight:bold;
color:white;
font-family: optimus;

}
.boton {

    height: 30px;
   padding: 7px 7px;
   font-family: optimus;
   font-weight: bold;
   line-height: 1;
   color: #000099;
   border: none;
   text-shadow: 0 1px 1px rgba(255, 255, 255, 0.85);
   background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#fff), to(#bbb));
   background-image: -moz-linear-gradient(0% 100% 90deg, #BBBBBB, #FFFFFF);
   background-color: #fff;
   border: 1px solid #f1f1f1;
   border-radius: 5px 25px 10px 20px;
   box-shadow: 0 1px 2px rgba(0, 0, 0, 0.5);
    margin:15px 33%;

 -moz-transition: width 2s, heigth 2s, transform 1s, font-size 1s, opacity 1s;
	-webkit-transition: width, 2s heigth 2s, transform 1s, font-size 1s, opacity 1s;
	-o-transition: width 2s, heigth 2s, transform 1s, font-size 1s, opacity 1s;
	transition:width 2s, heigth 2s, transform 1s, font-size 1s, opacity 1s;


}

.boton:hover {
	opacity:.80;
	cursor: pointer;
	color: red;
    -ms-transform: scale(1.5,1.5); /* IE 9 */
    -webkit-transform: scale(1.5,1.5); /* Safari */
    transform: scale(1.5,1.5); /* Standard syntax */

    /*font-size: 1.5em;*/


}
.boton:active {
	border: 1px solid #222;
	box-shadow: 0 0 10px 5px #444 inset;
}
.boton2 {
    width:25%;
    height: 30px;
   padding: 7px 7px;
   font-family: optimus;
   font-weight: bold;
   line-height: 1;
   color: #000099;
   border: none;
   text-shadow: 0 1px 1px rgba(255, 255, 255, 0.85);
   background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#fff), to(#bbb));
   background-image: -moz-linear-gradient(0% 100% 90deg, #BBBBBB, #FFFFFF);
   background-color: #fff;
   border: 1px solid #f1f1f1;
   border-radius: 5px 10px 15px 25px;
   box-shadow: 0 1px 2px rgba(0, 0, 0, 0.5);
    margin:15px 37.5%;

 -moz-transition: width 2s, heigth 2s, transform 1s, font-size 1s, opacity 1s;
	-webkit-transition: width, 2s heigth 2s, transform 1s, font-size 1s, opacity 1s;
	-o-transition: width 2s, heigth 2s, transform 1s, font-size 1s, opacity 1s;
	transition:width 2s, heigth 2s, transform 1s, font-size 1s, opacity 1s;


}

.boton2:hover {
	opacity:.80;
	cursor: pointer;
	color: red;
    -ms-transform: scale(1.5,1.5); /* IE 9 */
    -webkit-transform: scale(1.5,1.5); /* Safari */
    transform: scale(1.5,1.5); /* Standard syntax */

    /*font-size: 1.5em;*/


}
.boton2:active {
	border: 1px solid #222;
	box-shadow: 0 0 10px 5px #444 inset;
}
.separacion{

    margin-right:4%;
    float:left;

}
.botonera{
   width: 33%;
    float:left;
    /*margin-left:33%;*/
}
select{
     width: 62%;
     font-family:optimus;
}

@media screen and (max-width: 375px) {
    header{
width: 97%;
    MARGIN:0%;
}

h2 {
    font-size:1.3em;
}
#proveedores{
    margin-left:0%;
     margin-top:10px;
    width: 91%;
    height:600PX;
    padding: 10px;
}
.separacion{

    margin-right:5%;
    float:none;

}
.botonera{
   width: 33%;
    float:left;
  margin:0px 0%;
  padding: 0px 0%;
}
.boton {
    width:90%;
    height: 30px;
   padding: 7px 5px;
    margin:15px 5%;
    font-size:0.8em;

}
.boton:hover {
	opacity:.90;
    -ms-transform: scale(1.2,1.2); /* IE 9 */
    -webkit-transform: scale(1.2,1.2); /* Safari */
    transform: scale(1.2,1.2); /* Standard syntax */
}
.boton2 {
    width:50%;
    height: 30px;
   padding: 7px 5px;
    margin:15px 25%;
    font-size:0.8em;

}
.boton2:hover {
	opacity:.90;
    -ms-transform: scale(1.2,1.2); /* IE 9 */
    -webkit-transform: scale(1.2,1.2); /* Safari */
    transform: scale(1.2,1.2); /* Standard syntax */
}
.error {
    width:100%;
    height:180px;
	margin:0px;
	padding:0px;
    background-color: darkgrey;
}

}

    </style>
<body>
<header>
    </br>
  <H2> LISTADO DE PROVEEDORES</H2>
    </header>

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
/*
   mysqli_set_charset($conexion,"utf8");
$consulta_mysql2=mysqli_query($conexion,"select *
                        from provincias") or
  die("Problemas en el select:".mysqli_error($conexion));

 while($reg2=mysqli_fetch_array($consulta_mysql2)){
        if($reg['provincia']==$reg2["Codigo_provincia"]){

     $provincia=$reg2;
    break;
        }  else{
 $provincia=null;
        }
}
*/
$resuelta="";
if($reg['resuelta']==1){
$resuelta=" SI ";
}else{
  $resuelta=" NO ";

}


?>

<div class="list-group">
  <a href="#" class="list-group-item active">
    <h4 class="list-group-item-heading" style="float:left;"><?php echo "Codigo Pregunta: ".$reg['codigoDuda']?> </h4>
<h4 class="list-group-item-heading" style="float:right;"><?php echo "Resuelta: ".$resuelta?> </h4><br><br>
    <p class="list-group-item-text"><?php echo "Usuario: ".$reg['usuario'];?></p>
    <p class="list-group-item-text"><?php echo "Fecha Pregunta: ".$reg['fechaPregunta']?></p>

  </a>
</div>




<?php

  /*
  echo "<h3> Codigo Pregunta: ".$reg['codigoDuda'] ;
  echo "<div class=separacion>Usuario: ".$reg['usuario']."</div>";
  echo "<div class=separacion>Fecha Pregunta: ".$reg['fechaPregunta']."</div>";
  echo "<div class=separacion>Resuelta: ".$reg['resuelta'];

*/




echo"</div>";
$cant++;
}


if($cant==0){
 echo "<div class=error>";
echo "<fieldset>";
echo"<legend>Error:</legend>";
echo "<p> No existe proveedor con dichos datos</p>";
  echo "</fieldset>";

?>
<a href="BUSCARPROVEEDOR.php"><button class="boton2">VOLVER</button></a>
<?php
echo "</div>";}
mysqli_close($conexion);
?>
</body>
</html>
