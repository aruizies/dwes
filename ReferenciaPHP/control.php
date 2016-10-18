<html>
<head>
<title>Estructuras de control de flujo</title>
<meta name="author" content="Alberto Ruiz"/>
<style>
label {
	width: 25%;
	float: left;
}
input[type=submit]
{
	float:right;
}
fieldset
{
	width:20em;
}
div#solucion
{
	color:blue;
	padding:0em 0em 1em 1em;
	border: solid 2px red;
}
table.tabla10
{
	border: 1px solid black;
	text-align: center;
}
table.tabla10 td
{
	padding: 0.5em;
	border: 1px solid black;
}
table.tabla10 tr.par
{
	background: lightblue;
}

</style>
</head>
<body>
<h1>Estructuras de control de flujo</h1>

<?php
// Ejercicio 1
/* Pedir al usuario dos números A y B entre el 1 y el 10. Escribir en pantalla tantos asteriscos como diferencia haya entre los números (resolviéndolo con while, mientras uno sea menor que otro se escribe asterisco) y repetir con almohadillas (resolviéndolo con for utilizando la diferencia entre a y b como número de repeticiones).*/
if (isset($_POST['ecf-diferencia']))
{
	echo "<div id='solucion'><h2>ecf-diferencia</h2>";
	$a=$_POST['a'];
	$b=$_POST['b'];
	if ($a > $b)
	{
		$mayor = $a;
		$menor = $b;
	}
	else
	{
		$mayor = $b;
		$menor = $a;
	}
	$diferencia = $mayor-$menor;
	// solución con while
	while ($menor < $mayor)
	{
		echo "*";
		$menor++;
	}
	echo "<br/>";
	// solución con for
	for ($i=0; $i<$diferencia; $i++)
	{
		echo "#";
	}
	echo "</div>";
}
// Ejercicio 2
/* Pedir un número X y calcular la suma de los X primeros números naturales (1 + 2 + 3 + …).*/
else if (isset($_POST['ecf-suma']))
{
	echo "<div id='solucion'><h2>ecf-suma</h2>";
	$suma=0;
	$i=1;
	$limite = $_POST['x'];
	while($i<=$limite)
	{
		$suma+=$i;
		echo ($i==$limite) ? "$i = " : "$i+";
		$i++;
	}
	echo "$suma";
	echo "</div>";
}
// Ejercicio 3
/* Pedir dos números A y B y calcular la potencia A elevado a B utilizando iteraciones (no una función matemática predefinida).*/
else if (isset($_POST['ecf-potencia']))
{
	echo "<div id='solucion'><h2>ecf-potencia</h2>";
	$base=$_POST['a'];
	$exponente=$_POST['b'];
	$resultado=1;
	for($i=1;$i<=$exponente;$i++)
	{
		$resultado*=$base;
	}
	echo "$base<SUP>$exponente</SUP> = ";
	echo "$resultado";
	echo "</div>";
}
// Ejercicio 4
/* Pedir un número X y calcular su factorial utilizando iteraciones. */
else if (isset($_POST['ecf-factorial']))
{
	echo "<div id='solucion'><h2>ecf-factorial</h2>";
	$numero=$_POST['x'];
	$factorial=1;
	echo $numero."! = ";
	for($i=$numero; $i>=1; $i--)
	{
		$factorial*=$i;
	}
	echo "$factorial";
	echo "</div>";
}
// Ejercicio 5
/* Pedir un número X y mostrar su tabla de multiplicar. */
else if (isset($_POST['ecf-multiplicacion']))
{
	echo "<div id='solucion'><h2>ecf-multiplicacion</h2>";
	define ("N",10);
	$x=$_POST['x'];
	for ($i=1;$i<=N;$i++)
	{
		$actual=$i*$x;
		echo "$i * $x = $actual <br/>";
	}
	echo "</div>";
}
// Ejercicio 6
/* Pedir una cadena de texto y mostrarla varias veces: en cada línea se mostrará un carácter menos que en la anterior. Sólo se puede usar una función de strings: “strlen()” */
else if (isset($_POST['ecf-recorte']))
{
	echo "<div id='solucion'><h2>ecf-recorte</h2>";
	$cadena = $_POST['cadena'];
	$tamaño = strlen($cadena);
	for ($i=0;$i<$tamaño;$i++)
	{
		for ($j=0;$j<$tamaño-$i;$j++)
		{
			echo $cadena[$j];
		}
		echo "<br/>";
	}
	echo "</div>";
}
// Ejercicio 7

