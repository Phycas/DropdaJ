<?php

require_once('conexionDB.php');
ob_start();
$destino = 'error.php';
	session_start();
	
	$id = $_GET['id'];

	$query = "SELECT id, nombre, tipo, data FROM archivos WHERE id='$id'";
      $respuesta = @mysqli_query($laDB, $query);

    $archivo = mysqli_fetch_assoc($respuesta);
   
   header('Content-Type: ' . $archivo['tipo']);
   echo $archivo['data'];
	?>