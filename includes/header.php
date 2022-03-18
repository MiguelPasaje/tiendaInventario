<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crud</title>

    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="../style.css">

</head>
<body>

    
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a href="pag_inicio.php" class="navbar-brand">TiendaElSarcoDelMecato</a>
    <ul class="navbar-nav ml-auto">
        <form action="" class="form-inline my-2 my-lg-0">
            <input type="search" id="search" class="form-control mr-5" placeholder="Busca tu producto">
        </form>
        <div class="container">
            <h2 class="text-center ">usuario:
                <span class="badge badge-primary">
                    <?php
                        echo $_SESSION["S_usuario"];
                    ?>
                </span>
            </h2>
        </div>
    </ul>
</nav>