

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
	<!--<meta charset="iso-8859-1">-->
	<title>HTML5 Contact Form</title>
	<meta name="viewport" content="width=device-width" charset="UTF-8" />
    <link href="css/bootstrap.css" rel="stylesheet" media="screen">
<link href="estilos.css" rel="stylesheet" media="screen">
    <!--[if IE]>
        <script src="http://html5shiv.googlecode.com/svn/trunk
/html5.js"></script>
        <![endif]-->
</head>

<body>
<form class="contact_form" action="insertarProveedor.php" method="post">
    <ul>
       <li>
            <h2>Alta Proveedores</h2>
       </li>
       <fieldset>
    <legend>Datos personales:</legend>

 <li>
           <label for="idProveedor" style="color:white">ID Proveedor:</label>
           <input type="text" name="idProveedor" placeholder="0000000000" pattern="[0-9]{10}"  title="Introduzca id de Proveedor" required />
       </li>
 <li>
           <label for="nombreProveedor" style="color:white">Nombre Proveedor:</label>
           <input type="text" name="nombreProveedor" placeholder="Nombre provvedor" pattern="[ A-Za-z ñÑ]{1,50}"  title="Introduzca nombre de Proveedor" required />
       </li>
<li>
           <label for="nombreContacto" style="color:white">Nombre contacto:</label>
           <input type="text" name="nombreContacto" placeholder="Nombre contacto" pattern="[ A-Za-z ñÑ]{1,150}"  title="Introduzca nombre de Contacto" required />
       </li>

<li>
           <label for="cargoContacto" style="color:white">Cargo Proveedor:</label>
           <input type="text" name="cargoContacto" placeholder="Cargo contacto" pattern="[ A-Za-z ñÑ]{1,50}"  title="Introduzca cargo de Contacto" required />
       </li>

<li>
           <label for="numeroEmpleados" style="color:white">Numero Empleados:</label>
           <input type="number" name="numeroEmpleados" placeholder="00000" pattern="[0-9]{1,5}" min="1" max="10000" title="Introduzca Numero de empleados" required />
       </li>
<li>
           <label for="direccion" style="color:white">Direccion:</label>
           <input type="text" name="direccion" placeholder="DIRECCION" pattern="[/.,- A-Za-zñÑ0-9]{1,50}"  title="Introduzca solo caracteres A-Z, a-z y 0-9" required />
       </li>
</fieldset>


 <li style="border-bottom:1px solid red; margin-left: 3%; ">
           <label for="email" >Mail:</label>
           <input type="email" name="mail" placeholder="correo@ejemplo.com" required pattern= "[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" title="Introduzca este formato correo@ejemplo.com"/>
       </li>
       <li style="border-bottom:1px solid red; margin-left: 3%;">
           <label for="web">Sitio Web:</label>
           <input type="url" name="web" placeholder="http://www.tupagina.com" required pattern="https?://.+([a-zA-Z0-9]([a-zA-Z0-9\-]{0,61}[a-zA-Z0-9])?\.)+[a-zA-Z]{2,6}$" title="Introduzca este formato http://www.tupagina.com"/>
       </li>
<li style="border-bottom:1px solid red; margin-left: 3%;">
           <label for="ciudad" style="color:black">Ciudad:</label>
           <input type="text" name="ciudad" placeholder="ciudad" pattern="[ A-Za-z ñÑ]{1,50}"  title="Introduzca ciudad" required />
       </li>
       <li style="border-bottom:1px solid red; margin-left: 3%;">
       <label for="provincia" style="color:blcak">Provincia:</label>
             <?php
require_once('../conexion.php');

$conexion=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME) or
    die("Problemas con la conexión.");
mysqli_set_charset($conexion,"utf8");
$consulta_mysql=mysqli_query($conexion,"select *
                        from provincias") or
  die("Problemas en el select:".mysqli_error($conexion));

?>         

<select name="provincia"/>
<?php

  while($reg=mysqli_fetch_array($consulta_mysql)){
  echo "<option value='".$reg["Codigo_provincia"]."'>".$reg["Nombre_provincia"]."</option>";
  
  }
?>
            </select>
       </li>
<li style="border-bottom:1px solid red; margin-left: 3%; " >
           <label for="codigoPostal" style="color:black">Codigo Postal:</label>
           <input type="text" name="codigoPostal" placeholder="00000" pattern="((0[1-9]|5[0-2])|[1-4][0-9])[0-9]{3}"  title="Introduzca codigo Postal" required />
       </li>
<li style="border-bottom:1px solid red; margin-left: 3%;" >
           <label for="pais" style="color:black">Pais:</label>
           <input type="text" name="pais" placeholder="PAIS" pattern="[ A-Za-z ñÑ]{1,50}"  title="Introduzca solo caracteres A-Z y a-z" required />
       </li>
<li style="border-bottom:1px solid red; margin-left: 3%;" >
           <label for="telefono" style="color:black">Telefono:</label>
           <input type="text" name="telefono" placeholder="000000000" pattern="[0-9]{9}"  title="Introduzca telefono" required />
       </li>
<li style="border-bottom:1px solid red; margin-left: 3%;" >
           <label for="fechaAlta"style="color:wblack" >Fecha Alta:</label>
           <input type="date" name="fechaAlta"   placeholder="aaaa/mm/dd" required pattern= "[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" title="Introduzca este formato aaaa/mm/dd"/>
       </li>
<li style="border-bottom:1px solid red; margin-left: 3%;" >                                                     




           <label for="fax" style="color:blcak">FAX:</label>
           <input type="text" name="fax" placeholder="000000000" pattern="[0-9]{9}"  title="Introduzca Fax" required />
       </li>
<li style="border-bottom:1px solid red; margin-left: 3%;" >
           <label for="tipoIva" style="color:black">Tipo IVA:</label>
           <select type="text" name="tipoIva"/>
           <option value="1">IVA SUPERREDUCIDO (4%)</option>
            <option value="2">IVA REDUCIDO (10%)</option>
            <option value="3">IVA GENERAL (21%)</option>
            </select>
       </li>




          <div class="botonera"><button class="submit" type="submit">ENVIAR</button></div>
         <div class="botonera"><button class="submit" type="reset">LIMPIAR</button></div>
        </li>
    </ul>
</form>
</body>
</html>