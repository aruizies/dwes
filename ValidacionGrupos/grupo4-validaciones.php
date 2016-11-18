<?php
function validaNombre($valorNombre){
	if (empty($valorNombre)){
		return false; 
	}else {
		$valido=true;
		
		
		for ($i=0;$i<strlen($valorNombre);$i++ ) {
			
			if (is_numeric($valorNombre[$i])&&$valido){
				$valido=false;
			}
		}
		
		if ($valido) {
			return true;
		}
		else return false;
		
	}
}

function validaEdad ($valorEdad){
	
	if (is_numeric($valorEdad)){
		
		if ($valorEdad>100||$valorEdad<10){
			return false;
			
		}else return true;
		
	}else return false;
	
}

function validarGenero($valorGenero){
	
	
	
}


?>