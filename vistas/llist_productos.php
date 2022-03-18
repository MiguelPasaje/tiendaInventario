<?php 
    include_once '../bd/conexion.php';    
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    //$sql = "SELECT * FROM producto";
    $sql = "SELECT producto.id_producto, producto.codigo_Barras_producto ,producto.Nombre_producto, producto.precio_compra , producto.precio_Venta , producto.descripcion ,categoria.Nombre_categoria FROM producto join categoria on producto.cod_categoria_fk = categoria.codigo_categoria ";

    $stmt= $conexion->prepare($sql);
    $stmt->execute();
    $results = $stmt -> fetchAll(PDO::FETCH_ASSOC);//se convierte la consulta en un array/
    //https://diego.com.es/tutorial-de-pdo
    //print_r($results);


    if (!$results ){ 
        die("Error de busqueda "/* .$conexion->errorIfo()) */);
    }

    $jsonstring = json_encode($results);
    echo $jsonstring;




?>