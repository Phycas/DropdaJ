<?php
ob_start(); //agarrar todo
$destino = 'index.php';

//array con nombres de datos faltantes
$kefalta = array();
//chequear que estén todos los datos necesarios
if(empty($_POST['usuario'])){
	$kefalta = 'Usuario';
} else {
	$usuario = trim($_POST['usuario']); 
}

if(empty($_POST['clave'])){
	$kefalta = 'Clave';
} else {
	$clave = trim($_POST['clave']);
}

if(empty($_POST['nombre'])){
	$kefalta = 'Nombre';
} else {
	$nombre = trim($_POST['nombre']);
}

if(empty($_POST['correo'])){
	$kefalta = 'Correo';
} else {
	$correo = trim($_POST['correo']);
}

if(empty($kefalta)){

	require_once('conexionDB.php');
	$query = "INSERT INTO usuarios (nombre, usuario, clave, mail)
				VALUES(?,?,?,?)";

	$stm = mysqli_prepare($laDB, $query);

	mysqli_stmt_bind_param($stm, "ssss", $nombre, $usuario, $clave, $correo);
	mysqli_stmt_execute($stm);

	$affected_rows = mysqli_stmt_affected_rows($stm);
	if($affected_rows == 1){
		$destino = 'index.php?mensaje=Operacion exitosa';
		mysqli_stmt_close($stm);
		mysqli_close($laDB);
	} else {

		$destino = 'index.php?mensaje=Error fatal usted se va a morir!!!!: ' . mysqli_error();
		
	}
} else {
	$destino = 'usuario_registra.php?mensaje=faltaron los siguientes campos: <br>';

	foreach ($kefalta as $estofalta) {
		$destino .= $estofalta . '<br>';
	}
}

while (ob_get_status()) 
{
    ob_end_clean();
}

// aqui va el redireccionamiento
header( "Location: $destino" );

?>






