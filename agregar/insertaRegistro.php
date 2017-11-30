<?php


// Start the session
session_start();

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">

	<title>Alta nueva</title>
	<link href="../biblioteca/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<script src="../biblioteca/jquery/jquery.min.js"></script>
      <script src="../biblioteca/js/bootstrap.min.js"></script>
<link href="../biblioteca/estilos.css" rel="stylesheet" media="screen">



</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">

         <div class="navbar-header">

              <a class="navbar-brand" href="../salir.php">La Pagina de Angel</a>
            </div>


        </nav>





	<?php
$nick=$nombre=$pass=$pass2=$apellido1=$apellido2=$email=$fecha_nacimiento="";
$nickErr=$nombreErr=$passErr=$passErr2=$apellido1Err=$apellido2Err=$emailErr=$fecha_nacimientoErr="";

$contra=md5($_REQUEST["pass"]);
$nick=$_REQUEST['nick'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

 if (empty($_POST["nick"])) {
    $nickErr = "Nick obligatorio";
  } else {
    $nick = test_input($_POST["nick"]);
    if (!preg_match("/^[a-zñA-ZÑ0-9-._]*$/",$nick)) {
      $nickErr = "Solo letras numeros y .-_";
    }
  }
if (empty($_POST["nombre"])) {
    $nombreErr = "Nombre obligatorio";
  } else {
    $nombre = test_input($_POST["nombre"]);
    if (!preg_match("/^[a-zñA-ZÑ -]*$/",$nombre)) {
      $nombreErr = "Solo letras y espacio en blanco";
    }
  }
	if (empty($_POST["pass"]) || empty($_POST["pass2"])) {
     $passErr = "Contraseña obligatoria";
		 $passErr2 = "Contraseña obligatoria";
   } else if($_POST["pass"]!=$_POST["pass2"]){
		 $passErr = "Las contraseña deben de ser iguales";
		 $passErr2 = "Las contraseña deben de ser iguales";
	 }else {
     $pass = test_input($_POST["pass"]);
     if (!preg_match("/^[a-zñA-ZÑ0-9-._]*$/",$pass)) {
       $passErr = "Solo letras numeros y .-_";
     }
   }
	 if (empty($_POST["apellido1"])) {
	     $apellido1Err = "Apellido 1 obligatorio";
	   } else {
	     $apellido1 = test_input($_POST["apellido1"]);
	     if (!preg_match("/^[a-zñA-ZÑ -]*$/",$apellido1)) {
	       $apellido1Err = "Solo letras y espacio en blanco";
	     }
	   }
		 if (empty($_POST["apellido2"])) {
		     $apellido2Err = "Apellido 2 obligatorio";
		   } else {
		     $apellido2 = test_input($_POST["apellido2"]);
		     if (!preg_match("/^[a-zñA-ZÑ -]*$/",$apellido2)) {
		       $apellido1Err = "Solo letras y espacio en blanco";
		     }
		   }

			 if (empty($_POST["email"])) {
			 	$emailErr = "Email obligatorio";
			 } else {
			 	$email = test_input($_POST["email"]);
			 	// check if e-mail address is well-formed
			 	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			 		$emailErr = "Formato invalido de email";
			 	}
			 }

			 $fecha_nacimiento=$_POST['fecha_nacimiento'];
			if (empty($_POST["fecha_nacimiento"])) {
			    $fecha_nacimientoErr = "Fecha obligatoria";
			     echo "<h3> Fecha es obligatoria. </h3>";
			  } else {

			function validateDate($date){
			$d = DateTime::createFromFormat('Y-m-d', $date);
			return $d && $d->format('Y-m-d')==$date;
			}
			if(validateDate($fecha_nacimiento)){
			    $fecha_nacimientoErr="";
			}else{
			    $fecha_nacimientoErr="la fecha es incorrecta";
			}

			  }



/*
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

*/




}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}






$_SESSION["nick"] = $_REQUEST['nick'];
$_SESSION["pass"] = $_REQUEST['pass'];
$_SESSION["pass2"] = $_REQUEST['pass2'];
$_SESSION["nombre"] = $_REQUEST['nombre'];
$_SESSION["apellido1"] = $_REQUEST['apellido1'];
$_SESSION["apellido2"] = $_REQUEST['apellido2'];
$_SESSION["email"] = $_REQUEST['email'];
$_SESSION["fecha_nacimiento"] = $_REQUEST['fecha_nacimiento'];

