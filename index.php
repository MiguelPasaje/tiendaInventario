<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="style.css">

</head>
<body>

    <div id="login">
        <h3 class="text-center display-4">Login</h3>
        <div class="container">
            <div id=login-row class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12 bg-light text-dark">
                        <form action="" id="formlogin" method="post">
                            <h3 class="text-center text-dark">Iniciar Sesión</h3>

                            <div class="form-group">
                                <label for="usuario" class="text-dark">Usuario</label>
                                <input type="text" name="usuario" id="usuario" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-dark">Contraseña</label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>

                            <div class="form-group text-center">
                                <input type="submit" value="Ingresar"  name="submit" class="btn btn-dark btn-lg btn-block">
                            </div>



                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    
    <!---->
    <script src="assets/jquery-3.6.0.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/popper.min.js"></script>
    <script src="assets/sweetalert2.js"></script>
    <script src=""></script>
    <script src="index.js"></script>


</body>
</html>