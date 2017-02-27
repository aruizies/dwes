<?php

session_start();
// acceso a base de datos
$servidor = "localhost";
$usuario = "alumno_rw";
$clave = "dwes";

$mensajeError = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$passwordForm = $_POST['password'];

	if (empty($passwordForm)) 
		$mensajeError = "Debes introducir una contraseña";
	else {
		$conexion = new mysqli($servidor,$usuario,$clave,"catalogo");
		if ($conexion->connect_errno) {
			$mensajeError = "Error al establecer la conexión: " . $conexion->connect_errno . "-" . $conexion->connect_error;
		}
		$conexion->query("SET NAMES 'UTF8'");
		// 1. Verificar password
		$resultado = $conexion -> query("SELECT password FROM usuario WHERE login='".$_SESSION['usuario']."'");
		$fila=$resultado->fetch_assoc();
		if (password_verify($passwordForm, $fila["password"])) {
			// 2. Eliminar usuario
			$resultado = $conexion -> query("DELETE from usuario WHERE login='".$_SESSION['usuario']."'");
			$mensajeError = $conexion->error;
			if (empty($mensajeError)) {
				header("Location: logout.php");
			}
		}
		else 
			$mensajeError = "La contraseña es incorrecta";
	}
}
?>
<html>
<head>
<title>Autenticación en PHP</title>
<meta charset="UTF-8"/>
</head>
<body>
<h3>Eliminación de cuenta</h3>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <label>Confirma tu contraseña:</label>
    <input type="password" name="password"><br/>
    <input type="submit" value="Eliminar cuenta" name="enviar">
</form>
<?php echo "<h3>$mensajeError</h3>"?>
<p><a href="index.php">Volver</a></p>
</body>
</html>
