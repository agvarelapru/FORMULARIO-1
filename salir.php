
<?php
session_start();//Reanudamos sesion
session_unset();
session_destroy();//Literalmente la destruimos
header("Location: http://localhost/2DAW/FORMULARIO-1/");//redireccionamos al index
?>
