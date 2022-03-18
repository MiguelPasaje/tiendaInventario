<?php 

    include_once '../bd/conexion.php';    
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    //echo $_POST['CodigoBarras'];
    $id= $_POST['id'];
    $CodigoBarras = $_POST['CodigoBarras'];
    $NameProducto = $_POST['NameProducto'];
    $precioCompra = $_POST['precioCompra'];
    $precioVenta = $_POST['precioVenta'];
    $descripcion = $_POST['descripcion'];
    $categoria = $_POST['categoria'];

    $sql = "UPDATE `producto` set codigo_Barras_producto=:CodigoBarras, `Nombre_producto`=:NameProducto,
                `precio_compra`=:precioCompra, `precio_Venta`=:precioVenta, `descripcion`=:descripcion, `cod_categoria_fk`=:categoria 
                WHERE `id_producto` = :id" ;
    
    $stmt= $conexion->prepare($sql);
    $stmt->bindParam(':CodigoBarras',$CodigoBarras);
    $stmt->bindParam(':NameProducto',$NameProducto);
    $stmt->bindParam(':precioCompra',$precioCompra);
    $stmt->bindParam(':precioVenta',$precioVenta);
    $stmt->bindParam(':descripcion',$descripcion);
    $stmt->bindParam(':categoria',$categoria);
    $stmt->bindParam(':id',$id);

    try {
        //code...
        $stmt->execute();
        echo '2';
    } catch (Exception $e) {
        //throw $th;
        die("El error es:  - ".$e->getMessage());
    }

    

?>