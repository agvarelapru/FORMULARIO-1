<!doctype html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">	
<title>Formulario</title>
<!-- CSS de Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="estilos.css" rel="stylesheet" media="screen">

</head>


<body>

<div class="container" >
<h2>FORMULARIO</h2>

<hr />

<form class="form-horizontal" role="form" id="form1" name="form1" method="post" action="menu.php">
<fieldset>
<legend>Identifiquese:</legend>
  <div class="form-group">
    <label for="usuario">Usuario</label>
    <input  class="form-control" type="text" name="usuario" id="usuario" />
  </div>
  <div class="form-group">
    <label for="contraseña">Contraseña</label>
    <input class="form-control" type="text" name="contraseña" id="contraseña"/>
  </div>

  
  <a href="formulario.html"><div class="izquierda">He olvidado mi contraseña</a></div>
  <a href="formulario.html"><div class="derecha">Alta nueva</div></a>
  
  
  <input class="btn btn-primary" type="reset" name="limpiar" value="Borrar datos" />
  <input  class="btn btn-primary" type="submit" name="enviar" id="enviar" value="Validar" />
  
</fieldset>
</form>
<hr/>
<p>Acceso mediante codigo QR o etiquetas NFC</p>
<form  action="menu.php"  method="post"> 
    <input type="hidden" name="qr" value="<?php <!--echo $reg['IdProveedor'];?>"/>
    <button class="btn btn-primary" type="submit" >QR</button>
    <form  action="menu.php"  method="post"> 
    <input type="hidden" name="qr" value="<?php echo $reg['IdProveedor'];?>"/>
    <button class="btn btn-primary" type="submit" >NFC</button>

</div> 
 
   
</body>
</html>
