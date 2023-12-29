<?php

session_start();

//Comprueba si esta loggeado
include_once("../../model/services/common/checkLogged.php");


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Nombre aplicacion-->
    <?php include_once("../common/nameApp.html"); ?>

    <!--Estilos CSS-->
    <link rel="stylesheet" href="../../css/common/general.css">
    <link rel="stylesheet" href="../../css/common/vistaUsuarios.css">
    <link rel="stylesheet" href="../../css/common/topNav.css">
    <link rel="stylesheet" href="../../css/common/leftNav.css">
</head>

<body>
    <?php
    //Menu topNav
    include_once("../common/topNav.php");
    ?>
    <!--Contenido-->
    <div class="container">
        <?php
        //Left Data User
        include_once("../common/leftBar.php");
        ?>

        <div class="contenido">
        <h1 class="tituloPestanya">Bienvenido/a alumno/a <?php echo $_SESSION['userName'] ?></h1>

            
            
        </div>

    </div>

    <!--Scripts-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="./js/alumno/login.js"></script>

    <script type="text/javascript">
        window.addEventListener("load", searchErrors);
    </script>
</body>

</html>