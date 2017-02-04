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

<table style='border:0'>
<tr style='background-color:lightblue'>
	<th>Título</th>
	<th>Autor</th>
	<th>Año</th>
	<th>Editorial</th>
	<th>Imagen</th>
</tr>
<?php

/*
 // CON DOS CONSULTAS - con objetos
$resultado = $conexion -> query("SELECT * FROM libro ORDER BY titulo");
while ($libro = $resultado->fetch_object('Libro')) {
	
	$resultado2 = $conexion -> query("SELECT nombre FROM autor WHERE idAutor=".$libro->getIdAutor());
	$fila=$resultado2->fetch_array(MYSQLI_ASSOC);
	echo "<tr style='background-color:lightgreen'>";
	echo "<td>".$libro->getTitulo()."</td>\n";
	echo "<td>".$fila["nombre"]."</td>\n";
	echo "<td>".$libro->getAño()."</td>\n";
	echo "<td>".$libro->getEditorial()."</td>\n";
	echo "<td>".$libro->getImagen()."</td>\n";
	echo "</tr>";
	mysqli_free_result($resultado2);
}
*/

 // CON JOIN - sin objetos
$resultado = $conexion -> query("SELECT * from libro,autor WHERE autor.idautor=libro.idAutor");
while ($fila=$resultado->fetch_array(MYSQLI_ASSOC)) {
	echo "<tr style='background-color:lightgreen'>";
	echo "<td>$fila[titulo]</td>\n";
	echo "<td>$fila[nombre]</td>\n";
	echo "<td>$fila[año]</td>\n";
	echo "<td>$fila[editorial]</td>\n";
	echo "<td>$fila[imagen]</td>\n";
	echo "</tr>";
}


?>
</table>
<?php 
mysqli_close($conexion);
?>
</body>
</html>


