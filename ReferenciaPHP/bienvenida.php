<html>
<body>
<?php
if (!isset($_POST['enviar'])) {
?>	
	<form action="bienvenida.php" method="post">
	Nombre: <input type="text" name="nombre" required>
	Edad: <input type="text" name="edad">
	<input type="submit" name="enviar">
	</form>
<?php
}
else {
	echo "<h2>¡Bienvenido ".$_POST["nombre"]."!</h2>";
	echo "<h2>Tienes ".$_POST["edad"]." años</h2>";
	if (is_numeric($_POST["edad"])) echo "TEAH";
	if (empty($_POST["edad"])) echo "EDAD VACIA empty";
	if (strlen($_POST["edad"])) echo "EDAD VACIA Strlen";
}
?>
</body>
</html>


