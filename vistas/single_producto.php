<?php

    //busca un producto para colocarlo en el formulario y poder editarlo

    include_once '../bd/conexion.php';    
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    $id =  $_POST['id'];
    $sql = "SELECT * FROM producto where id_producto = $id";
    $stmt = $conexion->prepare($sql);
    $stmt->execute();
    $results = $stmt -> fetch(PDO::FETCH_ASSOC);//se convierte la consulta en un array
    if (!$results ){ 
        die("Error de busqueda "/* .$conexion->errorIfo()) */);
    }

    $jsonstring = json_encode($results);
    echo $jsonstring;

    /* try {
            //code...
            echo '1';
        } catch (Exception $e) {
            //throw $th;
            die("El error es:  - ".$e->getMessage());
        }
 */
?>