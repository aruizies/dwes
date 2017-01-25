<?php
include "conexion-h.php";
// Defino las variables necesarias para la conexi�n:
$servidor = "localhost";
$usuario = "alumno";
$clave = "alumno";

// Creamos la conexi�n
$conexion = new mysqli($servidor,$usuario,$clave,"animales");
if ($conexion->connect_errno) 
{
    echo "<p>Error al establecer la conexi�n (" . $conexion->connect_errno . ") " . $conexion->connect_error . "</p>";
}
echo "<h2>Listado de cuidadores</h2>";
echo "<h3>Pulsa en cada cuidador para ver los animales de los que se ocupa</h3>";

$resultado = $conexion -> query("SELECT * FROM cuidador");
echo "<ul>\n";
$fila=$resultado->fetch_array(MYSQLI_ASSOC);
while($fila!=null)
{
	echo "<li><a href='conexion7.php?idCuidador=$fila[idCuidador]'>$fila[Nombre]</a></li>\n";
	$fila=$resultado->fetch_array(MYSQLI_ASSOC);
}
echo "</ul>";
echo "<h3>Desconectando...</h3>";
mysqli_close($conexion);
?>
</body>
</html>
