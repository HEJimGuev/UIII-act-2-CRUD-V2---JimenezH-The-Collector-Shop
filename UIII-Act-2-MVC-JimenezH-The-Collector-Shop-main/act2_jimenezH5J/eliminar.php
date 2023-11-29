<?php 
    if(!isset($_GET['id_prod'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include 'model/conexion.php';
    $id_prod = $_GET['id_prod'];

    $sentencia = $bd->prepare("DELETE FROM tbl_productos where id_prod = ?;");
    $resultado = $sentencia->execute([$id_prod]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=eliminado');
    } else {
        header('Location: index.php?mensaje=error');
    }
    
?>