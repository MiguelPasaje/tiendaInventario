
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crud</title>

    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
    
    
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a href="pag_inicio.php" class="navbar-brand">TiendaElSarcoDelMecato</a>    
</nav>

<div class="container p-4">

    <div class="container">
        <div class="row height d-flex justify-content-center align-items-center">
            <div class="col-md-8">
                <div class="search">
                     <i class="fa fa-search"></i> 
                     <input type="text" class="form-control" id="search" placeholder="Busca un Producto">
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="table-responsive" id="product-result">
            <div class="card-body">
                

                    <table class="table table-bordered table-sm table-dark table-striped">
                        <thead>
                            <tr>
                                <td>Nombre</td>
                                <td>Precio Compra</td>
                                <td>Precio Venta</td>
                                <td>Descripción</td>
                                
    
                            </tr>
                        </thead>
                        <tbody id="Productos_search"></tbody>
                    </table>    

                
            </div>
        </div>
        
    </div>
    
</div>


<?php include_once '../includes/footer.php';?>
<script src="../vistas/crud_Consulta.js"></script>
