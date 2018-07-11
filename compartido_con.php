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
      $query = "SELECT archivos.id, archivos.nombre, archivos.tipo
				FROM archivos INNER JOIN compartidos
				ON archivos.id = compartidos.archivo_id
				WHERE compartidos.destinatario_id ='$id'";
      $archivos = @mysqli_query($laDB, $query);
      
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
  <?php }
  ?>
 

  <!-- carpetas -->
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
                    <th>Acciones</th>
                   </tr>
                </thead>
                <tbody>
                  <?php 
                  foreach($archivos as $archivo) { ?>
                    <tr>
                     <td><?php echo $archivo['id'] ?></td>
                     <td><a href="archivoVer.php?id=<?php echo $archivo['id']?>"><?php echo $archivo['nombre'] ?></td>
                     <td><?php echo $archivo['tipo'] ?></td>
                     <td><a href="descargarArchivo.php?id=<?php echo $archivo['id']?>" class="button error">Descargar</a></td>
                     
                    </tr>
                    <?php
                   }
                    
                  ?>
                </tbody>
            </table>
        </div>
    </div>




  </nav>
<?php 
mysqli_close($laDB);
?>

</body>
</html>