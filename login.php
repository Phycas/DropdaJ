<?php
ob_start(); //agarrar todo
// $destino = 'index.php';
// Start the session
session_start();

//array con nombres de datos faltantes
$keFalta = array();
$destino = '';
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

if(empty($kefalta)){
  require_once('conexionDB.php');
  $query = "SELECT usuarioLogin('$usuario','$clave') AS esValido"; //el script para esta funcion está dentro de la carpeta querys
  $respuesta = @mysqli_query($laDB, $query);
  $existe = mysqli_fetch_assoc($respuesta);
  if($existe['esValido'] != 0){
    $query = "SELECT id FROM usuarios WHERE usuario = '$usuario'";
    $respuesta = @mysqli_query($laDB, $query);
    $id = mysqli_fetch_assoc($respuesta);
    $_SESSION['usuario_id'] = $id['id'];
    //echo $_SESSION['usuario_id'];
    //echo 'existe';
    $destino = "principal.php";
    mysqli_close($laDB);
  } else {
    $destino = 'index.php?mensaje=Usuario o clave inválida';
    //echo $_SESSION['usuario_id'];
    mysqli_close($laDB);
  }
} else {
  //echo 'Falta aglo';
  $destino = 'index.php?mensaje=Porfavor complete todos los campos';
  mysqli_close($laDB);
}

while (ob_get_status()) 
{
ob_end_clean();
}

// aqui va el redireccionamiento
header( "Location: $destino" );

  ?>






