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




    </style>
<body>

<?php
$conexion=mysqli_connect("mysql.hostinger.es","u400103939_angel","16del6del81","u400103939_insti") or
    die("Problemas con la conexión");

$registros=mysqli_query($conexion,"select codigo,nombre, mail, codigocurso
                        from alumnos") or
  die("Problemas en el select:".mysqli_error($conexion));
echo "<h2>Alumnos</h2>";
while ($reg=mysqli_fetch_array($registros))
{
  echo  "<div id=alumnos>";
  echo "<h3>CODIGO: ".$reg['codigo']."</h3><br>";
  echo "NOMBRE: ".$reg['nombre']."<br>";
  echo "MAIL: ".$reg['mail']."<br>";
  echo "CURSO: ";
  switch ($reg['codigocurso']) {
    case 1:echo "DAW";
           break;
    case 2:echo "Cocina";
           break;
    case 3:echo "RX";
           break;
  }
  echo "<br>";
  echo "<hr>";
echo"</div>";
}

mysqli_close($conexion);
?>

</body>
</html>