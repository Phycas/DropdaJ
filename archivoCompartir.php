<?php
ob_start(); //agarrar todo
require_once('conexionDB.php');
$destino = 'index.php';
$archivo_id = $_GET['archivo_id'];
$id = $_SESSION['usuario_id'];
//usuario
$query = "SELECT * FROM usuarios WHERE id='$id'";
$respuesta = @mysqli_query($laDB, $query);
$usuario = mysqli_fetch_assoc($respuesta);
$id = $usuario['id'];
$nick = $usuario['usuario'];
$clave = $usuario['clave'];
$correo = $usuario['mail'];
$nombre_usuario = $usuario['nombre'];
//array con nombres de datos faltantes
$kefalta = array();
//chequear que estén todos los datos necesarios

if(empty($_POST['usuario_id'])){
	$kefalta = 'Nombre';
} else {
	$destinatario_id = trim($_POST['usuario_id']);
}

if(empty($kefalta)){

	require_once('conexionDB.php');
	$query = "INSERT INTO compartidos (archivo_id, dueno_id, destinatario_id)
				VALUES(?,?,?)";

	$stm = mysqli_prepare($laDB, $query);

	mysqli_stmt_bind_param($stm, "sss", $archivo_id, $id, $destinatario_id);
	mysqli_stmt_execute($stm);

	$affected_rows = mysqli_stmt_affected_rows($stm);
	if($affected_rows == 1){
		$destino = 'mi_j.php?mensaje=Operacion exitosa';
		mysqli_stmt_close($stm);
		mysqli_close($laDB);
	} else {

		$destino = "mi_j.php?mensaje=Error fatal usted se va a morir!!!!: " . mysqli_error();
		
	}
} else {
	$destino = 'mi_j.php?mensaje=faltaron los siguientes campos: <br>';

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






