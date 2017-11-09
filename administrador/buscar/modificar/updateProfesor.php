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
COLOR:RED;

}
.envio h2 {
    background: none repeat scroll 0 0 darkslategrey;
    border-radius: 0px;
    color: white;
    display: block;
    font-family: BankGothic Md BT;
    font-size: 25px;
    padding: 2px;
    text-shadow: 0px 0px 0px #CCCCCC;
    width: 95%;
    margin-left:2.5%;
    text-align: center;
   
}
h3{
    text-align:center;
    font-family: BankGothic Md BT;
    color:black;
}

.envio ul {
    width:40%;
    /*height: 650px; */
    margin-left:30%;
    list-style-type:none;
	
	padding:0px;
    background-color: darkgrey;
}
.envio li{
	padding:12px; 	
	position:relative;
        color:black;
        font-family: BankGothic Md BT;
}
.envio label {
    color: darkslategrey;
    display: inline-block;
    float: left;
    font-family: BankGothic Md BT;
    font-size: 15px;
    font-weight: bold;
    margin-top: -3px;
    
    padding: 3px;
    width: 100px;
}

button {
    width: 40%;
    height: 30px;  
   padding: 7px 7px;
   font-family: BankGothic Md BT;
   font-weight: bold;
   text-align: center;
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
	color: darkred;
  -ms-transform: scale(1.2,1.2); /* IE 9 */
    -webkit-transform: scale(1.2,1.2); /* Safari */
    transform: scale(1.2,1.2); /* Standard syntax */
   
    
}
button:active {
	border: 1px solid #222;
	box-shadow: 0 0 10px 5px #444 inset; 
}
.error {color: #FF0000;
font-family: BankGothic Md BT;}

</style>
<body>
<?php




