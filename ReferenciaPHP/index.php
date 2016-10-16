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


/*
echo "<h3>Probamos con $nombre el comportamiento de echo<h3>\n";
echo '<h3>Probamos con $nombre el comportamiento de echo</h3>\n';
*/

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


echo "<ul>";
$ciclos = array("SMR","ASIR","DAW");
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




