<?php?>
<html>
<head>
<title>Sesiones en PHP</title>
<meta charset="UTF-8"/>
</head>
<body>
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
		echo "<p>Error al establecer la conexión (" . $conexion->connect_errno . ") " . $conexion->connect_error . "</p>";
	}
	$conexion->query("SET NAMES 'UTF8'");
	$resultado = $conexion -> query("SELECT * from usuario WHERE login=".$usernameForm);
	if($resultado->num_rows === 0) {
		$mensajeError="No se ha encontrado el usuario ".$usernameForm;	
	}
	else 
	{
		$fila=$resultado->fetch_assoc();
		// comrpobar password
		
	
	}
	mysqli_free_result($resultado);
	
}


	$database = "login";


	$db_found = new mysqli(DB_SERVER, DB_USER, DB_PASS, $database );

	if ($db_found) {

	$SQL = $db_found->prepare('SELECT * FROM login WHERE L1 = ?');
	$SQL->bind_param('s', $uname);
	$SQL->execute();
	$result = $SQL->get_result();

		if ($result->num_rows == 1) {

			$db_field = $result->fetch_assoc();

			if (password_verify($pword, $db_field['L2'])) {
				session_start();
				$_SESSION['login'] = "1";
				header ("Location: page1.php");
			}
			else {
				$errorMessage = "Login FAILED";
				session_start();
				$_SESSION['login'] = '';
			}
		}
		else {
			$errorMessage = "username FAILED";
		}
	}
	
	/*
}
?>


<title>Basic Login Script</title>
</head>
<body>

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <label>Usuario:</label>
    <input type="text" name="username"><br/>
    <label>Contraseña:</label>
    <input type="password" name="password"><br/>
    <input type="submit" value="Iniciar sesión" name="enviar">
</form>


<FORM NAME ="form1" METHOD ="POST" ACTION ="login.php">

Username: <INPUT TYPE = 'TEXT' Name ='username'  value="<?PHP print $uname;?>" maxlength="20">
Password: <INPUT TYPE = 'TEXT' Name ='password'  value="<?PHP print $pword;?>" maxlength="16">

<P align = center>
<INPUT TYPE = "Submit" Name = "Submit1"  VALUE = "Login">
</P>

</FORM>

<P>
<?PHP print $errorMessage;?>




</body>
</html>*/