/*Habrá que comprobar si el valor leído corresponde al número de un mes (de 1 a 12) o a su nombre (“enero”, “febrero”). Si es así se mostrará el número de días que tiene ese mes, y si no es así se mostrará un error. Nota: para comparar String, buscar referencia de las funciones strcmp y strrcasecmp*/
else if (isset($_POST['ecf-meses']))
{
	echo "<div id='solucion'><h2>ecf-meses</h2>";
	$mes = $_POST['mes'];
	if (is_numeric($mes))
	{
		switch($mes)
		{
			case 1: case 3: case 5: case 7: case 8: case 10: case 12:
				echo "<p>El mes $mes tiene 31 días";
				break;
			case 2:
				echo ($_POST['bisiesto']=="si") ? "<p>El mes 2 tiene 29 días</p>" : "<p>El mes 2 tiene 28 días</p>";
				break;
			case 4: case 6: case 9: case 11:
				echo "<p>El mes $mes tiene 30 días";
				break;
			default:
				echo "<p>ERROR: El número introducido no se corresponde con ningún mes</p>";
		}
	}
	else
	{
		if ( (strcasecmp($mes, "enero") == 0) || (strcasecmp($mes, "marzo") == 0) ||
			 (strcasecmp($mes, "mayo") == 0) || (strcasecmp($mes, "julio") == 0) ||
			 (strcasecmp($mes, "agosto") == 0) || (strcasecmp($mes, "octubre") == 0) ||
			 (strcasecmp($mes, "diciembre") == 0) )
		{
			echo "<p>El mes $mes tiene 31 días";
		}
		elseif ( (strcasecmp($mes, "febrero") == 0) )
		{
			echo ($_POST['bisiesto']=="si") ? "<p>El mes 2 tiene 29 días</p>" : "<p>El mes 2 tiene 28 días</p>";
		}
		elseif ( (strcasecmp($mes, "abril") == 0) || (strcasecmp($mes, "junio") == 0) ||
			 (strcasecmp($mes, "septiembre") == 0) || (strcasecmp($mes, "noviembre") == 0) )
		{
			echo "<p>El mes $mes tiene 30 días";
		}
		else
		{
			echo "<p>ERROR: El texto introducido no se corresponde con ningún mes</p>";
		}
	}
	echo "</div>";
}
// Ejercicio 8
/* Ir pidiendo por formulario una serie de números enteros (de uno en uno) e irlos sumando. Se deja de pedir números al usuario cuando la cantidad supera el valor 50. Escribir entonces la suma de todos los números introducidos.*/
else if (isset($_POST['ecf-acumulacion']))
{
	// Observa el formulario para ver cómo se pasa el valor acumulado
	echo "<div id='solucion'><h2>ecf-acumulacion</h2>";
	$acumulado = $_POST['acumulado'] + $_POST['n'];
	if ($acumulado > 50)
	{
		echo "Suma total: $acumulado";
	}
	else
	{
		echo "Aún no se ha llegado a 50...";
	}
	echo "</div>";
}
// Ejercicio 9
/* Mostrar en pantalla los múltiplos de 3 y 5 entre el 1 y el 1000. A continuación mostrar en pantalla los 20 primeros múltiplos de 3 y 5. */
else if (isset($_POST['ecf-multiplos']))
{
	echo "<div id='solucion'><h2>ecf-multiplos</h2>";
	echo "<h4>Múltiplos de 3 y 5 entre 1 y 1000:</h4>";
	for($i=1; $i<1000; $i++)
	{
		if (($i%3 == 0) && ($i%5 == 0))
		{
			echo "$i ";
		}
	}
	echo "<h4>20 primeros múltiplos de 3 y 5:</h4>";
	$multiplos=0;
	$i=1;
	while($multiplos<20)
	{
		if (($i%3 == 0) && ($i%5 == 0))
		{
			echo "$i ";
			$multiplos++;
		}
		$i++;
	}
	echo "</div>";
}
// Ejercicio 10
/* Pedir un número X y generar un cuadrado de tabla de X filas y X columnas con filas de colores alternos. */
else if (isset($_POST['ecf-cuadrado']))
{
	$x = $_POST['x'];
	echo "<div id='solucion'><h2>ecf-cuadrado</h2>";
	echo "<table class='tabla10'>";
	for($fila=1; $fila<=$x; $fila++)
	{
		echo ($fila %2 ==0) ? "<tr class='par'>" : "<tr>" ;
		for( $col=1; $col<=$x ;$col++)
		{
			echo "<td>".($fila*$col)."</td>";
		}
		echo "</tr>";
	}
	echo "</table>";
	echo "</div>";
}
?>
 
