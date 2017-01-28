<?php
class Libro {

	function __toString() {
		return "Libro: id".$this->id.", título ".$this->titulo.", autor ".$this->autor.", año ".$this->año.", editorial".$this->editorial.", imagen ".$this->imagen;
	}

	private $id;
	private $titulo;
	private $autor;
	private $año;
	private $editorial;
	private $imagen;

	public function getId() {
		return $this->id;
	}
	public function getAutor() {
		return $this->autor;
	}
	public function getTitulo() {
		return $this->titulo;
	}
	public function getAño() {
		return $this->año;
	}
	public function getImagen() {
		return $this->imagen;
	}
	public function getEditorial() {
		return $this->editorial;
	}
	
}


?>