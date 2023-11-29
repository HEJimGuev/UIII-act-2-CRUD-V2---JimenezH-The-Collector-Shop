<?php
    //print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtNombre"]) || empty($_POST["txtcantstock"]) || empty($_POST["txtprecio"])|| empty($_POST["txtproveedor"])|| empty($_POST["txtfechrec"])|| empty($_POST["txtdescripcion"])|| empty($_POST["txtcategoria"])){
        header('Location: index.php?mensaje=falta');
        exit();
    }

    include_once 'model/conexion.php';
    $nombreprod = $_POST["txtNombre"];
    $cantstock = $_POST["txtcantstock"];
    $precio = $_POST["txtprecio"];
    $proveedor = $_POST["txtproveedor"];
    $fechrec = $_POST["txtfechrec"];
    $descripcion = $_POST["txtdescripcion"];
    $categoria = $_POST["txtcategoria"];
    
    $sentencia = $bd->prepare("INSERT INTO tbl_productos(nombreprod,cantstock,precio,proveedor,fechrec,descripcion,categoria) VALUES (?,?,?,?,?,?,?);");
    $resultado = $sentencia->execute([$nombreprod,$cantstock,$precio,$proveedor,$fechrec,$descripcion,$categoria]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>