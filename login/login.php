<?php 

    session_start();//iniciar variables de sesion

    include_once '../bd/conexion.php';
    $objeto = new Conexion();

    $conexion = $objeto->Conectar();

    //print_r($conexion);

    //recepcion de datos enviados mediante Post desde ajax
    $usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
    /* echo "asdf".$usuario; */
    $password = (isset($_POST['password']))? $_POST['password'] : '';

    $password = md5($password);

    $consulta = "SELECT * FROM usuarios where usuario='$usuario' and password='$password'";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();

    if($resultado->rowCount()){
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION["S_usuario"] = $usuario;
    }else{
        $_SESSION["S_usuario"] = null;
        $data=5;
    }

    print json_encode($data);
    $conexion=null;
?>
