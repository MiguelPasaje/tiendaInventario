<?php
    include_once '../bd/conexion.php';    
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();


if (!empty($_POST)){/* isset($_POST['submit']) */
    $CodigoBarras = $_POST['CodigoBarras'];
    $NameProducto = $_POST['NameProducto'];
    $precioCompra = $_POST['precioCompra'];
    $precioVenta = $_POST['precioVenta'];
    $descripcion = $_POST['descripcion'];
    $categoria = $_POST['categoria'];
    /* echo $CodigoBarras;
    echo $NameProducto;
    echo $precioCompra;
    echo $precioVenta;
    echo $descripcion; */


    /* $data = [
    'CodigoBarras' => $CodigoBarras,
    'NameProducto' => $NameProducto,
    'precioCompra' => $precioCompra,
    'precioVenta'  => $precioVenta,
    'descripcion'  => $descripcion,
    'categoria'    => $categoria,
    ]; */
    /* foreach ($data as $value) {
        ?><br><?php
        echo $value;
    } */

    $sql = "INSERT INTO producto(codigo_Barras_producto, Nombre_producto, precio_compra, precio_Venta, descripcion, cod_categoria_fk)
                         VALUES (?,?,?,?,?,?)";

    $stmt= $conexion->prepare($sql);

    $stmt->bindParam(1,$CodigoBarras);
    $stmt->bindParam(2,$NameProducto);
    $stmt->bindParam(3,$precioCompra);
    $stmt->bindParam(4,$precioVenta);
    $stmt->bindParam(5,$descripcion);
    $stmt->bindParam(6,$categoria);
    /* $stmt->execute();
    if(!$stmt){
        echo 'NoSave';
    }else{
        echo 'SaveProduct';
    } */

    try {
        //code...
        $stmt->execute();
        echo '1';
    } catch (Exception $e) {
        //throw $th;
        die("El error es:  - ".$e->getMessage());
    }

    //header("Location: pag_inicio.php");

    // $pdo->prepare($sql)->execute([$CodigoBarras, $NameProducto,$precioCompra,$precioVenta,$descripcion,$categoria]);
    /* $pdo->prepare($sql)->execute([$data]); */

}

?>