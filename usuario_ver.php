<?php
$id = $_POST['id'];
// Aquí va la conexión
require_once('conexionDB.php');

// Aquí va una query
$query = "SELECT * FROM usuarios WHERE id='$id'";

$respuesta = @mysqli_query($laDB, $query);

$usuario = mysqli_fetch_assoc($respuesta);
echo $usuario['nombre'] . 
	'<br>' .
	$usuario['id'];

//Cerrar conexión
mysqli_close($laDB);
?>