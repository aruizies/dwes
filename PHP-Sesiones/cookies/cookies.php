<?php 
	setcookie("test", "test", time() + 3600, '/');
	if(count($_COOKIE) ==0) $cookiesDeshabilitadas == true;
?>	
<html>
<head>
<title>Cookies y sesiones</title>
<meta charset="UTF-8"/>
</head>
<body>
<?php
/*
 * 
 *function comprobarCookies() {
	setcookie("test", "test", time() + 3600, '/');
	print_r($_COOKIE);
}*/
/*
if (comprobarCookies()==false) {
	echo "<h3>Advertencia: tu navegador tiene las cookies deshabilitadas. Esta aplicación no funcionará</h3>";
}
*/
if (isset($cookiesDeshabilitadas)) {
	echo "<h3>Advertencia: tu navegador tiene las cookies deshabilitadas. Esta aplicación no funcionará</h3>";
}
if(isset($_POST["enviar"])) {
	//setcookie("visitante", $_POST["nombre"], time() + (86400 * 15), "/PHP-Sesiones/"); // 86400 = segundos en 1 día
	setcookie("visitante", $_POST["nombre"], time() + 20, "/"); // 86400 = segundos en 1 día
	header('Location: '.$_SERVER['PHP_SELF']);
}

if(isset($_REQUEST["eliminarCookie"])) {
	setcookie("visitante", "nulo", time() - 1, "/");
	header('Location: '.$_SERVER['PHP_SELF']);
	}
	
if(isset($_COOKIE["visitante"])) {
	echo "<h2>Damos la bienvenida a $_COOKIE[visitante]</h2>";
}
else 
{ // solicitar nombre al usuario
?>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    <label>Escribe tu nombre para dirigirnos a ti:</label>
    <input type="text" name="nombre"><br/>
    <input type="submit" value="Enviar" name="enviar">
</form>
<?php 
}
?>
<p><a href="<?php echo $_SERVER['PHP_SELF']?>">Enlace a esta misma página</a></p>
<p><a href="<?php echo $_SERVER['PHP_SELF']."?eliminarCookie=true"?>">Eliminar cookies</a></p>

</body></html>