<h2>Ejercicio 1</h2>
<p>Pedir al usuario dos números A y B entre el 1 y el 10. Escribir en pantalla tantos asteriscos como diferencia haya entre los números (resolviéndolo con while, mientras uno sea menor que otro se escribe asterisco) y repetir con almohadillas (resolviéndolo con for utilizando la diferencia entre a y b como número de repeticiones).</p>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
 <fieldset>
  <legend>ecf-diferencia</legend>
  <div><label>A</label><input name="a" type="text"/></div>
  <div><label>B</label><input name="b" type="text"/></div>
  <input type="submit" name="ecf-diferencia"/>
 </fieldset>
</form>

<h2>Ejercicio 2</h2>
<p>Pedir un número X y calcular la suma de los X primeros números naturales (1 + 2 + 3 + …).</p>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
 <fieldset>
  <legend>ecf-suma</legend>
  <div><label>X</label><input name="x" type="text"/></div>
  <input type="submit" name="ecf-suma"/>
 </fieldset>
</form>

<h2>Ejercicio 3</h2>
<p>Pedir dos números A y B y calcular la potencia A elevado a B utilizando iteraciones (no una función matemática predefinida).</p>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
 <fieldset>
  <legend>ecf-potencia</legend>
  <div><label>A</label><input name="a" type="text"/></div>
  <div><label>B</label><input name="b" type="text"/></div>
  <input type="submit" name="ecf-potencia"/>
 </fieldset>
</form>

<h2>Ejercicio 4</h2>
<p>Pedir un número X y calcular su factorial utilizando iteraciones.</p>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
 <fieldset>
  <legend>ecf-factorial</legend>
  <div><label>X</label><input name="x" type="text"/></div>
  <input type="submit" name="ecf-factorial"/>
 </fieldset>
</form>

<h2>Ejercicio 5</h2>
<p>Pedir un número X y mostrar su tabla de multiplicar.</p>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
 <fieldset>
  <legend>ecf-multiplicacion</legend>
  <div><label>X</label><input name="x" type="text"/></div>
  <input type="submit" name="ecf-multiplicacion"/>
 </fieldset>
</form>

<h2>Ejercicio 6</h2>
<p>Pedir una cadena de texto y mostrarla varias veces: en cada línea se mostrará un carácter menos que en la anterior. Sólo se puede usar una función de strings: “strlen()”</p>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
 <fieldset>
  <legend>ecf-recorte</legend>
  <div><label>Cadena</label><input name="cadena" type="text"/></div>
  <input type="submit" name="ecf-recorte"/>
 </fieldset>
</form>

<h2>Ejercicio 7</h2>
<p>En un formulario se recogerá un valor en un cuadro de texto y un radio group para indicar si el año actual es bisiesto o no. Habrá que comprobar si el valor leído corresponde al número de un mes (de 1 a 12) o a su nombre (“enero”, “febrero”). Si es así se mostrará el número de días que tiene ese mes, y si no es así se mostrará un error. Nota: para comparar String, buscar referencia de las funciones strcmp y strrcasecmp. </p>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
 <fieldset>
  <legend>ecf-meses</legend>
  <div><label>Mes</label><input name="mes" type="text"/></div>
  <div><label>Año bisiesto</label>
		<input name="bisiesto" type="radio" value="no" checked="true"/> No 
		<input name="bisiesto" type="radio" value="si"/> Sí 
  </div>
  <input type="submit" name="ecf-meses"/>
 </fieldset>
</form>

<h2>Ejercicio 8</h2>
<p>Ir pidiendo por formulario una serie de números enteros (de uno en uno) e irlos sumando. Se deja de pedir números al usuario cuando la cantidad supera  el valor 50. Escribir entonces la suma de todos los números introducidos.</p>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
 <fieldset>
  <legend>ecf-acumulaci&oacute;n</legend>
  <div><label>Número:</label><input name="n" type="text"/></div>
  <input type="hidden" name="acumulado" value="<?php echo (isset($acumulado)) ? $acumulado : 0;?>"/>
  <input type="submit" name="ecf-acumulacion"/>
 </fieldset>
</form>

<h2>Ejercicio 9</h2>
<p>Mostrar en pantalla los múltiplos de 3 y 5 entre el 1 y el 1000. A continuación mostrar en pantalla los 20 primeros múltiplos de 3 y 5.</p>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
 <fieldset>
  <legend>ecf-m&uacute;ltiplos</legend>
  <input type="submit" name="ecf-multiplos"/>
 </fieldset>
</form>

<h2>Ejercicio 10</h2>
<p>Pedir un número X y generar un cuadrado de tabla de X filas y X columnas con filas de colores alternos.</p>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
 <fieldset>
  <legend>ecf-cuadrado</legend>
  <div><label>X</label><input name="x" type="text"/></div>
  <input type="submit" name="ecf-cuadrado"/>
 </fieldset>
</form>


</body>
</html>