$nifErr =$nombreErr =$apellido1Err= $apellido2Err=$direccionErr=$provinciaErr = $mailErr  = $webErr = "";
$nifnuevo = $nombrenuevo = $apellido1nuevo = $apellido2nuevo = $direccionnuevo = $provincianueva=$mailnuevo = $webnuevo = "";

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
  if (empty($_POST["nifnuevo"])) {
    $nifErr = "Nif obligatorio";
  } else {
    $nifnuevo = test_input($_POST["nifnuevo"]);   
    /*if (!preg_match("/^[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][A-Ha-hJ-Nj-nP-Tp-tV-Zv-z]*$/",$nif)) {
      $nifErr = "Solo numeros y una letra";
    }*/

	$num=substr($nifnuevo,0,8);
$d=$num%23;
$letra=strtoupper(substr($nifnuevo,8,9));
$leta=array ("T","R","W","A","G","M","Y","F","P","D","X","B","N","J","Z","S","Q","V","H","L","C","K","E");
if ($leta[$d]==$letra) {
    
    
	}else{
		
        $nifErr = "Nif incorrecto";
	}




  }


  if (empty($_POST["nombrenuevo"])) {
    $nombreErr = "Nombre obligatorio";
  } else {
    $nombrenuevo = test_input($_POST["nombrenuevo"]);   
    if (!preg_match("/^[a-zA-Z -]*$/",$nombrenuevo)) {
      $nombreErr = "Solo letras y espacio en blanco";
    }
  }
 
  if (empty($_POST["apellido1nuevo"])) {
    $apellido1Err = "Apellido 1 obligatorio";
  } else {
    $apellido1nuevo = test_input($_POST["apellido1nuevo"]);   
    if (!preg_match("/^[a-zA-Z -]*$/",$apellido1nuevo)) {
      $apellido1Err = "Solo letras y espacio en blanco";
    }
  }
 
  if (empty($_POST["apellido2nuevo"])) {
    $apellido2Err = "Apellido 2 obligatorio";
  } else {
    $apellido2nuevo = test_input($_POST["apellido2nuevo"]);   
    if (!preg_match("/^[a-zA-Z -]*$/",$apellido2nuevo)) {
      $apellido2Err = "Solo letras y espacio en blanco";
    }
  }

  if (empty($_POST["direccionnuevo"])) {
    $direccionErr = "Direccion obligatoria";
  } else {
    $direccionnuevo = test_input($_POST["direccionnuevo"]);   
    if (!preg_match("/^[a-zA-Z0-9 -.,\/]*$/",$direccionnuevo)) {
      $direccionErr = "Solo letras y espacio en blanco";
    }
  }
  if (empty($_POST["mailnuevo"])) {
    $mailErr = "Email obligatorio";
  } else {
    $mailnuevo = test_input($_POST["mailnuevo"]);
    // check if e-mail address is well-formed
    if (!filter_var($mailnuevo, FILTER_VALIDATE_EMAIL)) {
      $mailErr = "Formato invalido de email";
    }
  }
    
  if (empty($_POST["webnuevo"])) {
    $webnuevo = "";
  } else {
    $webnuevo= test_input($_POST["webnuevo"]);
    
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$webnuevo)) {
      $webErr = "URL Invalida";
    }
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if($nifErr == "" && $nombreErr =="" && $apellido1Err=="" && $apellido2Err=="" && $direccionErr=="" && $provinciaErr == "" && $mailErr  == "" && $webErr == ""){
$conexion=mysqli_connect("mysql.hostinger.es","u400103939_angel","16del6del81","u400103939_insti") or
    die("Problemas con la conexión");

mysqli_query($conexion, "update profesores
                          set nif='$_POST[nifnuevo]', nombre='$_POST[nombrenuevo]', apellido1='$_POST[apellido1nuevo]', apellido2='$_POST[apellido2nuevo]',direccion='$_POST[direccionnuevo]', provincia='$_POST[provincianueva]', mail='$_POST[mailnuevo]', web='$_POST[webnuevo]'
                        where mail='$_POST[mailviejo]'") or
  die("Problemas en el select:".mysqli_error($conexion));
}

$conexion=mysqli_connect("mysql.hostinger.es","u400103939_angel","16del6del81","u400103939_insti") or
    die("Problemas con la conexión");
mysqli_set_charset($conexion,"utf8");
$consulta_mysql2=mysqli_query($conexion,"select *
                        from provincias") or
  die("Problemas en el select:".mysqli_error($conexion));

 while($reg2=mysqli_fetch_array($consulta_mysql2)){
        if($_POST['provincianueva']==$reg2["Codigo_provincia"]){
    
     $provincia=$reg2;   
    break;
        }  
}

?>
<div class="envio">    

<ul>
<li><h2>MODIFICAR PROFESOR</h2> </li>
<li style="border-bottom:1px solid darkred"><label for="nif" >Nif:</label><?php echo $_POST['nifnuevo'];?><br> <span class="error"><?php echo $nifErr;?></span></li>
<li style="border-bottom:1px solid darkred"><label for="nombre" >Nombre:</label><?php echo $_POST['nombrenuevo'];?> <br><span class="error"><?php echo $nombreErr;?></span></li>
<li style="border-bottom:1px solid darkred"><label for="apellido1" >Apellido 1:</label><?php echo $_POST['apellido1nuevo'];?><br><span class="error"> <?php echo $apellido1Err;?></span></li>
<li style="border-bottom:1px solid darkred"><label for="apellido2" >Apellido 2:</label><?php echo $_POST['apellido2nuevo'];?><br><span class="error"> <?php echo $apellido2Err;?></span></li>
<li style="border-bottom:1px solid darkred"><label for="direccion" >Direccion:</label><?php echo $_POST['direccionnuevo'];?><br><span class="error"><?php echo $direccionErr;?></span></li>
<li style="border-bottom:1px solid darkred"><label for="provincia" >Provincia:</label><?php echo $provincia["Nombre_provincia"];?><br><span class="error"><?php echo $provinciaErr;?></span></li>
<li style="border-bottom:1px solid darkred"><label for="mail" >Email:</label><?php echo $_POST['mailnuevo'];?><br><span class="error"><?php echo $mailErr;?></span></li>
<li style="border-bottom:1px solid darkred"><label for="web" >Web:</label><?php echo $_POST['webnuevo'];?><br><span class="error"> <?php echo $webErr;?></span></li>
<br>
<?php 

if($nifErr == "" & $nombreErr =="" & $apellido1Err=="" & $apellido2Err=="" & $direccionErr=="" & $provinciaErr == "" & $mailErr  == "" & $webErr == ""){
echo "<h3> El Profesor fue modificado correctamente. </h3>";
}else{
echo "<h3 style=color:red> El Profesor NO fue modificado. </h3>";
}
?>
 


<a href="../../menu.html"><button class="boton">VOLVER</button></a>
<?php
echo "</div>";

?>

</body>
</html>