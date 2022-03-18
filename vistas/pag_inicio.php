<?php
session_start();
if($_SESSION["S_usuario"] === null){
    include_once '../bd/conexion.php';    
    header("Location: ../index.php");
}elseif(isset($_SESSION['start']) && (time() - $_SESSION['start'] > 86400)){
    //desetruir la sesion si han transcurrido 24 hr sin uso
    session_unset(); 
    session_destroy(); 
    header("Location: ../index.php");
    echo "session destroyed"; 
}
$_SESSION['start'] = time();
?>

<?php include_once '../includes/header.php';?>



   
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="junbotrom">
                    
                    <p class="lead text-center">
                        sesion iniciada
                    </p>
                    <hr class="my-4">
                    <a class="btn btn-danger btn-lg" href="../login/logout.php" roles="button">Cerrar sesión</a>
                </div>
            </div>
        </div>
    </div>
    <hr>


    <div class="container p-4">

        <div class="container">

            <div class="col-md-8">

                <div class="card card-body bg-dark">
                    <form action="" method="POST" id="producto-form" >
                        <div class="form-group">
                            <input type="hidden" id="id_producto">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" id="CodigoBarras" name="CodigoBarras"  placeholder="Codigo de Barras" autofocus>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="NameProducto" name="NameProducto"  placeholder="nombre Producto" >
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="precioCompra" name="precioCompra"  placeholder="Precio de Compra" >
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="precioVenta" name="precioVenta"  placeholder="precio de venta" >
                        </div>
                        <div class="form-group" >
                            <textarea name="descripcion" id="descripcion" rows="2" class="form-control" placeholder="Descripción producto"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="categoria" name="categoria"  placeholder="categoria" >
                        </div>
                        <input type="submit" class="btn btn-primary btn-block" id="submit" name="submit"  value="Guardar">
                    </form>
                </div>

            </div>

            <div class="col-md-12">
                <div class="card my-4  card-body bg-dark" id="product-result">
                    <div class="card-body">
                        

                            <table class="table table-bordered table-sm">
                                <thead>
                                    <tr>
                                        <td>id</td>
                                        <td>Codigo Barras</td>
                                        <td>Nombre</td>
                                        <td>Precio Compra</td>
                                        <td>Precio Venta</td>
                                        <td>Descripción</td>
                                        <td>Categoria</td>
                                        <td>Opciones</td>
            
                                    </tr>
                                </thead>
                                <tbody id="Productos_search"></tbody>
                            </table>    

                        
                    </div>
                </div>
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <td>id</td>
                            <td>Codigo Barras</td>
                            <td>Nombre</td>
                            <td>Precio Compra</td>
                            <td>Precio Venta</td>
                            <td>Descripción</td>
                            <td>Categoria</td>
                            <td>Opciones</td>

                        </tr>
                    </thead>
                    <tbody id="tb_Productos"></tbody>
                </table>

            </div>

        </div>

    </div>

    
    <?php include_once '../includes/footer.php';?>
    <script src="../vistas/crud.js"></script>
    

