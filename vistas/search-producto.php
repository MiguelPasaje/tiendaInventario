<?php

    include_once '../bd/conexion.php';    
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    $search = $_POST['search'];

    if (!empty($search)){
        $sql2 = "SELECT * FROM producto WHERE Nombre_producto LIKE '%$search%' ";
        $sql = "SELECT producto.id_producto, producto.codigo_Barras_producto ,producto.Nombre_producto, producto.precio_compra , producto.precio_Venta , producto.descripcion ,categoria.Nombre_categoria FROM producto join categoria on producto.cod_categoria_fk = categoria.codigo_categoria WHERE Nombre_producto LIKE '%$search%'";
        $stmt  = $conexion->prepare($sql);
        $stmt->execute();
        $results = $stmt -> fetchAll(PDO::FETCH_ASSOC);//se convierte la consulta en un array
        //print_r($results);

        //si no hay resultadodo de busqueda entra al if
        if (!$results ){ 
            die("Error de busqueda "/* .$conexion->errorIfo()) */);
        }
        //print_r(json_encode($results));

        //$json = array();

    
        //convierto array a json
        $jsonstring = json_encode($results);
        echo $jsonstring;


    }


?>