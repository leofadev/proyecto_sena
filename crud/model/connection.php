<!-- Este codigo realiza la conexion a la base de datos MySQL -->
<?php
	require ("constantes.php");
	$con = new mysqli (server,user,pw,bd);
	if (!$con){
		die ('Error en conexion'.mysqli_error());
	}

?>