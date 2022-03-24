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
                    <hr class="my-4 bg-primary">
                </div>
            </div>
        </div>
    </div>

    <!--  modal -->
    <button type="button" class="btn btn-primary btn-Add" data-toggle="modal" data-target="#exampleModal">
        
    </button>

    <div class="container">
        <!-- Button trigger modal -->
  
  <!-- Modal -->
  <div class="modal fade " id="exampleModal" tabindex="-1" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog bg-dark ">
      <div class="modal-content bg-dark">
        <div class="modal-header bg-dark">
          <h5 class="modal-title text-primary " id="exampleModalLabel">Nuevo Producto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body bg-dark">
            ...
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

                    <?php
                        include_once '../bd/conexion.php';    
                        $objeto = new Conexion();
                        $conexion = $objeto->Conectar();

                        $sql ="SELECT categoria.codigo_categoria, categoria.Nombre_categoria FROM categoria";
                        $stmt =$conexion->prepare($sql);
                        $stmt->execute();
                        $results = $stmt -> fetchAll(PDO::FETCH_ASSOC);//se convierte la consulta en un array
                       /*  print_r($results[0]);
                        echo("<br>");
                        echo("<br>");
                         */
                        
                       
                    ?>
                    
                    
                    
                    <div class="form-group">
                        
                        <select name="categoria" id="categoria" class="form-control">
                            <option value="">Seleccione la Categoría</option>
                            <?php
                            foreach ($results as $key => $categoria) {
                                
                                ?>
                                    <option id="categoria" class="form-control" name="categoria" value="<?php echo ($categoria['codigo_categoria']); ?>"> <?php echo ($categoria['Nombre_categoria']) ; ?></option>
                                <?php
                            }
                            ?>


                        </select>
                    </div>
                    <input type="submit" class="btn btn-primary btn-block" id="submit" name="submit"  value="Guardar">
                </form>
            </div>
            ...
        </div>
        <div class="modal-footer ">
          <button type="button" id="cerrar_form" class="btn btn-warning btn-block" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>

    </div>

    

    <!-- end modal -->

    <!---->
    <div class="container">
        <div class="row height d-flex justify-content-center align-items-center">
            <div class="col-md-8">
                <div class="search">
                     <i class="fa fa-search"></i> 
                     
                        <input type="search" id="search" class="form-control mr-5" placeholder="Busca tu producto">
                </div>
            </div>
        </div>
    </div>
    <!---->

        


    
<div class="container p-4">
    <div class="table-responsive">
        <div class="" id="product-result">
    
                    <table class="table table-bordered table-sm  table-dark table-striped">
                        <thead>
                            <tr>
                                <td>id</td>
                                <td>Nombre</td>
                                <td>Precio Compra</td>
                                <td>Precio Venta</td>
                                <td>Categoria</td>
                                <td>Descripción</td>
                                <td>Codigo Barras</td>
                                <td>Opciones</td>
    
                            </tr>
                        </thead>
                        <tbody id="Productos_search"></tbody>
                    </table>    
    
                
        </div>
        <table class="table table-bordered table-sm table-dark table-striped">
            <thead>
                <tr>
                    <td>id</td>
                    <td>Nombre</td>
                    <td>Precio Compra</td>
                    <td>Precio Venta</td>
                    <td>Categoria</td>
                    <td>Descripción</td>
                    <td>Codigo Barras</td>
                    <td>Opciones</td>
    
                </tr>
            </thead>
            <tbody id="tb_Productos"></tbody>
        </table>
    
    </div>
</div>
        


        

    

    
    <?php include_once '../includes/footer.php';?>
    <script src="../vistas/crud.js"></script>
    

