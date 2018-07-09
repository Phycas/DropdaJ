<?php
/* Definiendo datos de ingreso para la base de datos*/
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'dropdaj'); //crear esta base de datos
 
/* Aquí va la conexión */
$laDB = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Aquí se revisa si la conexión funciona
if($laDB === false){
    die("ERROR: Algo falló: " . mysqli_connect_error());
}
else{
	//echo 'funciona';
}

?>