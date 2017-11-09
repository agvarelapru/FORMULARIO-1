<html lang="es">
<head>
	<meta charset="utf-8">
	<title>HTML5 Contact Form</title>
	
    <!--[if IE]>
        <script src="http://html5shiv.googlecode.com/svn/trunk
/html5.js"></script>
        <![endif]-->
</head>
<style>
body{
background-image: url("dead2.jpg");

}
.contact_form h2 {
    background: none repeat scroll 0 0 darkslategrey;
    border-radius: 20px;
    color: white;
    display: block;
    font-family: BankGothic Md BT;
    font-size: 25px;
    padding: 2px;
    text-shadow: 0px 0px 0px #CCCCCC;
    width: 95%;
    text-align: center;
}

.contact_form {
    width:40%;
    height:650px;
    list-style-type:none;
	margin:0px;
	padding:0px;
    background-color: darkgrey;
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
.contact_form li{
	padding:12px; 
	
	position:relative;
}

.contact_form label {
    color: black;
    display: inline-block;
    float: left;
    font-family: BankGothic Md BT;
    font-size: 15px;
    font-weight: bold;
    margin-top: 3px;
    margin-bottom: 15px;
   
    padding: 3px;
    width: 400px;
}

.contact_form input {
	height:20px; 
	width:50px; 
	padding:5px 8px;
    margin-left:5px;
    margin-bottom:8px;
    margin-top:-10px;
    
}
.contact_form textarea {
	padding:8px; 
	width:500px;
   
    margin-left:2%;
}
/*.contact_form button {
	margin-left:110px;
}*/

.contact_form input, .contact_form textarea { 
	border:1px solid #555; 
	box-shadow: 0px 0px 3px dimgrey, 0 10px 15px darkgrey inset;
	border-radius:25px;
	color: black;
	font-size: 12px;
	padding-right:30px;
	-moz-transition: padding .25s; 
	-webkit-transition: padding .25s; 
	-o-transition: padding .25s;
	transition: padding .25s;
    width: 50%;
    height:30px;
}
.contact_form input:Hover, .contact_form textarea:Hover {
	background: lightsteelblue; 
    border-bottom:3px solid black;
	
	box-shadow: 0 0 3px #aaa; 
	padding-right:80px;

}



.contact_form input:required:valid, .contact_form textarea:required:valid {
	box-shadow: 0 0 5px #5cd053;
	border-color: #28921f;
}
.contact_form input:focus:invalid, .contact_form textarea:focus:invalid {
	box-shadow: 0 0 5px #d45252;
	border-color: #b03535
}

.boton{
     width: 50%;
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
     margin:15px 25%;
 -moz-transition: width 2s, heigth 2s, transform 1s, font-size 1s, opacity 1s; 
	-webkit-transition: width, 2s heigth 2s, transform 1s, font-size 1s, opacity 1s; 
	-o-transition: width 2s, heigth 2s, transform 1s, font-size 1s, opacity 1s;
	transition:width 2s, heigth 2s, transform 1s, font-size 1s, opacity 1s;
text-align:center;
    
}

.boton:hover{
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
.boton2{
     width: 50%;
    height: 13px;  
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
     margin:15px 21%;
 -moz-transition: width 2s, heigth 2s, transform 1s, font-size 1s, opacity 1s; 
	-webkit-transition: width, 2s heigth 2s, transform 1s, font-size 1s, opacity 1s; 
	-o-transition: width 2s, heigth 2s, transform 1s, font-size 1s, opacity 1s;
	transition:width 2s, heigth 2s, transform 1s, font-size 1s, opacity 1s;
text-align:center;
    
}

.boton2:hover{
	opacity:.80;
	cursor: pointer; 
	color: darkred;
    -ms-transform: scale(1.5,1.5); /* IE 9 */
    -webkit-transform: scale(1.5,1.5); /* Safari */
    transform: scale(1.5,1.5); /* Standard syntax */
   
    /*font-size: 1.5em;*/
   
    
}
.boton2:active {
	border: 1px solid #222;
	box-shadow: 0 0 10px 5px #444 inset; 
}
fieldset{
    border:6px solid darkred;
background:darkslategrey;
}
legend{
font-weight:bold;
color:white;
font-family: BankGothic Md BT;
 
}
p{
   color:white;
font-family: BankGothic Md BT; 
}
.botonera{
    width: 50%;
    float:left;
    /*margin-left:33%;*/
}
</style>
<body>

<?php

$conexion=mysqli_connect("mysql.hostinger.es","u400103939_angel","16del6del81","u400103939_insti") or
    die("Problemas con la conexión");

$registros=mysqli_query($conexion,"select * from profesores
                        where mail = '$_REQUEST[mail]'") or
  die("Problemas en el select:".mysqli_error($conexion));
if ($reg=mysqli_fetch_array($registros))
{
?>

<form  class="contact_form" action="updateProfesor.php" method="post">
 <fieldset>    
 <legend>Modificar:</legend>
<label for="nif" style="color:white">Ingrese nuevo NIF:</label>
<input type="text" name="nifnuevo" placeholder="NUEVO NIF" required pattern="[0-9]{8}[A-Ha-hJ-Nj-nP-Tp-tV-Zv-z]{1}"  title="Introduzca NIF 00000000A" value="<?php echo $reg['nif'] ?>"/>
<label for="nombre" style="color:white">Ingrese nuevo Nombre:</label>
<input type="text" name="nombrenuevo" placeholder="NUEVO NOMBRE" required pattern="[ A-Za-z]{1,20}"  title="Introduzca solo caracteres A-Z y a-z"  value="<?php echo $reg['nombre'] ?>"/>
<label for="apellido1" style="color:white">Ingrese Nuevo Apellido 1:</label>
<input type="text" name="apellido1nuevo" placeholder="APELLIDO 1" required pattern="[- A-Za-z]{1,20}"  title="Introduzca solo caracteres A-Z y a-z" value="<?php echo $reg['apellido1'] ?>"/>
<label for="apellido2" style="color:white">Ingrese Nuevo Apellido 2:</label>
<input type="text" name="apellido2nuevo" placeholder="APELLIDO 2" required pattern="[- A-Za-z]{1,20}"  title="Introduzca solo caracteres A-Z y a-z" value="<?php echo $reg['apellido2'] ?>"/>
<label for="direccion" style="color:white">Ingrese nueva Direccion:</label>
<input type="text" name="direccionnuevo" placeholder="DIRECCION" required pattern="[/.,- A-Za-z0-9]{1,20}"  title="Introduzca solo caracteres A-Z, a-z y 0-9" value="<?php echo $reg['direccion'] ?>"/>

<label for="provincia" style="color:white">Ingrese nueva Provincia:</label></br>
        
             <?php

mysqli_set_charset($conexion,"utf8");
$consulta_mysql2=mysqli_query($conexion,"select *
                        from provincias") or
  die("Problemas en el select:".mysqli_error($conexion));

?>         

<select name="provincianueva" style="margin-left:1%" />   
<?php


while($reg2=mysqli_fetch_array($consulta_mysql2)){
        if($reg["provincia"]==$reg2["Codigo_provincia"]){
    
     $provincia=$reg2;
      echo "<option value='".$provincia["Codigo_provincia"]."'>".$provincia["Nombre_provincia"]."</option>";
     

    break;
        }  
}
mysqli_set_charset($conexion,"utf8");
$consulta_mysql2=mysqli_query($conexion,"select *
                        from provincias") or
  die("Problemas en el select:".mysqli_error($conexion));

  while($reg2=mysqli_fetch_array($consulta_mysql2)){
     
  echo "<option value='".$reg2["Codigo_provincia"]."'>".$reg2["Nombre_provincia"]."</option>";
  
  }
?>
            </select>





</fieldset>  

<label for="email"  style="border-bottom:1px solid darkred; margin-left: 2%;">Ingrese nuevo mail:</label>
<input type="email" name="mailnuevo" style="margin-left:5px;" placeholder="correo@ejemplo.com" required pattern= "[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" title="Introduzca este formato correo@ejemplo.com" value="<?php echo $reg['mail'] ?>"/>
       

<label for="web" style="border-bottom:1px solid darkred; margin-left: 2%;" >Ingrese nuevo Sitio Web:</label>
<input type="url" name="webnuevo" style="margin-left:2%" placeholder="http://www.tupagina.com" required  pattern="https?://.+([a-zA-Z0-9]([a-zA-Z0-9\-]{0,61}[a-zA-Z0-9])?\.)+[a-zA-Z]{2,6}$" title="Introduzca este formato http://www.tupagina.com" value="<?php echo $reg['web'] ?>"/>
       
<br>
<input type="hidden" name="nifviejo" value="<?php echo $reg['nif'] ?>">
<input type="hidden" name="nombreviejo" value="<?php echo $reg['nombre'] ?>">
<input type="hidden" name="apellido1viejo" value="<?php echo $reg['apellido1'] ?>">
<input type="hidden" name="apellido2viejo" value="<?php echo $reg['apellido2'] ?>">
<input type="hidden" name="direccionviejo" value="<?php echo $reg['direccion'] ?>">
<input type="hidden" name="provinciaviejo" value="<?php echo $reg['provincia'] ?>">
<input type="hidden" name="mailviejo" value="<?php echo $reg['mail'] ?>">
<input type="hidden" name="webviejo" value="<?php echo $reg['web'] ?>">

<div class="botonera"><button class="boton" type="submit"> Modificar</button></div>
<div class="botonera"><a href="../../menu.html" style="text-decoration:none"><div class="boton2">volver</div></a></div>
</form>

<?php
}
else{
echo "<div class=error>"; 
echo "<fieldset>";   
echo"<legend>Error:</legend>";
echo "<p> No existe Profesor con dicho mail</p>";
  echo "</fieldset>";
 
?>
<a href="../BUSCARMAILPROFESOR.HTML"><button class="boton">VOLVER</button></a>
<?php
echo "</div>";}
?>
</body>
</html>