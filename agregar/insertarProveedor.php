<html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width" charset="UTF-8" />
<link rel="stylesheet" href="rwd-1.css" />
<title>Problema</title>
</head>
<style>
 @font-face {
    font-family: optimus;
    src: url(../fuente/Optimus.otf);
} 
 body{
background-image: url("../trans.jpg");
COLOR:RED;

} 
.envio h2 {
    background: none repeat scroll 0 0 #000099;
    border-radius: 0px;
    color: white;
    display: block;
    font-family: optimius;
    font-size: 25px;
    padding: 2px;
    text-shadow: 0px 0px 0px #CCCCCC;
    width: 95%;
    margin-left:2.5%;
    text-align: center;
   border-bottom:5px solid red;
}
h3{
    text-align:center;
    font-family: optimus;
    color:black;
}

.envio ul {
    width:40%;
   
    margin-left:30%;
    list-style-type:none;
	
	padding:0px;
    background-color: darkgrey;
}
.envio li{
	padding:12px; 	
	position:relative;
        color:black;
        font-family: optimus;
}
.envio label {
    color: black;
    display: inline-block;
    float: left;
    font-family: optimus;
    font-size: 0.9em;
    font-weight: bold;
    margin-top: 3px;
    
    padding: 3px;
    width: 30%;
}

