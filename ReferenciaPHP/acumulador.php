<?php 
// Calcular el valor actual del acumulador
if (isset($_POST["acumulador"]))
	$temporal = $_POST['temporal'] + $_POST['n'];
else 
	$temporal = 0;	

// Decidir si se muestra o no el formulario
if ($temporal > 50)
	echo "<h3>Hemos terminado. Suma total: $temporal</h3>";
else
{
	echo "<h3>De momento llevamos $temporal. Seguimos.</h3>";
	?>
	<html><head><meta charset="utf-8"><title>Acumulador</title></head><body>
	<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
		<label>Número:</label><input name="n" type="text"/>
		<input type="hidden" name="temporal" 
			value="<?php echo $temporal?>"/>
		<input type="submit" name="acumulador" value="EMPEZAR"/>
	</form></body></html>
<?php 
}
?>
