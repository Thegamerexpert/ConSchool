<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/common/style.css">
    <link rel="stylesheet" href="../../css/common/menu.css">
    <link rel="stylesheet" href="../../css/common/sideMenu.css">
</head>
<body>
<?php
    //importa las clases
    include_once("../../modelo/entidades/usuario.php");
    // Carga la sesión
    session_start();
    //importa los servicios
    include_once("../../modelo/servicios/general.php");
    include_once("../../modelo/servicios/service_profesor.php");

    //Obten la session
    $session = $_SESSION['userData'];
    //Establece la referencia
    $dataUser = service_Profesor::class;
    ?>        
    <header class="encabezado">
        <?php
        //fragmento del menu
        include_once("../fragments/menu.php");
        ?>
    </header>
    <div class="contenedor">
        <?php
        //fragmento del menu lateral
        include_once("../fragments/sideMenu.php");
        ?>
    </div>

    <?php
    //Errores y otros. solo generales
     include("../../js/general.php");
     ?> 
</body>
</html>