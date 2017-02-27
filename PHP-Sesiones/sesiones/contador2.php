<?php
if (session_status () == PHP_SESSION_NONE)
	session_start ();
if (isset ( $_SESSION ['contador'] ))
	$_SESSION ['contador'] += 1;
else
	$_SESSION ['contador'] = 1;
$mensaje = "Has visitado esta página " . $_SESSION ['contador'] . " veces en esta sesión.";

?>
