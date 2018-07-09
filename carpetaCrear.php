<?php

require_once('conexionDB.php');
ob_start();
$destino = 'error.php';
 session_start();
 $nombre = $_POST['nombre'];
 $id = $_SESSION['usuario_id'];
 $query = "INSERT INTO carpetas (nombre, usuario_id)
 		VALUES(?,?)";

 $stm = mysqli_prepare($laDB, $query);
 
 mysqli_stmt_bind_param($stm, "ss", $nombre, $id);
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