$_SESSION["nickErr"] = $nickErr;
$_SESSION["passErr"] =$passErr;
$_SESSION["pass2Err"] = $passErr2;
$_SESSION["nombreErr"] = $nombreErr;
$_SESSION["apellido1Err"] = $apellido1Err;
$_SESSION["apellido2Err"] = $apellido2Err;
$_SESSION["emailErr"] = $emailErr;
$_SESSION["fecha_nacimientoErr"] = $fecha_nacimientoErr=="";



if($nickErr=="" & $passErr=="" & $nombreErr=="" & $apellido1Err=="" & $apellido2Err=="" & $emailErr=="" & $fecha_nacimientoErr==""){
	require_once('../biblioteca/conexion.php');
	$conexion=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME) or die("Problemas con la conexión");



	mysqli_query($conexion,"insert into usuarios(Usuario_nick,Usuario_clave,Usuario_nombre,Usuario_apellido1,Usuario_apellido2,Usuario_email,Usuario_fecha_nacimiento,Usuario_bloqueado,Usuario_numero_intentos) values
                       ('$_REQUEST[nick]','$contra','$_REQUEST[nombre]','$_REQUEST[apellido1]','$_REQUEST[apellido2]','$_REQUEST[email]','$_REQUEST[fecha_nacimiento]','1','0')")
  or die("Problemas en el select".mysqli_error($conexion));



	include '../biblioteca/qr-code/phpqrcode/qrlib.php';
	// El nombre del fichero que se generará (una imagen PNG).
	$file ='qr_'.$_REQUEST['nick'].'.png';
	// La data que llevará.
	$data = 'http://www.agvarelapru.esy.es/FORMULARIO-1/logeo.php?usuario='.$nick.'&pass='.$contra;

	// Y generamos la imagen.
	QRcode::png($data, $file);



$para = $_REQUEST["email"];
$titulo = 'Bienvenido a nuestra pagina '.$_REQUEST['nick'];
$mensaje=

'<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Confiramacion de registro</title>

</head>


<body Style="background-color: lightgray; font-family:Calibri;">

        <div Style=" background-color: lightgray;margin-top:20px;padding-top: 10px; padding-bottom: 10px; padding-right: 2.5%; padding-left: 2.5%; width: 90%;  border-radius: 25px;  margin-left:2.5%; margin-right:2.5%;">

                <h2 style="text-align: center;font-weight: BOLD;">Confirmacion de registro</h2>
                <hr Style="border: 2px solid #007BFF;  border-radius: 300px /2px;">
                <h4 Style="text-align:center">Hola gracias por acceder a nuestra paguina pulse el boton que esta a continuacion para confirmar el alta.</h4>

                       <a Style="background-color: #007BFF; border: none;  color: white; text-align: center;  text-decoration: none;  display: inline-block; font-size: 16px; margin-left: 35%; cursor: pointer;  width: 30%;  padding-top: 5px; padding-bottom: 5px;  margin-right: 35%; "  href="http://www.agvarelapru.esy.es/FORMULARIO-1/agregar/desbloqueo.php?nick='.$nick.'&pass='.$contra.'" >Confirmar registro</a>
                        <hr Style="border: 2px solid #007BFF;  border-radius: 300px /2px;">
                        <h4 Style="text-align:center">Una vez confirmada la cuenta puedes acceder con el siguiente codigo QR:</h4>
                      <div Style="  height:320px;  border:2px solid #007BFF;  margin-left: auto; text-align: center;">

                           <div Style=" background-color: rgb(53, 51, 51); height:40px; text-align:left; font-size:1.5em;color:white;padding:3px 10px;"><a Style="background-color: rgb(53, 51, 51); border: none;  color: white; text-align: left;  text-decoration: none;  display: inline-block; font-size: 1em; margin-left: 1%; cursor: pointer;  width: 100%;  padding-top: 4px; padding-bottom: 3px; "  href="http://www.agvarelapru.esy.es/FORMULARIO-1" >La pagina de Angel</a></div><br>
                               <div Style="width:80%;margin-left:10%;"><img src="http://www.agvarelapru.esy.es/FORMULARIO-1/agregar/'.$file.'" alt="Codigo QR"></div>
                               <h4><u>Usuario</u></h4>
                               <h4>'.$nick.'</h4>
                            </div>



    </div>
    <div Style="width:90%; margin-left:5%">
    <hr Style="border: 2px solid #007BFF; border-radius: 0px /0px;">
    <p Style="text-align:justify; color:rgb(94, 91, 91); "> Este correo electrónico contiene información confidencial. Cualquier reproducción, distribución o divulgación de su contenido están estrictamente prohibidos.Si no eres el destinatario indicado en el mismo y recibes este correo electrónico, te ruego me lo notifiques de inmediato a la dirección agvarelapru@gmail.com y destruyas el mensaje recibido sin obtener copia del mismo, ni distribuirlo, ni revelar su contenido. Angel Varela Pruaño no se hace responsable del mal uso de esta información.
      </p>


    <p Style="text-align:justify; color:rgb(94, 91, 91);" >  Information in this message is confidential and may be legally privileged. It is intended solely for the person to whom it is addressed. If you are not the intended recipient, please notify the sender agvarelapru@gmail.com and please delete the message from your system immediately.
      </p>
    </div>

</body>

</html>';


$cabeceras = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
$cabeceras .= 'From: info@lapaginadeangel.com';


mail($para,$titulo,$mensaje,$cabeceras);




mysqli_close($conexion);
}
	?>
