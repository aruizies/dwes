<?php
include "conexion-h.php";
echo "<h3>Plantilla para ver el detalle de un cuidador</h3>";
// Defino las variables necesarias para la conexi�n:
$servidor = "localhost";
$usuario = "alumno";
$clave = "alumno";

$conexion = new mysqli($servidor,$usuario,$clave,"animales");
if ($conexion->connect_errno) 
{
    echo "<p>Error al establecer la conexi�n (" . $conexion->connect_errno . ") " . $conexion->connect_error . "</p>";
}

// coger el cuidador de request. si no hay, error.
$id = $_REQUEST["idCuidador"];
if (!isset($id)) die ("ERROR en la petici�n. Falta identificador de cuidador");

$resultado = $conexion -> query("SELECT * FROM cuidador WHERE idCuidador = ".$id);

// Obtener los datos del cuidador
$cuidador = $resultado->fetch_array(MYSQLI_ASSOC);
if (empty($cuidador)) die ("ERROR en la petici�n. Identificador de cuidador no v�lido");

// liberamos la memoria del resultado, que reutilizaremos despu�s
mysqli_free_result($resultado);

echo "<h3>Animales cuidados por ".$cuidador['Nombre'].":</h3>";

// obtener los animales que cuida el cuidador
$resultado = $conexion -> query("SELECT animal.* FROM animal, cuida WHERE (animal.chip = cuida.chipAnimal) AND (cuida.idCuidador = '$id');");
$fila=$resultado->fetch_array(MYSQLI_ASSOC);
echo "<ul>";
while($fila!=null) 
{
	echo "<li>".$fila['nombre'].", de la especie ".$fila['especie']."</li>";
	$fila=$resultado->fetch_array(MYSQLI_ASSOC);
}
echo "</ul>";
echo "<h3>Desconectando...</h3>";
mysqli_close($conexion);

echo "<a href='conexion6.php'>Volver</a>";

?> 
