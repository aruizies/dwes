<html>
<head>
<meta charset="utf-8">
<title>Referencia PHP</title>
</head>
<body>

<?php

echo "<h1>Referencia PHP</h1>";

$cadena='Esto es una prueba.';
echo "<p>El texto '$cadena' contiene ".strlen($cadena)." caracteres</p>";


echo "<h3>Primer carácter: ".$cadena[0]."</h3>"; 
echo "<h3>Último carácter: ".$cadena[strlen($cadena)-1]."</h3>";


echo $cadena;


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

$a = 4;
$b = 5;
$a .= $b;
echo "<h1>$a</h1>";


$a = $b; 
$a += $b; // $a = $a + $b
$a -= $b; // $a = $a - $b
$a *= $b; // $a = $a * $b
$a /= $b; // $a = $a / $b
$a .= $b; // $a = $a unido a $b (concatenación)





echo "<h3>Probamos con $nombre el comportamiento de echo</h3>\n";
echo '<h3>Probamos con $nombre el comportamiento de echo</h3>\n';


echo "<h3>" . "Probamos con " . $nombre . "el comportamiento de echo</h3>";
echo "<h3>","Probamos con ",$nombre,"el comportamiento de echo</h3>";


$salario_base=1000;
$salario_juan = &$salario_base;
$salario_ana = &$salario_base;

$complemento_ana = 400;
$salario_ana = $salario_ana + 400;

echo "<p>Salario actual de Juan: $salario_juan</p>"; // 1000
echo "<p>Salario actual de Ana: $salario_ana</p>";   // 1400

$salario_base += 100; 

// Los salarios se actualizan automáticamente:
echo "<p>Salario actual de Juan: $salario_juan</p>"; // 1100
echo "<p>Salario actual de Ana: $salario_ana</p>";   // 1500

/* Salario actual de Juan: 1400
 * Salario actual de Ana: 1650
 */


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
echo "<p>Salario actual de Juan: $salario_juan</p>"; 


$ciclos = array("SMR","ASIR","DAW");
echo "<p>".var_dump($ciclos)."</p>";
echo "<p>".print_r($ciclos)."</p>";


/*
# Primera forma
$ciclos = array("SMR","ASIR","DAW");
# Segunda forma
$ciclos = array(0=>"SMR",1=>"ASIR",4=>"DAW");
*/
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
	// En $pais tengo la clave
	// En $capital tengo el valor
	echo "<li>La capital de $pais es $capital</li>";
}
echo "</ul>";






function suma($a, $b, $imprimir=true) {
	$resultado = $a + $b;
	if ($imprimir==true) 
		echo "<p>Resultado: $resultado</p>";
}

suma(45,65);       // se imprime
suma(64,34,false); // no se imprime


echo "<p>5 y 10 son ".suma(5,10)."</p>";







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


$x = 7;
if (isset($x)) {
	echo "<h4>La variable \$x tiene el valor $x</h4>";
}
$y = ''; // se considera que está definida aunque no contenga nada
if (isset($y)) {
	echo "<h4>La variable \$y tiene el valor $y</h4>";
}
$z = NULL;
if (!isset($z)) {
	echo "<h4>La variable \$z no tiene valor</h4>";
}
if (!isset($noexiste)) {
	echo "<h4>La variable \$noexiste no tiene valor</h4>";
}











$a = 10;
 
// Primera forma
$capitales = array("España"=>"Madrid","Portugal"=>"Lisboa","Francia"=>"París");
// Segunda forma

$horas["DWES"]=9;
$horas["DAW"]=4;
$horas["EIE"]=3;
foreach($horas as $clave => $valor) {
	echo "<li>Módulo: $clave. Horas: $valor</li>";
}


for ($i=0; $i<sizeof($ciclos); $i++)
{
	echo "<li>$ciclos[$i]</li>";
}



echo "<ul>";
foreach ($ciclos as $actual) {
	echo "<li>$actual</li>";
}
echo "</ul>";


for ($x = 0; $x <= 5; $x++) {
	echo "<p>Contando hasta 5: vamos por $x</p>";
}




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



<?php include 'pie.php';?>
</body>
</html>
