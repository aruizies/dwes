<?php




class Triangulo {

	function __construct() {
		//print "<p>Instanciando triángulo</p>";
		/* Podríamos dar valores a los atributos (propiedades)
		   por ejemplo a partir de campos de $_POST */
	}
	
	function __destruct() {
		//print "<p>Destruyendo triángulo</p>";
		/* Se podrían cerrar conexiones a BBDD */
	}
	
	function __toString() {
		return "Triángulo de base ".$this->base." y altura ".$this->altura;
	}
	
	
	public $base;
	private $altura;

	public function getAltura() {
		return $this->altura;
	}

	public function setAltura($altura) 	{
		$this->altura = $altura;
	}

	public function calcularArea()	{
		return $this->base * $this->altura / 2;
	}
}

$tri1 = new Triangulo();
$tri1->base = 10.5;
$tri1->setAltura(5.3);
echo "<p>Área: ".$tri1->calcularArea()."</p>";
//$tri1->altura = 30;

echo "<p>".$tri1."</p>";



?>
