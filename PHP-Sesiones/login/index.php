<?php
session_start();
if ($_SESSION['login']!="1") {
	header ("Location: login.php");
}
$mensajeError = "";
?>
<html>
<head>
<title>Autenticación en PHP</title>
<meta charset="UTF-8"/>
</head>
<body>
<?php 
$servidor = "localhost";
$usuario = "alumno";
$clave = "alumno";

$conexion = new mysqli($servidor,$usuario,$clave,"catalogo");
if ($conexion->connect_errno)
	$mensajeError = "Error al establecer la conexión: " . $conexion->connect_errno . "-" . $conexion->connect_error;
$conexion->query("SET NAMES 'UTF8'");
$resultado = $conexion -> query("SELECT * from usuario WHERE login='".$_SESSION['usuario']."'");
if($resultado->num_rows === 0) {
	// esto sólo pasará si el usuario ha borrado su cuenta en este momento desde otro navegador
	header("Location: logout.php");
}
else
{
	$fila=$resultado->fetch_assoc();
	$nombre = $fila['nombre'];
	mysqli_free_result($resultado);
}

if (empty($mensajeError))
	echo "<h2>Bienvenido, $nombre</h2>";
else
	echo "<h3>$mensajeError</h3>";
?>
<p><a href="logout.php">Cerrar sesión</a></p>
<p><a href="baja.php">Eliminar la cuenta</a></p>

</body>
</html>