button {
    width: 40%;
    height: 30px;  
   padding: 7px 7px;
   font-family: optimus;
   font-weight: bold;
   text-align: center;
   line-height: 1;
   color: #000099;
   border: none;
   text-shadow: 0 1px 1px rgba(255, 255, 255, 0.85);
   background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#fff), to(#bbb));
   background-image: -moz-linear-gradient(0% 100% 90deg, #BBBBBB, #FFFFFF);
   background-color: #fff;
   border: 1px solid #f1f1f1;
   border-radius: 15px 20px 5px 10px;
   box-shadow: 0 1px 2px rgba(0, 0, 0, 0.5);
   -moz-transition: width 2s, heigth 2s, transform 1s, font-size 1s, opacity 1s; 
	-webkit-transition: width, 2s heigth 2s, transform 1s, font-size 1s, opacity 1s; 
	-o-transition: width 2s, heigth 2s, transform 1s, font-size 1s, opacity 1s;
	transition:width 2s, heigth 2s, transform 1s, font-size 1s, opacity 1s;
    text-decoration: none;
    margin-left:30%;
    margin-bottom:20px;
}

button:hover {
	opacity:.80;
	cursor: pointer; 
	color: red;
  -ms-transform: scale(1.2,1.2); /* IE 9 */
    -webkit-transform: scale(1.2,1.2); /* Safari */
    transform: scale(1.2,1.2); /* Standard syntax */
   
    
}
button:active {
	border: 1px solid #222;
	box-shadow: 0 0 10px 5px #444 inset; 
}
.error {color: #FF0000;
font-family: optimus;}
select{
     width: 65%;
     font-family:optimus;
}
@media screen and (max-width: 375px) {
     body{
background-image: url("");
background:darkgrey;
}  
.envio ul {
    width:100%;
    height: 700px;
    margin-left:0%;
    
}
.envio {

    margin-left:0%;
    
}
.envio label {
    padding: 0px;
  width: 100%;
}
.contact_form h2 {
    font-size: 1.7em;
    padding: 15px 0px;  
    width: 100%;
    margin: 0%;
}
.contact_form input, .contact_form textarea { 
	font-size: 12px;
	padding-right:25%;
    width: 65%;  
}
.contact_form input:Hover, .contact_form textarea:Hover {
	padding-right:38%;
}

button.submit {
     width: 50%;
    height: 40px;  
    margin-left: 25%;
    margin-top: 15px;
}
select{
     width: 93%;
     font-family:optimus;
}

}



</style>

	

<body>
<?php
$idProveedor=$nombreProveedor=$nombreContacto=$cargoContacto=$numeroEmpleados=$direccion=$mail=$web=$ciudad=$provincia=$codigoPostal=$pais=$telefono=$fechaAlta=$fax=$tipoIva="";
$idProveedorErr=$nombreProveedorErr=$nombreContactoErr=$cargoContactoErr=$numeroEmpleadosErr=$direccionErr=$mailErr=$webErr=$ciudadErr=$provinciaErr=$codigoPostalErr=$paisErr=$telefonoErr=$fechaAltaErr=$faxErr=$tipoIvaErr="";
$fecha2 = $fechaErr=$fechaErr2=$f=$fecha_sql=$year=$month=$day= "";

/*function validar_dni($nif){
	$letra = substr($nif, -1);
	$numeros = substr($nif, 0, -1);
	if ( substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros%23, 1) == $letra && strlen($letra) == 1 && strlen ($numeros) == 8 ){
		//echo 'valido';
        
	}else{
		echo 'nif no valido';
        
	}
}*/

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 

  if (empty($_POST["idProveedor"])) {
    $idProveedorErr = "Id obligatorio";
  } else {
    $idProveedor = test_input($_POST["idProveedor"]);   
    if (!preg_match("/^[0-9]*$/",$idProveedor)) {
      $idProveedorErr = "Solo letras y espacio en blanco";
    }
  }

 if (empty($_POST["nombreProveedor"])) {
    $nombreProveedorErr = "Nombre Proveedor obligatorio";
  } else {
    $nombreProveedor = test_input($_POST["nombreProveedor"]);   
    if (!preg_match("/^[a-zñA-ZÑ -]*$/",$nombreProveedor)) {
      $nombreProveedorErr = "Solo letras y espacio en blanco";
    }
  }
if (empty($_POST["nombreContacto"])) {
    $nombreContactoErr = "Nombre contacto obligatorio";
  } else {
    $nombreContacto = test_input($_POST["nombreContacto"]);   
    if (!preg_match("/^[a-zñA-ZÑ -]*$/",$nombreContacto)) {
      $nombreContactoErr = "Solo letras y espacio en blanco";
    }
  }
if (empty($_POST["cargoContacto"])) {
    $cargoContactoErr = "cargo Contacto obligatorio";
  } else {
    $cargoContacto = test_input($_POST["cargoContacto"]);   
    if (!preg_match("/^[a-zñA-ZÑ -]*$/",$cargoContacto)) {
      $cargoContactoErr = "Solo letras y espacio en blanco";
    }
  }


  if (empty($_POST["direccion"])) {
    $direccionErr = "Direccion obligatoria";
  } else {
    $direccion = test_input($_POST["direccion"]);   
    if (!preg_match("/^[a-zñA-ZÑ0-9 -.,\/]*$/",$direccion)) {
      $direccionErr = "Solo letras y espacio en blanco";
    }
  }
  if (empty($_POST["mail"])) {
    $mailErr = "Email obligatorio";
  } else {
    $mail = test_input($_POST["mail"]);
    // check if e-mail address is well-formed
    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
      $mailErr = "Formato invalido de email";
    }
  }
    
  if (empty($_POST["web"])) {
    $web = "";
  } else {
    $web= test_input($_POST["web"]);
    
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$web)) {
      $webErr = "URL Invalida";
    }
  }

if (empty($_POST["codigoPostal"])) {
    $codigoPostalErr = "Codigo postal obligatorio";
  } else {
    $codigoPostal = test_input($_POST["codigoPostal"]);   
    if (!preg_match("/^[0-9]{5,5}$/",$codigoPostal)) {
      $codigoPostalErr = "Solo 5 numeros";
    }
  }

     if (empty($_POST["telefono"])) {
    $telefonoErr = "Telefono obligatorio";
  } else {
    $telefono= test_input($_POST["telefono"]);   
    if (!preg_match("/^[0-9]{9,9}$/",$telefono)) {
      $telefonoErr = "Solo 9 numeros";
    }
  } 

