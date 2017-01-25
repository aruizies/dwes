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
if ($conexion->connect_errno) {
	echo "<p>Error al establecer la conexión (" . $conexion->connect_errno . ") " . $conexion->connect_error . "</p>";
}
?>
<table border="0">
<tr bgcolor="lightblue">
	<td><b>Nombre</b></td>
	<td><b>Especie</b></td>
</tr>
<?php
$resultado = $conexion -> query("SELECT * FROM animal ORDER BY nombre");
$fila=$resultado->fetch_array(MYSQLI_ASSOC);
while($fila!=null) {
	echo "<tr bgcolor='lightgreen'>";
	echo "<td>$fila[nombre]</td>"; 
	echo "<td>$fila[especie]</td>\n";
	echo "</tr>";
	$fila=$resultado->fetch_array(MYSQLI_ASSOC);
}
?>
</table>
<?php 
echo "<h3>Desconectando...</h3>";
mysqli_close($conexion);
?>
</body>
</html>


