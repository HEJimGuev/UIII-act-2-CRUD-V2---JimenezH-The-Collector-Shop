<?php
    print_r($_POST);
    if(!isset($_POST['id_prod'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $id_prod = $_POST['id_prod'];
    $nombreprod = $_POST['txtNombre'];
    $cantstock = $_POST['txtcantstock'];
    $precio = $_POST['txtprecio'];
    $proveedor = $_POST['txtproveedor'];
    $fechrec = $_POST['txtfechrec'];
    $descripcion = $_POST['txtdescripcion'];
    $categoria = $_POST['txtcategoria'];

    $sentencia = $bd->prepare("UPDATE tbl_productos SET nombreprod = ?, cantstock = ?, precio = ?, proveedor = ?, fechrec = ?, descripcion = ?, categoria = ? where id_prod = ?;");
    $resultado = $sentencia->execute([$nombreprod, $cantstock, $precio,$proveedor,$fechrec,$descripcion,$categoria, $id_prod]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>