/*
if (empty($_POST["fechaAlta"])) {
    $fechaAltaErr = "Fecha obligatoria";
     echo "<h3> Fecha incorrecta. </h3>";
  } else {
    $fechaAlta=$_POST['fechaAlta'];
    $regexFecha = '/^([0-2][0-9]|3[0-1])(\/|-)(0[1-9]|1[0-2])\2(\d{4})$/';
    

        if ( !preg_match($regexFecha, $fechaAlta, $matchFecha)) {
             $fechaAltaErr="Fecha incorrecta";  
                
            }
            else{

                $f=explode('/',$fechaAlta);
                $fecha_sql=$f[2]."-".$f[0]."-".$f[1];
                

                    if(!checkdate($f[1],$f[0],$f[2])){
                            $fechaAltaErr="Fecha incorrecta";  
                            echo "<h3> Fecha incorrecta. </h3>";
                        }else{
                            $fechaAltaErr="";  
                            
                             }
                 }
                
        }*/
 $fechaAlta=$_POST['fechaAlta'];
if (empty($_POST["fechaAlta"])) {
    $fechaAltaErr = "Fecha obligatoria";
     echo "<h3> Fecha es obligatoria. </h3>";
  } else {

function validateDate($date){
$d = DateTime::createFromFormat('Y-m-d', $date);
return $d && $d->format('Y-m-d')==$date;
}
if(validateDate($fechaAlta)){
    $fechaAltaErr="";
}else{
    $fechaAltaErr="la fecha es incorrecta";
}

  }
  
 




}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$iva="";


if($idProveedorErr=="" & $nombreProveedorErr=="" & $nombreContactoErr=="" & $cargoContactoErr=="" & $numeroEmpleadosErr=="" & $direccionErr=="" & $mailErr=="" & $webErr=="" & $ciudadErr=="" & $provinciaErr=="" & $codigoPostalErr=="" & $paisErr=="" & $telefonoErr=="" & $fechaAltaErr==""  & $faxErr=="" & $tipoIvaErr==""){
require_once('../conexion.php');

$conexion=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME) or
    die("Problemas con la conexión.");
