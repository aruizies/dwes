<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"/></head>
<body>

<?php
//Leer rápidamente todos los caracteres del archivo

//$rutaArchivo = "files/modulos.txt";

/*
echo readfile($rutaArchivo);
^*/


 // Leer las líneas del archivo a un array
/*
$lineasArchivo = file($rutaArchivo);
print_r($lineasArchivo);
*/


 //Mostrar todo el archivo sin separación de líneas
 /*
 $archivo = fopen($rutaArchivo, "r") or die("Imposible abrir el archivo");
 echo fread($archivo,filesize($rutaArchivo));
 fclose($archivo);
*/
 


 //Mostrar todas las líneas del archivo
/*
$archivo = fopen($rutaArchivo, "r") or die("Imposible abrir el archivo");
while(!feof($archivo)) {
	echo fgets($archivo) . "<br/>";
}
fclose($archivo);
*/

 		
// Leer carácter a carácter, detectando fin de línea
/*
$archivo = fopen($rutaArchivo, "r") or die("Imposible abrir el archivo");
while(!feof($archivo)) {
	$c = fgetc($archivo);
	if (($c == "\n") or ($c == "\r\n")) echo "<br/>";
	else echo $c;
}
fclose($archivo);
*/


//http://www.w3schools.com/php/php_ref_filesystem.asp
//http://php.net/manual/es/ref.filesystem.php

/*
$archivo = fopen($rutaArchivo, "a") or die("Imposible abrir el archivo para escritura");
fwrite($archivo,"Lenguajes de marcas\n");
fwrite($archivo,"Entornos de desarrollo\n");
fclose($archivo);

$archivo = fopen($rutaArchivo, "r") or die("Imposible abrir el archivo");
while(!feof($archivo)) {
	echo fgets($archivo) . "<br/>";
}
fclose($archivo);
*/

/*
$archivo = fopen("files/nuevo.txt", "w") or die("Imposible abrir el archivo para escritura");
fwrite($archivo,"Lenguajes de marcas\n");
fwrite($archivo,"Entornos de desarrollo\n");
fclose($archivo);
*/

/*
$rutaArchivo = "files/nuevo.txt";
fopen($rutaArchivo, "w") or die("Imposible abrir el archivo para escritura");
*/


//unlink($rutaArchivo);


if (!unlink($rutaArchivo))
	echo ("Imposible eliminar el archivo $rutaArchivo");
else
	echo ("Eliminado archivo $rutaArchivo");


?>

</body>
</html>