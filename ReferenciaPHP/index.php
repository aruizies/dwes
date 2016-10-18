<html>
<head>
<meta charset="utf-8">
<title>Referencia PHP</title>
</head>
<body>
<?php
echo "<h1>Referencia PHP</h1>";

# Los comentarios de l�nea pueden empezar por // o por #
$nombre = "Alberto"; // no hay que especificar tipo de datos
echo "<h3>Mi nombre es $nombre</h3>"; 
/*
 Esto es un comentario de bloque.
 Las funciones en PHP no son sensibles a las may�sculas:
  > ECHO es lo mismo que echo
 Las variables s� lo son:
  > nombre no es lo mismo que Nombre
*/



echo "<h3>Probamos con $nombre el comportamiento de echo<h3>\n";
echo '<h3>Probamos con $nombre el comportamiento de echo</h3>\n';


echo "<h3>" . "Probamos con " . $nombre . "el comportamiento de echo</h3>";
echo "<h3>","Probamos con ",$nombre,"el comportamiento de echo</h3>";


$salario_base=2000;
$salario_juan=&$salario_base; /*apuntan a la misma posici�n de memoria*/
$subida_ipc=2;
$salario_base=$salario_base*(100+$subida_ipc)/100;
//Ahora el salario base es 2040
//El salario de Juan se actualiza autom�ticamente
$incentivo_juan=5;
$salario_juan=$salario_juan*(100+$incentivo_juan)/100;
/*Ahora el salario de Juan es 2142*/
//$salario_base y $salario_pepe son referencias a una misma posici�n de memoria

$cadena='Esto es una prueba.';
$primer=$cadena{0}; // E
$ultimo=$cadena{strlen($cadena)-1}; // .

/*
# Primera forma
$ciclos = array("SMR","ASIR","DAW");
# Segunda forma
$ciclos = array(0=>"SMR",1=>"ASIR",4=>"DAW");
#Tercera forma
$ciclos[0] = "SMR";
$ciclos[1] = "ASIR";
$ciclos[4] = "DAW";
echo "<p>El tamaño en los tres casos es igual: ".sizeof($ciclos)."</p>";

echo "<h1>".sizeof($ciclos)."</h1>";
echo "<h1>".count($ciclos)."</h1>";

//var_dump($ciclos);
//print_r($ciclos);

// Primera forma
$capitales = array("España"=>"Madrid","Portugal"=>"Lisboa","Francia"=>"París");

echo "<ul>";
foreach($capitales as $capital) {
	echo "<li>$capital</li>";
}
echo "</ul>";
echo "<ul>";
foreach($capitales as $pais => $capital) {
	echo "<li>La capital de $pais es $capital</li>";
}
echo "</ul>";

*/
/*
function suma($a, $b): float {
	$resultado = $a + $b;
	return "no permitido";
}
echo "<p>5 y 10 son ".suma(5,10)."</p>";
*/

$descuento = 5;
/*
function precio($coste)
{
	global $descuento;
	$total = $coste - $coste * ($descuento/100);
	return $total;
}*/
echo "<h4>El precio del producto en rebajas es de ".precio(100)."</h4>";



function precio($coste)
{
	$total = $coste - $coste * ($GLOBALS["descuento"]/100);
	return $total;
}


echo "<h3>Hoy es ".date("d-m-y")." y son las ".date("h:i")."</h3>";


define("PROFESOR", "Alberto Ruiz");

echo "<p>El profesor es ".PROFESOR."</p>";
echo "<p>El profesor es ".Profesor."</p>";

define("AULA", 104, true);

echo "<p>Da clase en el aula ".Aula."</p>";


$x = '';
if (isset($x)) {
	echo "<h4>La variable \$x tiene el valor $x</h4>";
}
$y = NULL;
if (!isset($y)) {
	echo "<h4>La variable \$y no tiene valor</h4>";
}











$a = 10;
 
/*
// Segunda forma
$horas["DWES"]=9;
$horas["DAW"]=4;
$horas["EIE"]=3;
# Impresión del contenido
var_dump($capitales);
echo "<br/>";
print_r($ciclos);



for ($i=0; $i<sizeof($ciclos); $i++)
{
	echo "<li>$ciclos[$i]</li>";
}
*/

/*
echo "<ul>";
foreach ($ciclos as $actual) {
	echo "<li>$actual</li>";
}
echo "</ul>";

for ($x = 0; $x <= 5; $x++) {
	echo "<p>Contando hasta 5: vamos por $x</p>";
}


*/

/*

if($a > $b):
	echo $a." es mayor que ".$b;
elseif($a == $b): 
	echo $a." es igual a ".$b;
else:
	echo $a." es menor que ".$b;
endif;

if($a > $b) {
	echo $a." es mayor que ".$b;
}
elseif($a == $b) {
	echo $a." es igual a ".$b;
}
else {
	echo $a." es menor que ".$b;
}
*/


?>
</body>
</html>


<html>
<body>

<form action="bienvenida.php" method="post">
Nombre: <input type="text" name="nombre">
Edad: <input type="text" name="edad">
<input type="submit">
</form>

</body>
</html>



<?php 
echo $_SERVER['PHP_SELF'];
echo "<br>";
echo $_SERVER['SERVER_NAME'];
echo "<br>";
echo $_SERVER['HTTP_HOST'];
echo "<br>";
echo $_SERVER['HTTP_USER_AGENT'];
echo "<br>";
echo $_SERVER['SCRIPT_NAME'];
?>




