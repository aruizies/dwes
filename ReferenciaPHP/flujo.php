<html>
<head>
<meta charset="utf-8">
<title>Referencia PHP</title>
</head>
<body>
<?php

$cadena = "perro";
$tamaño = strlen($cadena);
for ($i=0;$i<$tamaño;$i++)
{
	for ($j=0;$j<$tamaño-$i;$j++)
	{
		echo $cadena[$j];
	}
	echo "<br/>";
}


echo "<h1>Pruebas flujo</h1>";

$num1 = 2;
$bi = "true";
switch($num1)
{
	case 1:
	case 3: 
	case 5:
		echo "<h2>31 días</h2>";
		break;
	case 2:
		if ($bi)
		echo "<h2>28 días</h2>";
		break;
	case 4: 
	case 6: 
		echo "<h2>30 días</h2>";
		break;
	default:
		echo "<h2>Error</h2>";

}

?>
</body>
</html>