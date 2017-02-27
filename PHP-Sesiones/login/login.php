<?php
$servidor = "localhost";
$usuario = "alumno";
$clave = "alumno";

$mensajeError="";

if(isset($_POST["enviar"])) {
	$usernameForm = $_POST['username'];
	$passwordForm = $_POST['password'];

	// Localizar el usuario en la base de datos
	$conexion = new mysqli($servidor,$usuario,$clave,"catalogo");
	if ($conexion->connect_errno) {
		$mensajeError = "Error al establecer la conexión: " . $conexion->connect_errno . "-" . $conexion->connect_error;
	}
	$conexion->query("SET NAMES 'UTF8'");
	$resultado = $conexion -> query("SELECT * from usuario WHERE login='".$usernameForm."'");
	if($resultado->num_rows === 0) {
		$mensajeError="No se ha encontrado el usuario ".$usernameForm;	
	}
	else 
	{
		$fila=$resultado->fetch_assoc();
		// comprobar password
//		if (strcmp($passwordForm, $fila['password'], ) !== 0) {
		if (password_verify($passwordForm, $fila['password'])) {
			// autenticación completada: iniciar sesión y redirigir a la página
			session_start();
			$_SESSION['login'] = "1";
			$_SESSION['usuario'] = $usernameForm;
			header("Location: index.php");
		}
		else 
			$mensajeError="La contraseña es incorrecta para el usuario ".$usernameForm;
	}
	mysqli_free_result($resultado);
}
?>
<html>
<head>
<title>Autenticación en PHP</title>
<meta charset="UTF-8"/>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <label>Usuario:</label>
    <input type="text" name="username"><br/>
    <label>Contraseña:</label>
    <input type="password" name="password"><br/>
    <input type="submit" value="Iniciar sesión" name="enviar">
</form>
<p><a href="alta.php">¿Aún no estás registrado? Haz clic en este enlace</a></p>
<?php echo "<h3>$mensajeError</h3>"?>

</body>
</html>