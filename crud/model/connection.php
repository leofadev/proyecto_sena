<?php
//Este codigo realiza la conexion a la base de datos MySQL

	require ("constantes.php");
	$con = new mysqli (server,user,pw,bd);
	//  if ($con){
	// 	echo "conexion exitosa a la base de datos";
	//  }else{
	// 	echo "no se ha podido conectar a la base de datos";
	//  }

?>