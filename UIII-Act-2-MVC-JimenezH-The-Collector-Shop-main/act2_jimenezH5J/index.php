<?php include 'template/header.php' ?>

<?php
    include_once "model/conexion.php";
    $sentencia = $bd -> query("select * from tbl_productos");
    $producto = $sentencia->fetchAll(PDO::FETCH_OBJ);
    //print_r($persona);
?>

<div class="container mt-7">
    <div class="row justify-content-center">
        <div class="col-md-115">
            <!-- inicio alerta -->
            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Rellena todos los campos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>


            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Registrado!</strong> Se agregaron los datos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>   
            
            

            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Vuelve a intentar.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>   



            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Cambiado!</strong> Los datos fueron actualizados.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?> 


            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado'){
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Eliminado!</strong> Los datos fueron borrados.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?> 

            <!-- fin alerta -->
            <div class="card">
                <div class="card-header">
                    Lista de productos:
                </div>
                <div class="p-9">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">ID Producto</th>
                                <th scope="col">Nombre Producto</th>
                                <th scope="col">Cantidad en Stock</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Proveedor</th>
                                <th scope="col">Fecha de Recibido</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col">Categoria</th>
                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php 
                                foreach($producto as $dato){ 
                            ?>

                            <tr>
                                <td scope="row"><?php echo $dato->id_prod; ?></td>
                                <td><?php echo $dato->nombreprod; ?></td>
                                <td><?php echo $dato->cantstock; ?></td>
                                <td><?php echo $dato->precio; ?></td><
                                <td><?php echo $dato->proveedor; ?></td>
                                <td><?php echo $dato->fechrec; ?></td>
                                <td><?php echo $dato->descripcion; ?></td>
                                <td><?php echo $dato->categoria; ?></td>
                                <td><a class="text-success" href="editar.php?id_prod=<?php echo $dato->id_prod; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                <td><a onclick="return confirm('Estas seguro de eliminar?');" class="text-danger" href="eliminar.php?id_prod=<?php echo $dato->id_prod; ?>"><i class="bi bi-trash"></i></a></td>
                            </tr>

                            <?php 
                                }
                            ?>

                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
        
        <div class="col-md-5">
        <br>
            <div class="card">
                <div class="card-header">
                    Ingresar datos:
                </div>
                <form class="p-4" method="POST" action="registrar.php">
                    <div class="mb-3">
                        <label class="form-label">Nombre del Producto: </label>
                        <input type="text" class="form-control" name="txtNombre" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Cantidad de productos adquiridos: </label>
                        <input type="number" class="form-control" name="txtcantstock" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Precio: </label>
                        <input type="text" class="form-control" name="txtprecio" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Proveedor: </label>
                        <input type="text" class="form-control" name="txtproveedor" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha de Recibido: </label>
                        <input type="date" class="form-control" name="txtfechrec" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Descripcion: </label>
                        <input type="text" class="form-control" name="txtdescripcion" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Categoria: </label>
                        <input type="text" class="form-control" name="txtcategoria" autofocus required>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="btn btn-primary" value="Registrar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<br><br><br><br>
<?php include 'template/footer.php' ?>