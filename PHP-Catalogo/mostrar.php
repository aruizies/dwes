<?php include 'Libro.php';?>
<html>
<head>
<title>Conexión a BBDD con PHP</title>
<meta charset="UTF-8"/>
</head>
<body>
<h2>Libros</h2>
<?php
$servidor = "localhost";
$usuario = "alumno";
$clave = "alumno";

$conexion = new mysqli($servidor,$usuario,$clave,"catalogo");
if ($conexion->connect_errno) {
	echo "<p>Error al establecer la conexión (" . $conexion->connect_errno . ") " . $conexion->connect_error . "</p>";
}
$conexion->query("SET NAMES 'UTF8'");

?>
<table border='0'>
<tr bgcolor="lightblue">
	<th>Título</th>
	<th>Autor</th>
	<th>Año</th>
	<th>Editorial</th>
	<th>Imagen</th>
</tr>
<?php
$resultado = $conexion -> query("SELECT * FROM libro ORDER BY titulo");

while ($libro = $resultado->fetch_object('Libro')) {
	echo "<tr bgcolor='lightgreen'>";
	echo "<td>".$libro->getTitulo()."</td>\n";
	echo "<td>".$libro->getAutor()."</td>\n";
	echo "<td>".$libro->getAño()."</td>\n";
	echo "<td>".$libro->getEditorial()."</td>\n";
	echo "<td>".$libro->getImagen()."</td>\n";
	echo "</tr>";
	
}
?>
</table>
<?php 
mysqli_close($conexion);
?>
</body>
</html>


