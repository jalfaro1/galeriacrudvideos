<?php

/**
 * CRUD modal en PHP y MySQL
 * 
 * Este archivo elimina el registro y la imagen
 * @author MRoblesDev
 * @version 1.0
 * https://github.com/mroblesdev
 * 
 */

session_start();

require 'dbconect.php';
$id = ($_POST['id']);




$sql = "$conn,DELETE FROM dataporn WHERE id=$id";
if ($conn->query($sql)) {

   

   
    $_SESSION['message'] = "Registro eliminado";
} else {
  
    $_SESSION['message'] = "Error al eliminar registro";
}

header('Location: index.php');
