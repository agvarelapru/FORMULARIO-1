<html>
<head>
<title>Formulario Alumnos</title>
<html lang="es">

	<meta charset="utf-8">
	
</head>
<style>
body{
    margin:auto;
}
h2 {
    font-family: verdana;
    text-align:center;
    
}
h3{
    font-weight: bold;
    border-bottom: 1px solid white;
}     
#alumnos{
background-color: blue ;
    border: 1px solid white;
    border-collapse: collapse;
     float:left;
    color:white;
    width: 200px;
    padding: 10px;
font-family:calibri;
margin:auto;

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
     width: 25%;
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
     margin:15px 37.5%;
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

    </style>
<body>
<?php
$conexion=mysqli_connect("mysql.hostinger.es","u400103939_angel","16del6del81","u400103939_insti") or
    die("Problemas con la conexión");

$registros=mysqli_query($conexion,"select codigo,nombre, codigocurso
                        from alumnos where mail like '%$_POST[mail]%'") or
  die("Problemas en el select:".mysqli_error($conexion));

$cant=0;
while ($reg=mysqli_fetch_array($registros))
{
  echo  "<div id=alumnos>";  
  echo "Nombre:".$reg['nombre']."<br>";
  echo "Curso:";
  switch ($reg['codigocurso']) {
    case 1:echo "PHP";
           break;
    case 2:echo "ASP";
           break;
    case 3:echo "JSP";
           break;
  }
  $cant++;
  echo "<br>";
  echo "<hr>";
  echo"</div>";
}


if($cant==0){
 echo "<div class=error>"; 
echo "<fieldset>";   
echo"<legend>Error:</legend>";
echo "<p> No existe alumno con dicho mail</p>";
  echo "</fieldset>";

?>
<a href="BUSCARMAILALUMNO.html"><button class="boton">VOLVER</button></a>
<?php
echo "</div>";}
mysqli_close($conexion);
?>
</body>
</html>