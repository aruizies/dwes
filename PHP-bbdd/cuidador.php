<html>
<head>
	<title>Conexión a BBDD con PHP</title>
	<meta charset="UTF-8"/>
</head>
<body>
<h2>Pruebas con la base de datos de animales</h2>
<?php
$servidor = "localhost";
$usuario = "alumno";
$clave = "alumno";

$conexion = new mysqli($servidor,$usuario,$clave,"animales");
$conexion->query("SET NAMES 'UTF8'");

if ($conexion->connect_errno)
{
	echo "<p>Error al establecer la conexi�n (" . $conexion->connect_errno . ") " . $conexion->connect_error . "</p>";
}

// Recoger el cuidador de request
if (!isset($_REQUEST["idCuidador"])) die ("<h3>ERROR en la petición. Falta identificador de cuidador</h3>");
$id = $_REQUEST["idCuidador"];


$resultado = $conexion -> query("SELECT * FROM cuidador WHERE idCuidador = ".$id);

// Obtener los datos del cuidador
$cuidador = $resultado->fetch_array(MYSQLI_ASSOC);
if (empty($cuidador)) die ("<h3>ERROR en la petición. Identificador de cuidador no válido</h3>");

// liberamos la memoria del resultado, que reutilizaremos después
mysqli_free_result($resultado);

echo "<h3>Animales cuidados por ".$cuidador['Nombre'].":</h3>";

// obtener los animales que cuida el cuidador
$resultado = $conexion -> query("SELECT animal.* FROM animal, cuida WHERE (animal.chip = cuida.chipAnimal) AND (cuida.idCuidador = '$id');");
echo "<ul>";
while($fila=$resultado->fetch_array(MYSQLI_ASSOC)) {
	echo "<li>".$fila['nombre'].", de la especie ".$fila['especie']."</li>";
}
echo "</ul>";
mysqli_close($conexion);


?>
</ul>
</body>
</html>
