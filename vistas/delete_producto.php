<?php
    include_once '../bd/conexion.php';    
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    if (isset($_POST['id'])){

        $id = $_POST['id'];

        $sql = "DELETE FROM producto where id_producto = $id";
        $stmt= $conexion->prepare($sql);

        try {
            //code...
            $stmt->execute();
            echo '1';
        } catch (Exception $e) {
            //throw $th;
            die("El error es:  - ".$e->getMessage());
        }


        
    }

    

?>