<?php include 'template/header.php' ?>

<?php
    if(!isset($_GET['id_prod'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once 'model/conexion.php';
    $id_prod = $_GET['id_prod'];

    $sentencia = $bd->prepare("select * from tbl_productos where id_prod = ?;");
    $sentencia->execute([$id_prod]);
    $producto = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($persona);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4" method="POST" action="editarProceso.php">
                    <div class="mb-3">
                        <label class="form-label">Nombre Producto: </label>
                        <input type="text" class="form-control" name="txtNombre" required 
                        value="<?php echo $producto->nombreprod; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Cantidad en Stock: </label>
                        <input type="number" class="form-control" name="txtcantstock" autofocus required
                        value="<?php echo $producto->cantstock; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Precio: </label>
                        <input type="text" class="form-control" name="txtprecio" autofocus required
                        value="<?php echo $producto->precio; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Proveedor: </label>
                        <input type="text" class="form-control" name="txtproveedor" autofocus required
                        value="<?php echo $producto->proveedor; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha de Recibido: </label>
                        <input type="date" class="form-control" name="txtfechrec" autofocus required
                        value="<?php echo $producto->fechrec; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Descripcion: </label>
                        <input type="text" class="form-control" name="txtdescripcion" autofocus required
                        value="<?php echo $producto->descripcion; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Categoria: </label>
                        <input type="text" class="form-control" name="txtcategoria" autofocus required
                        value="<?php echo $producto->categoria; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="id_prod" value="<?php echo $producto->id_prod; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<br><br><br>
<?php include 'template/footer.php' ?>