<?php

ob_start();
    session_start();

$_SESSION['usuario_id'] = '';
$_SESSION['usuario'] = '';
$_SESSION['clave'] = '';

$destino = 'index.php';

while (ob_get_status()) 
{
    ob_end_clean();
}

// aqui va el redireccionamiento
header( "Location: $destino" );

?>