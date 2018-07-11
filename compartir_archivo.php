<!DOCTYPE html>
<html>
<head>
  <!-- comentario -->
  
  <meta charset="utf-8">
  <title>
    DropdaJ! - Inicio
  </title>
  <link rel="stylesheet" type="text/css" href="static/tuktuk.css">
  <link rel="stylesheet" type="text/css" href="static/tuktuk.theme.default.css">
</head>
<body>
<?php
  $mensaje = '';
  if(!empty($_GET["mensaje"])){
    $mensaje = $_GET["mensaje"];
    }
?>
  
  <?php //La sesion
    require_once('conexionDB.php');
    session_start();
    //print_r($_SESSION);
    if(!empty($_SESSION['usuario_id'])){
      $id = $_SESSION['usuario_id'];
      $query = "SELECT * FROM usuarios WHERE id='$id'";
      $respuesta = @mysqli_query($laDB, $query);
      $usuario = mysqli_fetch_assoc($respuesta);
      $id = $usuario['id'];
      $nick = $usuario['usuario'];
      $clave = $usuario['clave'];
      $correo = $usuario['mail'];
      $nombre = $usuario['nombre'];
 	  $archivo_id = $_GET['id'];
      
    	 //Cerrar conexión
    	//mysqli_close($laDB);
   	}
    ?>
  <!-- Banner de arriba -->
  <header class="bck dark">
    <div class="session on-left inline padding-right">
    <h1><a href="principal.php">DropdaJ!<a></h1>
    </div>
    <div class="session on-left padding-left ">
    <h5><a href="mi_j.php" class="button error">Mi J<a></h5>
    </div>
    <div class="session on-left padding-left">
       <h5><a href="compartido_con.php" class="button error">Compartido conmigo<a></h5>
   <!-- <h4><a href="mi_j.php" class="button error">Compartido conmigo<a></h4> -->
    </div>
    <div class="session on-right padding-right">
      <a href="logout.php">Cerrar Sesión</a>
    </div>
    <div  class="session on-right padding-right">
      <h5 ><?php echo $nick; ?></h5>
    </div>
    
    <div class="clear"></div>
  </header>
  <!-- Fin Banner de arriba -->
  
 


  <div class="row ">
      <div class="column_12">
        <p class="inline on-left"><?php echo $mensaje; ?></p>
      </div>
  </div>
  
  <div class="row">
        <div class="column_12 padding bck light form">
        	<p>Escribe el ID del usuario con el que quieres compartir el archivo</p>
        	<form action="archivoCompartir.php?archivo_id=<?php echo $_GET['id'] ?>" method="post">
        		
        		<input type="text" name="usuario_id" value="ej. juancho_nieve"/>
        		<button type="submit" name="crear">Compartir</button>
        	</form>
        </div>
    </div>
  
</body>
</html>