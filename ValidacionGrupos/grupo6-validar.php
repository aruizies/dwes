<?php 
function vacio($nom){
	if(empty($nom)){
		return true;
	}
	else{
		return false;
	}
}

function longitudNombre($nom){
	if(strlen($nom) > 3 && strlen($nom)<15){
		return true;
	}
	else{
		return false;
	}
}

function sinNumeros($nom){
	$validar=true;
	for($i=0; $i<strlen($nom) && $validar==true; $i++){
		if(is_numeric($nom[$i])){
			$validar=false;
		}
	}
	if($validar==false){
		return false;
	}
	else{
		return true;
	}
}

function longitudNick($nom){
	if(strlen($nom)>=5 && strlen($nom)<=14){
		return true;
	}
	else{
		return false;
	}
}

function correo($nom){
	if(filter_var($nom, FILTER_VALIDATE_EMAIL)){
		return true;
	}
	else{
		return false;
	}
}
?>