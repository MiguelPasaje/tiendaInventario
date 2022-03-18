
<?php

    class Conexion{
        public static function Conectar(){
            define('servidor','localhost');
            define('nombre_bd','tienda');
            define('usuario','root');
            define('password','');
            /* $dsn = 'mysql:host=localhost;dbname=tienda';
            $nombre_usuario = 'root';
            $contraseña = ''; */

            $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

            try {                
                /* $conexion = new PDO($dsn,$nombre_usuario,$contraseña,$opciones); */
                $conexion = new PDO("mysql:host=".servidor.";dbname=".nombre_bd, usuario, password, $opciones);
                return $conexion;
            }catch (Exception $e) {                
                die("El error de conexion es: ".$e->getMessage());
            }

        }
    }

?>