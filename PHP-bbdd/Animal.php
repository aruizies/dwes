<?php 
class Animal {

	function __toString() {
		return "Animal de chip ".$this->chipX.", nombre ".$this->nombre.", especie ".$this->tipo." e imagen ".$this->imagen;
	}


	private $chipX;
	private $nombre;
	private $tipo;
	private $imagen;
	
	
	public function getChip() {
		return $this->$chip;
	}
	public function setChip($chip) 	{
		$this->chip= $chip;
	}

}
?>