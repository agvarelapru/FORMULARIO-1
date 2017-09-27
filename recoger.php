<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	
	<title>Nuevo formulario</title>
</head>
<body> 
	
	<?php
	$conexion=mysqli_connect("localhost","root","","2daw") or die("Problemas con la conexión");
	
	mysqli_query($conexion,"insert into formulario(nombre,apellidos,email,telefono) values 
                       ('$_REQUEST[nombre]','$_REQUEST[apellidos]','$_REQUEST[email]','$_REQUEST[telefono]')")
  or die("Problemas en el select".mysqli_error($conexion));

mysqli_close($conexion);

echo "El alumno fue dado de alta.";
	
	?>
</body>
</html>


