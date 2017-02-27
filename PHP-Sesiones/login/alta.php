<?php
// acceso a base de datos
$servidor = "localhost";
$usuario = "alumno_rw";
$clave = "dwes";

$mensajeError = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$usernameForm = $_POST['username'];
	$passwordForm = $_POST['password'];
	$nombreForm = $_POST['nombre'];
	$descripcionForm = $_POST['descripcion'];
	$adminForm = $_POST['admin'];
	
	if (empty($usernameForm)) 
		$mensajeError = "Debes introducir un nombre de usuario";
	else if (empty($passwordForm)) 
		$mensajeError = "Debes introducir una contraseña";
	else {
		$conexion = new mysqli($servidor,$usuario,$clave,"catalogo");
		if ($conexion->connect_errno) {
			$mensajeError = "Error al establecer la conexión: " . $conexion->connect_errno . "-" . $conexion->connect_error;
		}
		$conexion->query("SET NAMES 'UTF8'");
		$resultado = $conexion -> query("SELECT * from usuario WHERE login='".$usernameForm."'");
		if($resultado->num_rows > 0) {
			$mensajeError="Ya existe el usuario ".$usernameForm;
		}
		else
		{
			mysqli_free_result($resultado);
			$phash = password_hash($passwordForm, PASSWORD_DEFAULT);
			$actualizacion = "INSERT INTO usuario(login,password,nombre,admin,descripcion) VALUES ('";
			$consultaActualizacion = $actualizacion."$usernameForm"."','"."$phash"."','"."$nombreForm"."','"."$adminForm"."','"."$descripcionForm"."')";
			 echo $consultaActualizacion; // utiliza esta línea para depurar tu consulta
			$resultado = $conexion->query($consultaActualizacion);
				$mensajeError = $conexion->error;
			if (empty($mensajeError)) 
				header ("Location: login.php"); 
		}
	}
}
?>
<html>
<head>
<title>Autenticación en PHP</title>
<meta charset="UTF-8"/>
</head>
<body>
<h3>Registro de usuario</h3>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <label>Elige un nombre de usuario:</label>
    <input type="text" name="username"><br/>
    <label>Elige una contraseña:</label>
    <input type="text" name="password"><br/>
    <label>Tu nombre completo:</label>
    <input type="text" name="nombre"><br/>
    <label>Descripción de la cuenta:</label>
    <input type="text" name="descripcion"><br/>
    <label>Cuenta de administrador:</label>
    <input type="radio" name="admin" value="1"/>
    <label>Cuenta estándar:</label>
    <input type="radio" name="admin" value="0" checked/>
    <input type="submit" value="Alta de usuario" name="enviar">
</form>
<p><a href="login.php">¿Ya estás registrado? Haz clic en este enlace para iniciar sesión</a></p>
<?php echo "<h3>$mensajeError</h3>"?>
</body>
</html>
