<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Estiles CSS-->
    <link rel="stylesheet" type="text/css" href="./css/common/general.css">
    <link rel="stylesheet" type="text/css" href="./css/common/login.css">
    <!--Nombre aplicacion-->
    <?php include_once("./vista/common/nameApp.html"); ?>
    <link rel="stylesheet" href="css/general/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <form id="login-form" action="./model/dao/common/login.php" method="post">
            <h2><img src="./resources/common/logo1.png" alt="" srcset=""></h2>
            <div class="form-group">
                <label for="username">Usuario:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Ingresar</button>
        </form>
    </div>

    <!--Scripts-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="./js/common/login.js"></script>

    <script type="text/javascript">
        window.addEventListener("load", searchErrors);
    </script>
</body>

</html>