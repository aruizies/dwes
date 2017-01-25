<?php
include "conexion-h.php";
// Defino las variables necesarias para la conexi�n:
$servidor = "localhost";
$usuario = "alumno";
$clave = "alumno";

// Creamos la conexi�n
$conexion = new mysqli($servidor,$usuario,$clave,"animales");

echo "<p>A continuaci�n modificamos la especie de un animal.</p>";

$conexion ->query("UPDATE animal SET especie='jabali' WHERE nombre='Babe'");
echo "<h3 style='color:red'>". $conexion->error ."</h3>";

echo "<p>A continuaci�n intentamos una actualizaci�n incorrecta y mostramos el error:</p>";

$conexion ->query ("DROP TABLE animal");
echo "<h3 style='color:red'>". $conexion->error ."</h3>";


echo "<h3>Desconectando...</h3>";
mysqli_close($conexion);

?>

<p><a href="./conexion6.php">Pulsa aqu� para ir a conexion6.php, donde veremos un ejemplo m�s elaborado</a></p>
</body>
</html>
