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
      //usuario
      $query = "SELECT * FROM usuarios WHERE id='$id'";
      $respuesta = @mysqli_query($laDB, $query);
      $usuario = mysqli_fetch_assoc($respuesta);
      $id = $usuario['id'];
      $nick = $usuario['usuario'];
      $clave = $usuario['clave'];
      $correo = $usuario['mail'];
      $nombre = $usuario['nombre'];
      //archivos
      $query = "SELECT id, nombre, tipo FROM archivos WHERE usuario_id='$id' AND carpeta_id IS NULL";
      $respuesta = @mysqli_query($laDB, $query);
      
      //Cerrar conexión
      //mysqli_close($laDB);
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

    <div  class="session on-right padding-right">
      <h5 ><?php echo $nick; ?></h5>
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
  
  <div class="row">
        <div class="column_12 padding bck light form">
            <table id="table" class="table align center">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Tipo</th>
                   
                    
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  foreach($respuesta as $archivo) { ?>
                    <tr>
                     <td><?php echo $archivo['id'] ?></td>
                     <td><a href="archivoVer.php?id=<?php echo $archivo['id']?>"><?php echo $archivo['nombre'] ?></td>
                     <td><?php echo $archivo['tipo'] ?></td>
                     
                    </tr>
                    <?php
                   }
                    
                  ?>
                </tbody>
            </table>
        </div>
    </div>

  <!-- asd -->
  <nav data-tuktuk="buttons" class="padding align inline ">
    <a href="subir_archivo.php" class="button error"><i class="fa fa-arrow-left"></i> Subir Archivo</a>
    <a href="crear_car.php" class="button error"><i class="fa fa-arrow-left"></i> Nueva Carpeta</a>


  </nav>
<?php 
mysqli_close($laDB);
?>

</body>
</html>