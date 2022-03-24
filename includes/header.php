<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crud</title>

    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="../style.css">
    <!--
    -->
    
    
</head>
<body>
    
    
    <nav class="navbar  navbar-dark bg-dark">
        <a href="pag_inicio.php" class="text-light">ElSarcoDelMecato</a>
        <ul class="navbar-nav">
            <div class="container content-user" >
                <h2 class="text-center title-user ">
                    <span class="badge">
                        <i class="fas fa-user"></i>
                            <?php
                            echo $_SESSION["S_usuario"]; 
                            ?>
                        </i>                     
                    </span>
                </h2>
                
                <div class="btns-nav">
                    <a class="" href="../vistas/pag_consulta_productos.php" roles="button">
                        lista
                    </a>
                    <a class="btn btn-danger btn-lg btn-logout" href="../login/logout.php" roles="button">
                        <i class="fa icon-logout">
                            &#xf2f5;
                        </i>
                    </a>
                </div>
            </div>
        </ul>
    </nav>

                        

                        