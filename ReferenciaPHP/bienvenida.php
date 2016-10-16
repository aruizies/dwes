<html>
<body>
<?php
echo "<h2>¡Bienvenido ".$_POST["nombre"]."!</h2>";
if (isset($_POST['edad']))
	echo "<h2>Tienes ".$_POST["edad"]." años</h2>";
else 
	echo "No has introducido tu edad";
?>
</body>
</html>
