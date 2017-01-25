<?php
include "conexion-h.php";
// Defino las variables necesarias para la conexi�n:
$servidor = "localhost";
$usuario = "alumno";
$clave = "alumno";

// Creamos la conexi�n
$conexion = new mysqli($servidor,$usuario,$clave,"animales");

//si quisi�ramos hacerlo en dos pasos: 
// $conexion = new mysqli($servidor,$usuario,$clave);
// $conexion->select_db("animales");

if ($conexion->connect_errno) 
{
    echo "<p>Error al establecer la conexi�n (" . $conexion->connect_errno . ") " . $conexion->connect_error . "</p>";
}
echo "<p>A continuaci�n mostramos algunos registros:</p>";
$resultado = $conexion -> query("SELECT * FROM animal ORDER BY nombre");
$fila=$resultado->fetch_array(MYSQLI_ASSOC);
while($fila!=null)
{
	echo "<hr>";
	echo "Nombre:" . $fila['nombre'];
	echo "<br>Especie: $fila[especie]"; // ��observa la diferencia en el uso de comillas!!
	$fila=$resultado->fetch_array(MYSQLI_ASSOC);
}
echo "<h3>Desconectando...</h3>";
mysqli_close($conexion);

?>

<p><a href="./conexion4.php">Pulsa aqu� para ir a conexion4.php, donde haremos lo mismo presentando los resultados en una tabla</a></p>
</body>
</html>
