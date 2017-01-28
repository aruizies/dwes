<?php 
class Animal {

	private $chip;
	private $nombre;
	private $especie;
	private $imagen;
	
	function __toString() {
		return "Animal de chip ".$this->chip.", nombre ".$this->nombre.", especie ".$this->especie." e imagen ".$this->imagen;
	}
/*
	function __construct($chip,$nombre,$especie,$imagen) {
		$this->chipX= $chip;
		$this->nombre=$nombre;
		$this->especie=$especie;
		$this->imagen=$imagen;
	}
	*/
	
	public function getChip() {
		return $this->chip;
	}
	public function getNombre() {
		return $this->nombre;
	}
	public function getEspecie() {
		return $this->especie;
	}
	public function getImagen() {
		return $this->imagen;
	}
	

}
?>