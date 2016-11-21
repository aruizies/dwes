<?php
include "grupo6-validar.php";
if(!isset($_POST["enviar"])){
	?>
	<body>
	<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
	<fieldset>
	<legend>Datos de la cuenta</legend>
	Nombre de usuario: <input type="text" name="nick" value="">
	Correo: <input type="text" name="correo" value="">
	Contraseña: <input type="password" name="pass1" value="">
	Repite la contraseña <input type="password" name="pass2" value="">
	</fieldset>
	<fieldset>
	<legend>Datos personales</legend>
	Nombre: <input type="text" name="nombre" value="">
	Primer Apellido: <input type="text" name="apellido" value="">
	Segundo Apellido: <input type="text" name="apellido2" value="">
	Direccion: <input type="text" name="direccion" value="">
	Fecha de nacimiento: <input type="date" name="fecha" value="">
	Hombre: <input type="radio" name="sexo" value="hombre">
	Mujer: <input type="radio" name="sexo" value="mujer">
	</fieldset>
	<input type="submit" name="enviar">
	</form>
	</body>
	<?php
}
else{
	$nick=$_POST["nick"];
	$correo=$_POST["correo"];
	$contraseña=$_POST["pass1"];
	$contraseña2=$_POST["pass2"];
	$nombre=$_POST["nombre"];
	$apellido=$_POST["apellido"];
	$apellido2=$_POST["apellido2"];
	$direccion=$_POST["direccion"];
	$fecha=$_POST["fecha"];
	if(!longitudNick($nick) OR sinNumeros($contraseña) OR !sinNumeros($nombre) OR !sinNumeros($apellido) OR 
			!sinNumeros($apellido2) OR vacio($nombre) OR vacio($apellido) OR vacio($apellido2) OR vacio($correo) 
			OR vacio($fecha) OR vacio($direccion) OR vacio($nick) OR vacio($contraseña) 
			OR !longitudNombre($nombre) OR !longitudNick($nick) OR !correo($correo) OR strcmp($contraseña, $contraseña2)!=0){		
		?>
		<head>
		<style>
		div.error{color:red;}
		</style>
		</head>
		<body>
		<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
		<fieldset>
		<legend>Datos de la cuenta</legend>
		Nombre de usuario: <input type="text" name="nick" value=<?php if(!vacio($nick) && longitudNick($nick)){echo $nick;}
			else{echo "";}?>>
		<?php 
		if(vacio($nick)){
			echo '<div class="error">El nick es un campo obligatorio</div>';
		}
		else{
			if(!longitudNick($nick)){
				echo '<div class="error">El nombre de usuario debe tener entre 5 y 14 caracteres</div>';
			}
		}
		?>
		Correo: <input type="text" name="correo" value=<?php if(!vacio($correo) && correo($correo)){echo $correo;}else{echo "";}?>>
		<?php 
		if(vacio($correo)){
			echo '<div class="error">El correo es un campo obligatorio</div>';
		}
		else{
			if(!correo($correo)){
				echo '<div class="error">El correo no es correcto</div>';
			}
		}
		?>
		Contraseña: <input type="password" name="pass1" value=<?php if(!vacio($contraseña) && !sinNumeros($contraseña)){
			echo $contraseña;}else{echo "";}?>>
		<?php 
		if(vacio($contraseña)){
			echo '<div class="error">La contraseña es un campo obligatorio</div>';
		}
		else{
			if(sinNumeros($contraseña)){
				echo '<div class="error">La contraseña debe tener al menos un numero</div>';
			}
		}
		?>
		Repite la contraseña <input type="password" name="pass2" value=<?php if(strcmp($contraseña, $contraseña2)!=0){echo "";}
			else{echo $contraseña2;}?>>
		<?php 
		if(strcmp($contraseña, $contraseña2)!=0){
			echo '<div class="error">La contraseña no coincide</div>';
		}
		?>
		</fieldset>
		<fieldset>
		<legend>Datos personales</legend>
		Nombre: <input type="text" name="nombre" value=<?php if(!vacio($nombre) && longitudNombre($nombre) && sinNumeros($nombre)){
			echo $nombre;}else{echo "";}?>>
		<?php 
		if(vacio($nombre)){
			echo '<div class="error">El nombre es un campo obligatorio</div>';
		}
		else{
			if(!sinNumeros($nombre)){
				echo '<div class="error">El nombre no puede contener numeros</div>';
			}
			else{
				if(!longitudNombre($nombre)){
					echo '<div class="error">El nombre debe tener entre 4 y 14 caracteres</div>';
				}
			}
		}
		?>
		Primer Apellido: <input type="text" name="apellido" value=<?php if(!vacio($apellido)&&sinNumeros($apellido)){echo $apellido;}else{echo "";}?>>
		<?php 
		if(vacio($apellido)){
			echo '<div class="error">Este campo es obligatorio</div>';
		}
		else{
			if(!sinNumeros($apellido)){
				echo '<div class="error">El apellido no puede contener numeros</div>';
			}
		}
		?>
		Segundo Apellido: <input type="text" name="apellido2" value=<?php if(!vacio($apellido2)&&sinNumeros($apellido2)){echo $apellido2;}else{echo "";}?>>
		<?php 
		if(vacio($apellido2)){
			echo '<div class="error">Este campo es obligatorio</div>';
		}
		else{
			if(!sinNumeros($apellido2)){
				echo '<div class="error">El apellido no puede contener numeros</div>';
			}
		}
		?>
		Direccion: <input type="text" name="direccion" value=<?php if(!vacio($direccion)){echo $direccion;}else{echo "";}?>>
		<?php 
		if(vacio($direccion)){
			echo '<div class="error">Este campo es obligatorio</div>';
		}
		?>
		Fecha de nacimiento: <input type="date" name="fecha" value=<?php if(!vacio($fecha)){echo $fecha;}else{echo "";}?>>
		<?php 
		if(vacio($fecha)){
			echo '<div class="error">Este campo es obligatorio</div>';
		}
		?>
		Hombre: <input type="radio" name="sexo" value="hombre">
		Mujer: <input type="radio" name="sexo" value="mujer">
		<?php 
		if(!isset($_POST["sexo"])){
			echo '<div class="error">Este campo es obligatorio</div>';
		}
		?>
		</fieldset>
		<input type="submit" name="enviar">
		</form>
		</body>		
		<?php
	}
	else{
		echo "Formulario enviado con exito";
	}
}
?>