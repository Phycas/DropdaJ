<!DOCTYPE html>
<html>
<head>
	<!-- comentario -->
  
	<meta charset="utf-8">
	<title>
		DropDaJ!
	</title>
	<link rel="stylesheet" type="text/css" href="static/tuktuk.css">
	<link rel="stylesheet" type="text/css" href="static/tuktuk.theme.default.css">
	
	
</head>
<body>
  <?php
  ob_start();
    $mensaje = '';
    if(!empty($_GET["mensaje"])){
      $mensaje = $_GET["mensaje"];
    }
     //TODO: usar esto para saltar login 
    session_start();
    if($_SESSION['usuario_id'] != ''){
    
    while (ob_get_status()) 
    {
        ob_end_clean();
    }
    $destino = 'principal.php';
    // aqui va el redireccionamiento
    header( "Location: $destino" );
} 
  ?>
	<!--
	<div class="row margin-top">
        <div class="column_12">
            <h1 class="inline on-left"> Posts del Humano Normal </h1>
            <a href={% url 'post_crea' %} class="button inline on-right"> Nuevo Post</a>
            <div class="clear"></div>
        </div>
    </div>
		-->
<div class="row margin-top ">
        	<div class="column_12">
           		<h1 class="inline on-left"> DropDaJ! </h1>
           	</div>
        </div>
    <div class="row margin-top">
        <div class="column_12">
          <p class="inline on-left"><?php echo $mensaje; ?></p>
        </div>
    </div>
    <div class="row margin-top">
		<div class="column_4 bck light padding">
    		<form action="login.php" method="post">
  					<br>Usuario:<br>
  					<input type="text" name="usuario" value="">
  					<br>Clave:<br>
            <input type="password" name="clave" value="">
            <a href="usuario_registra.php">Registrarse</a>
            <br><br>
  					<input class="button inline on-right" type="submit" value="Login">
  					<!-- <a href="listar_usuarios.php" class="button inline on-right"> Ver Usuarios</a> -->
  			</form> 
		</div>
	</div>


</body>
</html>