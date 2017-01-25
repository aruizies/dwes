<?php
include "conexion-h.php";
// Defino las variables necesarias para la conexi�n:
$servidor = "localhost";
$usuario = "alumno";
$clave = "alumno";
?>
<h1>Prueba de conexi�n</h1>
<p> Vamos a utilizar las siguientes variables:</p>
<ul>
<?php
echo "<li>Nombre del servidor al que nos vamos a conectar a MySQL: $servidor</li>";
echo "<li>Nombre de usuario con el que nos vamos a conectar a MySQL: $usuario</li>";
echo "<li>Contrase�a del usuario en MySQL: $clave</li>";
?>
</ul>
<p><a href="./conexion2.php">Pulsa aqu� para ir a conexion2.php, donde nos conectaremos a mysql</a></p>
</body>
</html>
