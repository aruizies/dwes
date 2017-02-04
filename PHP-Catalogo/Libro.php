<?php
class Libro {

	function __toString() {
		return "Libro: id".$this->id.", título ".$this->titulo.", idAutor ".$this->idAutor.", año ".$this->año.", editorial".$this->editorial.", imagen ".$this->imagen;
	}

	private $id;
	private $titulo;
	private $idAutor;
	private $año;
	private $editorial;
	private $imagen;

	public function getId() {
		return $this->id;
	}
	public function getIdAutor() {
		return $this->idAutor;
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