mysqli_set_charset($conexion,"utf8");
mysqli_query($conexion,"insert into proveedores(IdProveedor,nombreProveedor,nombreContacto,cargoContacto,numeroEmpleados,direccion,email,url,ciudad,provincia,codPostal,pais,telefono,fechaAlta,fax,tipoIva) values 
                       ('$_POST[idProveedor]','$_POST[nombreProveedor]','$_POST[nombreContacto]','$_POST[cargoContacto]','$_POST[numeroEmpleados]','$_POST[direccion]','$_POST[mail]','$_POST[web]','$_POST[ciudad]','$_POST[provincia]','$_POST[codigoPostal]','$_POST[pais]','$_POST[telefono]','$_POST[fechaAlta]','$_POST[fax]','$_POST[tipoIva]')")
  or die("Problemas en el select ".mysqli_error($conexion));

$consulta_mysql2=mysqli_query($conexion,"select *
                        from provincias") or
  die("Problemas en el select:".mysqli_error($conexion));

 while($reg2=mysqli_fetch_array($consulta_mysql2)){
        if($_POST['provincia']==$reg2["Codigo_provincia"]){
    
     $provincia=$reg2;   
    break;
        }  
}
mysqli_set_charset($conexion,"utf8");
$consulta_mysql3=mysqli_query($conexion,"select tipoIva
                        from proveedores") or
  die("Problemas en el select:".mysqli_error($conexion));

 while($reg3=mysqli_fetch_array($consulta_mysql3)){
        if($_POST['tipoIva']==$reg3["tipoIva"]){
    switch ($reg3['tipoIva']) {
    case 1:
    $iva="SUPER REDUCIDO (4%)"; 
           break;
    case 2:
     $iva="REDUCIDO(10%)";
           break;
    case 3:
     $iva="GENERAL(21%)";
           break;
  }

    break;
        }  
}




mysqli_close($conexion);
}
?>
<div class="envio">    

<ul>
<li><h2 class="envio">ALTA PROVEEDOR</h2> </li>
<li style="border-bottom:1px solid red"><label for="idProveedor" >ID Proveedor:</label><?php echo $idProveedor = $_POST['idProveedor'];?><br> <span class="error"><?php echo $idProveedorErr;?></span></li>
<li style="border-bottom:1px solid red"><label for="nombreProveedor" >Nombre Proveedor:</label><?php echo $nombreProveedor = $_POST['nombreProveedor'];?> <br><span class="error"><?php echo $nombreProveedorErr;?></span></li>
<li style="border-bottom:1px solid red"><label for="nombreContacto" >NombreContacto:</label><?php echo $nombreContacto = $_POST['nombreContacto'];?><br><span class="error"><?php echo $nombreContactoErr;?></span></li>
<li style="border-bottom:1px solid red"><label for="cargoContacto" >Cargo Contacto:</label><?php echo $cargoContacto = $_POST['cargoContacto'];?><br><span class="error"><?php echo $cargoContactoErr;?></span></li>
<li style="border-bottom:1px solid red"><label for="numeroEmpleados" >Numero Empleados:</label><?php echo $numeroEmpleados = $_POST['numeroEmpleados'];?><br><span class="error"><?php echo $numeroEmpleadosErr;?></span></li>
<li style="border-bottom:1px solid red"><label for="direccion" >Direccion:</label><?php echo $direccion = $_POST['direccion'];?><br><span class="error"><?php echo $direccionErr;?></span></li>
<li style="border-bottom:1px solid red"><label for="mail" >Email:</label><?php echo $mail = $_POST['mail'];?><br><span class="error"><?php echo $mailErr;?></span></li>
<li style="border-bottom:1px solid red"><label for="web" >Web:</label><?php echo $web = $_POST['web'];?><br><span class="error"><?php echo $webErr;?></span></li>
<li style="border-bottom:1px solid red"><label for="ciudad" >Ciudad:</label><?php echo $ciudad= $_POST['ciudad'];?><br><span class="error"><?php echo $ciudadErr;?></span></li>
<li style="border-bottom:1px solid red"><label for="provincia" >Provincia:</label><?php echo $provincia= $_POST['provincia'];?><br><span class="error"><?php echo $provinciaErr;?></span></li>
<li style="border-bottom:1px solid red"><label for="codigoPostal" >Codigo Postal:</label><?php echo $codigoPostal= $_POST['codigoPostal'];?><br><span class="error"><?php echo $codigoPostalErr;?></span></li>
<li style="border-bottom:1px solid red"><label for="pais" >Pais:</label><?php echo $pais= $_POST['pais'];?><br><span class="error"><?php echo $paisErr;?></span></li>
<li style="border-bottom:1px solid red"><label for="telefono" >Telefono</label><?php echo $telefono= $_POST['telefono'];?><br><span class="error"><?php echo $telefonoErr;?></span></li>
<li style="border-bottom:1px solid red"><label for="fechaAlta" >FechaAlta:</label><?php echo $fechaAlta= $_POST['fechaAlta'];?><br><span class="error"><?php echo $fechaAltaErr;?></span></li>
<li style="border-bottom:1px solid red"><label for="fax" >Fax:</label><?php echo $fax= $_POST['fax'];?><br><span class="error"><?php echo $faxErr;?></span></li>
<li style="border-bottom:1px solid red"><label for="tipoIva" >Tipo iva</label><?php echo $iva;?><br><span class="error"><?php echo $tipoIvaErr;?></span></li>


<br>

<?php 

if($idProveedorErr=="" & $nombreProveedorErr=="" & $nombreContactoErr=="" & $cargoContactoErr=="" & $numeroEmpleadosErr=="" & $direccionErr=="" & $mailErr=="" & $webErr=="" & $ciudadErr=="" & $provinciaErr=="" & $codigoPostalErr=="" & $paisErr=="" & $telefonoErr=="" & $fechaAltaErr=="" & $faxErr=="" & $tipoIvaErr==""){
echo "<h3> El Proveedor fue dado de alta correctamente. </h3>";
}else{
echo "<h3 style=color:red> El Proveedor NO se agrego. </h3>";
}
?>
<br>

<a href="../menu.html"><button class="volver">VOLVER</button></a>

</ul>

</div>



</body>
</html>