<div class="container">
<div class="form-group">



<ul>
<h2 class="envio">ALTA USUARIO</h2>
<hr />
<li style="border-bottom:1px solid #007BFF"><label for="nick" >Nick:</label><?php echo $nick = $_POST['nick'];?><br> <span class="error"><?php echo $nickErr;?></span></li>
<li style="border-bottom:1px solid #007BFF"><label for="pass" >Contraseña:</label><?php echo $pass = $contra;?> <br><span class="error"><?php echo $passErr;?></span></li>
<li style="border-bottom:1px solid #007BFF"><label for="nombre" >Nombre:</label><?php echo $nombre = $_POST['nombre'];?><br><span class="error"><?php echo $nombreErr;?></span></li>
<li style="border-bottom:1px solid #007BFF"><label for="apellido1" >Apellido 1:</label><?php echo $apellido1 = $_POST['apellido1'];?><br><span class="error"><?php echo $apellido1Err;?></span></li>
<li style="border-bottom:1px solid #007BFF"><label for="apellido2" >Apellido 2:</label><?php echo $apellido2 = $_POST['apellido2'];?><br><span class="error"><?php echo $apellido2Err;?></span></li>
<li style="border-bottom:1px solid #007BFF"><label for="email" >E-mail:</label><?php echo $email = $_POST['email'];?><br><span class="error"><?php echo $emailErr;?></span></li>
<li style="border-bottom:1px solid #007BFF"><label for="fecha_nacimiento" >Fecha de Nacimiento:</label><?php echo $fecha_nacimiento = $_POST['fecha_nacimiento'];?><br><span class="error"><?php echo $fecha_nacimientoErr;?></span></li>





<br>
<?php



if($nickErr=="" & $passErr=="" & $nombreErr=="" & $apellido1Err=="" & $apellido2Err=="" & $emailErr=="" & $fecha_nacimientoErr==""){
echo "<img style='margin-left:32%' src='qr_".$_REQUEST['nick'].".png'>";
echo "<h3 class='envio'> El usuario fue dado de alta correctamente. </h3>";
echo "<h4 class='envio'> Compruebe su cuenta de correo para confirmar la cuenta. </h4>";
session_unset();
session_destroy();
}else{
echo "<h3 style=color:red> El Usuario NO se agrego. </h3>";
?>
<script  type="text/javascript">


  setTimeout("redirigir()", 2000);


function redirigir(){
  window.location="registro.php";
}
</script>

<?php
}
?>
<br>

</ul>
</div>

</body>
</html>
