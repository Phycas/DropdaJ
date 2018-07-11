<?php
include_once 'conexionDB.php';
if (isset($_GET['id'])) 
       {
		     $id = $_GET['id'];
		     $query = "SELECT * " .
		             "FROM archivos WHERE id = '$id'";
		     $result = mysqli_query($laDB,$query) or die('Error, query failed');
		     list($id, $file, $type, $size, $content) = mysqli_fetch_array($result);
		 				   //echo $id . $file . $type . $size;
		 				   //echo 'sampath';
		     header("Content-length: $size");
		     header("Content-type: $type");
		     header("Content-Disposition: attachment; filename=$file");
		     ob_clean();
		     flush();
		     echo $content;
		     mysqli_close($connection);
		     exit;
       }
?>