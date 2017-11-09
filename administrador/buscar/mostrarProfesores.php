<html>
<head>
<title>Formulario Alumnos</title>
<html lang="es">

	<meta charset="utf-8">
	
</head>
<style>
body{
    margin:auto;
   background-color: darkgrey;
    
    
}
header{
width: 97%;
height:110px;
   border:3px solid darkred;
    background-color: darkslategrey;
    
    MARGIN:1%;
    color:white;
}
h2 {
    font-family: verdana;
    text-align:center;
 
}
h3{
    font-weight: bold;
    font-size:1.1em;
}     
#profesores{
background-color: darkslategrey;
    
    border-collapse: collapse;
    margin-left:8.5%;
     margin-top:10px;
    color:white;
    width: 80%;
    height:200PX;
    padding: 10px;
font-family:calibri;
/*margin:auto;*/
border:3px solid darkred;
}
hr{
    color:darkred;
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
    border:6px solid darkred;
background:darkslategrey;
color:white;
font-family: BankGothic Md BT;
}
legend{
font-weight:bold;
color:white;
font-family: BankGothic Md BT;
 
}
.boton {
    
    height: 30px;  
   padding: 7px 7px;
   font-family: BankGothic Md BT;
   font-weight: bold;
   line-height: 1;
   color: #444;
   border: none;
   text-shadow: 0 1px 1px rgba(255, 255, 255, 0.85);
   background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#fff), to(#bbb));
   background-image: -moz-linear-gradient(0% 100% 90deg, #BBBBBB, #FFFFFF);
   background-color: #fff;
   border: 1px solid #f1f1f1;
   border-radius: 25px;
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
	color: darkred;
    -ms-transform: scale(1.5,1.5); /* IE 9 */
    -webkit-transform: scale(1.5,1.5); /* Safari */
    transform: scale(1.5,1.5); /* Standard syntax */
   
    /*font-size: 1.5em;*/
   
    
}
.boton:active {
	border: 1px solid #222;
	box-shadow: 0 0 10px 5px #444 inset; 
}
.separacion{

    margin-right:7%;
    float:left;
    
}
.botonera{
   width: 33%;
    float:left;
    /*margin-left:33%;*/
}

    </style>
<body>
<header>
    </br>
  <H2> LISTADO DE PROFESORES</H2>
    </header>
<?php
$conexion=mysqli_connect("mysql.hostinger.es","u400103939_angel","16del6del81","u400103939_insti") or
    die("Problemas con la conexión");

$registros=mysqli_query($conexion,"select nif,nombre, apellido1, apellido2, direccion, provincia, mail, web
                        from profesores") or
  die("Problemas en el select:".mysqli_error($conexion));

  

$cant=0;
while ($reg=mysqli_fetch_array($registros))
{
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




  echo  "<div id=profesores>";
  echo "<h3> NIF: ".$reg['nif']."<br>";echo "</h3><hr>";
  echo "<div class=separacion>NOMBRE: ".$reg['nombre']."</div>";
  echo "<div class=separacion>APELLIDO 1: ".$reg['apellido1']."</div>";
  echo "<div class=separacion>APELLIDO 2: ".$reg['apellido2']."</div>";
  echo "<div class=separacion>DIRECCION: ".$reg['direccion']."</div><br><br>";
    
  echo "<div class=separacion>MAIL: ".$reg['mail']."</div>";
 
 
  
  echo "<div class=separacion>WEB: ".$reg['web']."</div>";
  echo "<div class=separacion>PROVINCIA: ".$provincia['Nombre_provincia']."</div><br>"; 
  echo "<hr>";

?>
<div class="botonera">
<form  action="modificar/modificarProfesor.php"  method="post"> 
<input type="hidden" name="mail" value="<?php echo $reg['mail'];?>"/>
<button class="boton" type="submit" >MODIFICAR</button>
</form></div>
<div class="botonera">
<form  action="borrar/borrarProfesor.php"  method="post"> 
<input type="hidden" name="mail" value="<?php echo $reg['mail'];?>"/>
<button class="boton" type="submit" >BORRAR</button>
</form></div>
<div class="botonera">
<form  action="../menu.html" method="post">  
<button class="boton" type="submit" >VOLVER</button>
</form></div>


<?php
echo"</div>";
$cant++;
}


if($cant==0){
 echo "<div class=error>"; 
echo "<fieldset>";   
echo"<legend>Error:</legend>";
echo "<p> No existe profesor con dicho mail</p>";
  echo "</fieldset>";
 
?>
<a href="../menu.html"><button class="boton">VOLVER</button></a>
<?php
echo "</div>";}
mysqli_close($conexion);
?>

</body>
</html>