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
      $mensaje = '';
      if(!empty($_GET["mensaje"])){
        $mensaje = $_GET["mensaje"];
      }
    ?>
		<div class="row margin-top">
        	<div class="column_12">
           		<h1 class="inline on-left"> DropDaJ! </h1>
           	</div>
        </div>
    <div class="row margin-top">
      <div class="column_12 ">
        <h4 class="text book">Registro</h4>
      </div>
    </div>
    <div class="row margin-top">
      <div class="column_4 bck color">
        <?php echo $mensaje; ?>
      </div>
    </div>
    <div class="row margin-top">
		<div class="column_12 bck light padding">
    		<form action="usuarioRegistra.php" method="post">
  					<br>Usuario:<br>
  					<input type="text" name="usuario" value="">
  					<br>Clave:<br>
            <input type="password" name="clave" value="">
            <br>Nombre:<br>
            <input type="text" name="nombre" value="">
            <br>Correo Electrónico:<br>
            <input type="text" name="correo" value="">
            <br>
  					<input class="button inline on-right" name="submit" type="submit" value="Guardar">
  					
  			</form> 
		</div>
	</div>


</body>
</html>