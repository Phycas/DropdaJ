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
  if(!empty($_PORT["mensaje"])){
    $mensaje = $_POST["mensaje"];
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
      //Cerrar conexión
      mysqli_close($laDB);
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
    </div>

    <div  class="session on-right padding-right">
      <h5><a href="logout.php"><?php echo $nick; ?></h5>
    </div>
    
    <div class="clear"></div>
  </header>
  <!-- Fin Banner de arriba -->
  <?php }
  ?>
 


  <div class="row ">
      <div class="column_12">
        <p class="inline on-left"><?php echo $mensaje; ?></p>
      </div>
  </div>
  
  <div class="row bck light">
    <div class="column_12">
      <p >ID: <?php echo $id; ?> </p>
    </div>
  </div>
  <div class="row bck light">
    <div class="column_12">
        <p class="align">Nombre: <?php echo $nombre; ?> </p>
    </div>
  </div>
  <div class="row bck light">
    <div class="column_12">
        <p class="align">Nombre de Usuario: <?php echo $nick; ?> </p>
    </div>
  </div>
  <div class="row bck light">
    <div class="column_12">
        <p class="align">Correo Electrónico: <?php echo $correo; ?> </p>
    </div>
  </div>

  <!-- asd -->
  <!-- <nav data-tuktuk="buttons" class="padding align justify">
    <a href="" class="button error"><i class="fa fa-arrow-left"></i> Volver</a>
  </nav> -->


</body>
</html>