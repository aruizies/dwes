<head>
	<style type="text/css">
		.error{
			color:red;
		}
	</style>
</head>
<body>
<?php
// Definimos e inicializamos las variables.
$nombre = $ap1 = $ap2 = $mail = $direccion = $disp = $comentario = $cv = "";
$dep = [];
$edad = $tlf = "";
$nombreErr = $ap1Err = $ap2Err = $generoErr = $mailErr = $dispErr = $depErr = $cvErr = "";
$edadErr = $tlfErr = "";
$genero = "null";
$oculta = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["nombre"])) {
		// Si el campo está vacío, dará un mensaje.
		$nombreErr = "Campo -Nombre- requerido.";
	} else {
		$nombre = limpieza_campos($_POST["nombre"]);
		// Comprobamos si sólo contiene letras y espacios.
		if (!preg_match("/^[a-zA-Z ]*$/",$nombre)) {
			$nombreErr = "Sólo se permiten letras y espacios en blanco.";
		}
	}
	if (empty($_POST["ap1"])) {
		// Si el campo está vacío, dará un mensaje.
		$ap1Err = "Campo -Apellido 1- requerido.";
	} else {
		$ap1 = limpieza_campos($_POST["ap1"]);
		// Comprobamos si sólo contiene letras y espacios.
		if (!preg_match("/^[a-zA-Z ]*$/",$ap1)) {
			$ap1Err = "Sólo se permiten letras y espacios en blanco.";
		}
	}
	if (empty($_POST["ap2"])) {
		// Si el campo está vacío, se queda vacío, ya que no es requerido.
		$ap2 = "";
	} else {
		$ap2 = limpieza_campos($_POST["ap2"]);
		// Comprobamos si sólo contiene letras y espacios.
		if (!preg_match("/^[a-zA-Z ]*$/",$ap2)) {
			$ap2Err = "Sólo se permiten letras y espacios en blanco.";
		}
	}
	if (empty($_POST["edad"])) {
		// Si el campo está vacío, dará un mensaje.
		$edadErr = "Campo -Edad- requerido.";
	} else {
		// 
		if(is_numeric($_POST["edad"])){
			// Comprobamos si es numerico y si esta entre 18 y 65
			if($_POST["edad"] < 18 || $_POST["edad"] > 65) {
				$edadErr = "Edad permitida : entre 18 y 65 años.";
			}
			else{
				$edad = $_POST["edad"];
			}
		}
		else{
			$edadErr = "Introduce un valor numérico.";
		}
	}
	// Comprobamos que se haya marcado un valor
	if(isset($_POST["genero"])){
		$genero = $_POST["genero"];
	}
	else{
		$generoErr = "Ninguno ha sido marcado.";
	}
	// Comprobamos que no se introduzcan valores invalidos.
	if (!filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL) === false) {
		$mail = $_POST["mail"];
	} 
	else {
		$mailErr = "E-mail no válido.";
	}
	//
	if(empty($_POST["tlf"])){
		// Si el campo está vacío, dará un mensaje.
		$tlfErr = "Campo -Teléfono- requerido.";
	}
	else{
		if(is_numeric($_POST["tlf"])){
			// Comprobamos si es numerico y si el numero es de 9 cifras
			$tlf = limpieza_campos($_POST["tlf"]);
			if(strlen($tlf) != 9){
				$tlfErr = "Número de teléfono inválido.";
			}
		}
		else{
			$tlfErr = "Número de teléfono inválido.";
		}
	}
	// Comprobamos si estas vacio
	if(empty($_POST["direccion"])){
	// Este campo no es obligatorio
		$direccion = "";
	}
	else{
		$direccion = $_POST["direccion"];
	}
	// Comprobamos si alguna ha sido seleccionado
	if(isset($_POST["disp"])){
		$disp = $_POST["disp"];
	}
	else{
		$dispErr = "Ninguno ha sido marcado.";
	}
	// Comprobamos que se haya seleccionado
	if(!empty($_POST["departamentos"])){
		$dep = $_POST["departamentos"];
	}
	else{
		// Si no se ha seleccionado ninguno, dará un mensaje.
		$depErr = "Ninguno ha sido marcado.";
	}
	// Si el campo está vacío, dará un mensaje.
	if(empty($_POST["comentario"])){
		$comentario = "";
	}
	else{
		$comentario = $_POST["comentario"];
	}
	// Comprobamos que se haya introducido un fichero/valor
	if(!empty($_POST["cv"])){
		$cv = $_POST["cv"];
	}
	else{
		$cvErr = "No has subido el currículum.";
	}
	
}
function limpieza_campos($campo) {
	// ELiminamos espacios al inicio y final del campo (si los hubiera).
	$campo = trim($campo);
	// Eliminamos las barras y contrabarras (si los hubiera).
	$campo = stripslashes($campo);
	// Convertimos cualquier carácter html a entidades (si los hubiera).
	$campo = htmlspecialchars($campo);
	return $campo;
}
if(isset($_POST["enviar"]) && empty($nombreErr) && empty($ap1Err) && empty($ap2Err) && empty($generoErr) && empty($mailErr) && empty($dispErr) && empty($depErr) && empty($cvErr) && empty($edadErr) && empty($tlfErr)){
	$oculta=true;
	echo "<h2> Datos recibidos: </h2>";
	echo "<p> Nombre: $nombre </p>";
	echo "<p> Apellido/s: $ap1 $ap2 </p>";
	echo "<p> Edad: $edad </p>";
	echo "<p> Género: $genero </p>";
	echo "<p> E-mail: $mail </p>";
	echo "<p> Teléfono: $tlf</p>";
	echo "<p> Direccion: $direccion </p>";
	echo "<p> Disponibilidad: $disp </p>";
	echo "Departamentos de interés: ";
	foreach ($dep as $departamento){
		echo "$departamento ";
	}
	echo "<p> Defínete: $comentario </p>";
	echo "<p>Currículum: $cv</p>";
	
}
?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"],ENT_QUOTES,"UTF-8");?>" method="post" <?php if($oculta) echo 'hidden="hidden"'?>>
<label>Inscripción a Oferta de Empleo.</label>
<br/>
<span class="error">* Campos requeridos.</span>
<br/>
<fieldset>
<legend>Datos Personales</legend>
- Nombre<input type="text" name="nombre" value="<?php echo $nombre;?>"> <span class="error">* <?php echo $nombreErr;?></span><br/>
- Apellido 1<input type="text" name="ap1" value="<?php echo $ap1;?>"> <span class="error">* <?php echo $ap1Err;?></span><br/>
- Apellido 2<input type="text" name="ap2" value="<?php echo $ap2;?>"><br/>
- Edad<input type="text" name="edad" value="<?php echo $edad;?>"><span class="error">* <?php echo $edadErr;?></span><br/>
Género: <span class="error">* <?php echo $generoErr;?></span> <br/>	
<input type="radio" name="genero" value="masculino" <?php if (isset($genero) && $genero=="masculino") echo "checked";?> >Masculino
<input type="radio" name="genero" value="femenino" <?php if (isset($genero) && $genero=="femenino") echo "checked";?>>Femenino
<input type="radio" name="genero" value="otros" <?php if (isset($genero) && $genero=="otro") echo "checked";?>>Otros
<input type="radio" name="genero" value="dinosaurio" <?php if (isset($genero) && $genero=="dinosaurio") echo "checked";?>>Dinosaurio <br/>
- E-mail<input type="email" name="mail" value="<?php echo $mail;?>"> <span class="error">* <?php echo $mailErr;?></span><br/>
- Teléfono<input type="text" name="tlf" value="<?php echo $tlf;?>"><span class="error">* <?php echo $tlfErr;?></span><br/>
- Dirección<input type="text" name="direccion" value="<?php echo $direccion;?>"><br/>
</fieldset>
<fieldset>
<legend>Preferencias de trabajo.</legend>
Disponibilidad: <span class="error">* <?php echo $dispErr;?></span> <br/>
<input type="radio" name="disp" value="diurno" <?php if (isset($disp) && $disp=="diurno") echo "checked";?>> Diurno
<input type="radio" name="disp" value="vespertino" <?php if (isset($disp) && $disp=="vespertino") echo "checked";?> > Vespertino
<input type="radio" name="disp" value="nocturno" <?php if (isset($disp) && $disp=="nocturno") echo "checked";?>> Nocturno 
<br/>
Departamentos de interés: <span class="error">* <?php echo $depErr;?></span> <br/>
<input type="checkbox" name="departamentos[0]" value="informatica" <?php if (isset($dep[0])) echo "checked";?> > Informática
<input type="checkbox" name="departamentos[1]" value="administracion" <?php if (isset($dep[1])) echo "checked";?>> Administracion
<input type="checkbox" name="departamentos[2]" value="rrhh" <?php if (isset($dep[2])) echo "checked";?>> RRHH
<input type="checkbox" name="departamentos[3]" value="teleco"<?php if (isset($dep[3])) echo "checked";?>> Telecomunicaciones
<input type="checkbox" name="departamentos[4]" value="markteing" <?php if (isset($dep[4])) echo "checked";?>> Marketing<br/>
<input type="checkbox" name="departamentos[5]" value="seguridad" <?php if (isset($dep[5])) echo "checked";?>> Seguridad
<input type="checkbox" name="departamentos[6]" value="meteorito" <?php if (isset($dep[6])) echo "checked";?>> Seguridad anti-meteorito
<input type="checkbox" name="departamentos[7]" value="sanidad" <?php if (isset($dep[7])) echo "checked";?>> Sanidad
<input type="checkbox" name="departamentos[8]" value="enseñanza" <?php if (isset($dep[8])) echo "checked";?>> Enseñanza
<input type="checkbox" name="departamentos[9]" value="higiene" <?php if (isset($dep[9])) echo "checked";?>> Higiene <br/>
<textarea rows="5" cols="20" name="comentario" placeholder="Defínete..." ><?php echo $comentario;?></textarea>
</fieldset>
<fieldset>
<legend>Currículum</legend>
<label>Envíanos tu currículum:</label> <span class="error">* <?php echo $cvErr;?></span>
<input type="file" name="cv" accept=".doc, .docx, .odt, .php, .md">
</fieldset>
<input type="submit" name="enviar" value="Enviar">
</form>
</body>