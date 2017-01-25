<?php
include "conexion-h.php";
// Defino las variables necesarias para la conexi�n:

echo "<h3>Estableciendo conexi�n...</h3>";
// Creamos la conexi�n
$conexion = new mysqli($servidor,$usuario,$clave);
if ($conexion->connect_errno) 
{
    echo "<p>Error al establecer la conexi�n (" . $conexion->connect_errno . ") " . $conexion->connect_error . "</p>";
}
else
{
	echo "<p>Informaci�n de servidor: $conexion->host_info</p>";

	echo "<h3>Desconectando...</h3>";
	mysqli_close($conexion);
}
?>
<p><a href="./conexion3.php">Pulsa aqu� para ir a conexion3.php, donde nos conectaremos a la BD animales para ver extraer su contenido</a></p>
</body>
</html>
