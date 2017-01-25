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

if ($conexion->connect_errno) {
	echo "<p>Error al establecer la conexión (" . $conexion->connect_errno . ") " . $conexion->connect_error . "</p>";
}

echo "<h2>Listado de cuidadores</h2>";
echo "<h3>Pulsa en cada cuidador para ver los animales de los que se ocupa</h3>";

$resultado = $conexion-> query("SELECT * FROM cuidador");
echo "<ul>\n";
$fila=$resultado->fetch_array(MYSQLI_ASSOC);
while($fila!=null) {
	echo "<li><a href='cuidador.php?idCuidador=$fila[idCuidador]'>$fila[Nombre]</a></li>\n";
	// Ejemplo: <li><a href='cuidador.php?idCuidador=12345'>Alberto</a></li>
	$fila=$resultado->fetch_array(MYSQLI_ASSOC);
}
echo "</ul>";

mysqli_close($conexion);

?>
</body>
</html>




