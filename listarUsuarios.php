
<?php

// Aquí va la conexión
require_once('conexionDB.php');

// Aquí va una query
$query = "SELECT * FROM usuarios";

$respuesta = @mysqli_query($laDB, $query);



foreach($respuesta as $usuario) {
	echo $usuario['id'] .
	' - ' .
	$usuario['nombre'] . 
	' - ' .
	$usuario['usuario'] .
	' - ' .
	$usuario['mail'] .
	'<br>';
}
/*
while($usuario = mysqli_fetch_array($respuesta)){
$usuario['nombre'];
}
*/

//Cerrar conexión
mysqli_close($laDB);


?>