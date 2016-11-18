<?php include './grupo4-validaciones.php' ?>
<html>
<body>

<?php
	$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
	$apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : null;
	$edad = isset($_POST['edad']) ? $_POST['edad'] : null;
	$genero = isset($_POST['genero']) ? $_POST['genero'] : null;
	$comentario = isset($_POST['comentario']) ? $_POST['comentario'] : null;
	
	if (!isset($_POST['enviar'])){
?>
<form action="grupo4.php" method="post">
	Nombre:<br><input type="text" name="nombre"><br>
	Apellidos:<br><input type="text" name="apellidos"><br>
	Edad:<br><input type="text" name="edad">
	
	<br>
	<label>Género:</label>	
	<input type="radio" name="genero" value="mujer">Mujer
	<input type="radio" name="genero" value="hombre">Hombre
	<br>
	<label>Especie:</label>
	<select name="especie">
	<option value="humano">Humano</option>
	<option value="reptiliano">Reptiliano</option>
	<option value="tronista">Tronista en MyHyV</option>
	<option value="testigo">Testigo de Jehová</option>
	<!--  <option value="otros"><input type="text" name="otro"></option> -->
	
	</select> 
	<br>
	<label>Su opinion acerca del cuestionario:</label>
	<br>
	<textarea name="comentario" rows="5" cols="40"></textarea>
	
	<input type="submit" name="enviar" value="Enviar">
</form>
<?php 
	}
	elseif (!validaNombre($nombre) || !validaEdad($edad) || !validaNombre($apellidos) || !isset($_POST['genero'])){
		$textNError="";
		$textPError="";
		$textEError="";
		
		if (!validaNombre($nombre)) {
			$textNError="Nombre incorrecto";
			$nombre="";
		}
		
		if (!validaNombre($apellidos)) {
			$textPError="Apellido incorrecto";
			$apellidos="";
		}
		
		if (!validaEdad($edad)) {
			$textEError="Edad incorrecta";
			$edad="";
		}

		?>
		
		
		<form action="grupo4" method="post">
		Nombre:<br><input type="text" name="nombre" value="<?php echo $nombre;?>"><?php echo "<font style='color:red'>".$textNError."</font>"?> <br>
		Apellidos:<br><input type="text" name="apellidos" value="<?php echo $apellidos;?>"><?php echo "<font style='color:red'>".$textPError."</font>"?><br>
		Edad:<br><input type="text" name="edad" value="<?php echo $edad;?>"><?php echo "<font style='color:red'>".$textEError."</font>"?>
		<br>
		<label>Género:</label>		
	  	<input type="radio" name="genero" <?php if (isset($genero) && $genero=="mujer") echo "checked";?> value="mujer">Mujer
  		<input type="radio" name="genero" <?php if (isset($genero) && $genero=="hombre") echo "checked";?> value="hombre">Hombre
		<?php if (!isset($_POST["genero"]))echo "<font style='color:red'>Hay que seleccionar un genero</font>"?>
		<br>
		<label>Especie:</label>
		<select name="especie">
		<option value="humano">Humano</option>
		<option value="reptiliano">Reptiliano</option>
		<option value="tronista">Tronista en MyHyV</option>
		<option value="testigo">Testigo de Jehová</option>
		<!--  <option value="otros"><input type="text" name="otro"></option> -->
		
		</select> 
		<br>
		<label>Su opinion acerca del cuestionario:</label>
		<br>
		<textarea name="comentario" rows="5" cols="40" ></textarea>
		
		<input type="submit" name="enviar" value="Enviar">
		</form>
		<?php 
	}else{
		echo "Nombre: ".$_POST['nombre']."<br>";
		echo "Apellidos: ".$_POST['apellidos']."<br>";
		echo "Edad: ".$_POST['edad']."<br>";
		echo "Género: ".$_POST['genero']."<br>";
		echo "Especie: ".$_POST['especie']."<br>";
		if(!empty($_POST['comentario'])){
			echo "Comentario: ".$_POST['comentario'];
		}
			
	}
	
?>
</body>
</html>