<?php include 'Animal.php';?><html>
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
if ($conexion->connect_errno) {
	echo "<p>Error al establecer la conexión (" . $conexion->connect_errno . ") " . $conexion->connect_error . "</p>";
}
?>
<table border="0">
<tr bgcolor="lightblue">
	<th>Chip</th>
	<th>Nombre</th>
	<th>Especie</th>
	<th>Imagen</th>
</tr>
<?php
$resultado = $conexion -> query("SELECT nombre, chip, especie AS tipo, imagen FROM animal ORDER BY nombre");
while ($animal = $resultado->fetch_object('Animal')) {
	echo $animal."<br/>";
}

/*
$fila=$resultado->fetch_array(MYSQLI_ASSOC);
while($fila!=null) {
	echo "<tr bgcolor='lightgreen'>";
	echo "<td>$fila[chip]</td>\n";
	echo "<td>$fila[nombre]</td>";
	echo "<td>$fila[especie]</td>\n";
	echo "<td>$fila[imagen]</td>\n";
	echo "</tr>";
	$fila=$resultado->fetch_array(MYSQLI_ASSOC);
}
*/
?>
</table>
<?php 

echo "<h3>Desconectando...</h3>";
mysqli_close($conexion);
?>
</body>
</html>


