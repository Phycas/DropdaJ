<?php

require_once('conexionDB.php');
ob_start();
$destino = 'error.php';
	session_start();
	$nombre = $_FILES['archivo']['name'];
	$tipo = $_FILES['archivo']['type'];
	$data = file_get_contents($_FILES['archivo']['tmp_name']);
	$id = $_SESSION['usuario_id'];

	if(empty($_GET['carpeta_id'])){
	$query = "INSERT INTO archivos (nombre, tipo, data, usuario_id)
			VALUES(?,?,?,?)";

	$stm = mysqli_prepare($laDB, $query);
	
	mysqli_stmt_bind_param($stm, "ssss", $nombre, $tipo, $data, $id);
	} else {
		$carpeta_id = $_GET['carpeta_id'];
		$query = "INSERT INTO archivos (nombre, tipo, data, usuario_id, carpeta_id)
			VALUES(?,?,?,?,?)";

		$stm = mysqli_prepare($laDB, $query);
		
		mysqli_stmt_bind_param($stm, "sssss", $nombre, $tipo, $data, $id, $carpeta_id);
	}
	mysqli_stmt_execute($stm);

	mysqli_stmt_close($stm);
	mysqli_close($laDB);
$destino = 'mi_j.php';

while (ob_get_status()) 
{
    ob_end_clean();
}

// aqui va el redireccionamiento
header( "Location: $destino" );

?>