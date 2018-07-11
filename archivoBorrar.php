<?php
	ob_start(); //agarrar todo
	$destino = 'mi_j.php';

	$id = $_GET['id'];

	require_once('conexionDB.php');
	$query = "DELETE FROM archivos
				WHERE id=?";
	$stm = mysqli_prepare($laDB, $query);
	mysqli_stmt_bind_param($stm, "s", $id);
	mysqli_stmt_execute($stm);

	//cerrar conexión
	mysqli_stmt_close($stm);
	mysqli_close($laDB);


	while (ob_get_status()){
    	ob_end_clean();
	}

	// aqui va el redireccionamiento
	header( "Location: $destino" );

?>