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
?>
<h2>Listado de animales</h2>
<table width="500" border="0">
<tr bgcolor="lightblue">
	<td><b>Nombre</b></td>
	<td><b>Especie</b></td>
</tr>
<?php
$resultado = $conexion -> query("SELECT * FROM animal ORDER BY nombre");
$fila=$resultado->fetch_array(MYSQLI_ASSOC);
while($fila!=null)
{
	echo "<tr bgcolor='lightgreen'>";
	echo "<td>$fila[nombre]</td>"; 
	echo "<td>$fila[especie]</td>\n";
	echo "</tr>";
	$fila=$resultado->fetch_array(MYSQLI_ASSOC);
}
echo "</table>";
echo "<h3>Desconectando...</h3>";
mysqli_close($conexion);
?>
<p><a href="./conexion5.php">Pulsa aqu� para ir a conexion5.php, donde actualizaremos la base de datos.</a></p>
</body>
</html>
