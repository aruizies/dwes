<html>
<head>
<title>Arrays y archivos</title>
<meta name="author" content="Alberto Ruiz"/>
<style>
select
{
	margin-bottom: 20px;
}
form p
{
	font-style: italic;
}
label
{
	width: 25%;
	float: left;
	font-weight: bold;
}
input[type=submit]
{
	float:right;
}
fieldset
{
	width:30em;
}
</style>
</head>
<body>
<h1>Arrays y archivos</h1>

<?php
$nombreArchivo = "animales.txt";

function escribirArray($array,$nombreArchivo)
{
	$archivo = fopen($nombreArchivo, 'w') or die("Error grave al escribir el archivo");
	for ($i=0 ; $i<count($array); $i++)
	{
		fwrite($archivo, $array[$i]."\n");
	}
	fclose($archivo);
}

function leerArray($nombreArchivo)
{
	return file($nombreArchivo, FILE_SKIP_EMPTY_LINES |FILE_IGNORE_NEW_LINES);
}

function existeArchivo($nombreArchivo)
{
	return file_exists($nombreArchivo);
}

if (isset($_POST['insertar']))
{
	if (existeArchivo($nombreArchivo))
	{
		$array = leerArray($nombreArchivo);
		$array[count($array)] = $_POST['nombre'];
	}
	else
	{
		$array[0] =  $_POST['nombre'];
	}
	escribirArray($array,$nombreArchivo);
}

if (isset($_POST['eliminar_nombre']))
{
	if (existeArchivo($nombreArchivo))
	{
		$array = leerArray($nombreArchivo);
		for ($i=0; $i<count($array); $i++)
		{
			if ($array[$i] == $_POST['nombre'] )
			{
				$array[$i] = "";
				break;
			}
		}
		escribirArray($array,$nombreArchivo);
	}
}

if (isset($_POST['eliminar_posicion']))
{
	$posicion =$_POST['posicion'];
	if (existeArchivo($nombreArchivo))
	{
		$array = leerArray($nombreArchivo);
		$array[$posicion] = "";
		escribirArray($array,$nombreArchivo);
	}
}


// mostrar el array en pantalla
if (existeArchivo($nombreArchivo))
{
	$array = leerArray($nombreArchivo);
	$tam = count($array);
	if ($tam>0)
	{
		echo "<ol>";
		for ($i=0; $i<$tam; $i++)
		{
			echo "<li>".$array[$i]."</li>";
		}
		echo "</ol>\n";
	}
	else
	{
		echo "<h4>El array está vacío</h4>\n";
	}
}
else
{
	echo "<h4>El archivo aún no existe</option> </h4>\n";
}

?>



<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
 <fieldset>
  <legend>Insertar un elemento</legend>
  <p>Indica el elemento a insertar.</p>
  <div><label>Nuevo elemento</label><input name="nombre" type="text"/></div>
  <input type="submit" name="insertar"/>
 </fieldset>
</form>

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
 <fieldset>
  <legend>Eliminar un elemento por posición</legend>
  <p>Indica la posición del elemento a eliminar.</p>
  <div><label>Posición</label><input name="posicion" type="text"/></div>
  <input type="submit" name="eliminar_posicion"/>
 </fieldset>
</form>

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
 <fieldset>
  <legend>Eliminar un elemento por nombre</legend>
  <p>Indica el nombre del elemento a eliminar.</p>
  <div><label>Elemento</label><input name="nombre" type="text"/></div>
  <input type="submit" name="eliminar_nombre"/>
 </fieldset>
</form>
