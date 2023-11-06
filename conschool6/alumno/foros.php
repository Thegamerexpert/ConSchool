<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ConSchool</title>
    <link rel="stylesheet" href="../CSS/styles1.css">

    <!-- Google Font Link for Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <script src="../JS/script.js" defer></script>
    <script src="../JS/datosPersonales.js"></script>
</head>
<body>
    <?php include "menu_alumno.html"?>

    <div class="contenedor">

        <div class="colDatosPersonales">
            
            <img class="fotoPersonal" src="../Media/cara_generica.jpg" alt="Foto personal">

            <p id="nombre">Nombre</p>
            <br>
            <p id="apellidos">Apellidos</p>
            <br>
            <p id="cursoActual">Curso actual</p>
            <br>
            <p id="centro">Centro</p>
        </div>

        <div class="colContenido">

            <p class="tituloPestanya">Foros</p>

            <?php
            // Conecta a la base de datos (esto podría estar en un archivo de configuración separado)
            $servername = "localhost:3307";
            $username = "root";
            $password = "";
            $dbname = "conschool";
            $con = mysqli_connect($servername, $username, $password, $dbname);

            // Verifica la conexión
            if (!$con) {
                die("La conexión a la base de datos falló: " . mysqli_connect_error());
            }

            // Obtén el ID del usuario de la sesión
            $userID = $_SESSION['userID'];

            // Realiza una consulta SQL para obtener los datos personales del usuario
            $query = "SELECT Nombre, Apellidos, cursoActual, id_centro FROM Usuario WHERE idUsuario = '$userID'";
            $result = mysqli_query($con, $query);

            // Verifica si se encontraron resultados
            if (mysqli_num_rows($result) > 0) {
                // Procesa y muestra los datos aquí
                while ($row = mysqli_fetch_assoc($result)) {
                    $nombre = $row['Nombre'];
                    $apellidos = $row['Apellidos'];
                    $curso = $row['cursoActual'];
                    $centro = $row['id_centro'];
                   // Asigna los datos a los elementos HTML utilizando PHP
                   echo '<script>';
                   echo 'document.getElementById("nombre").innerHTML = "' . $nombre . '";';
                   echo 'document.getElementById("apellidos").innerHTML = "' . $apellidos . '";';
                   echo 'document.getElementById("cursoActual").innerHTML = "' . $curso . '";';
                   echo 'document.getElementById("centro").innerHTML = "' . $centro . '";';
                   echo '</script>';
                }
            } else {
                // No se encontraron resultados, maneja el caso apropiadamente
            }

            // Consulta SQL para obtener datos del primer foro 
            $queryForo1 = "SELECT nombreCategoria, tituloTema FROM categoriasf1 c1
                            INNER JOIN temasf1 t1 ON c1.idCategoria = t1.idCategoria
                            LIMIT 5"; // Puedes ajustar esta consulta según tus necesidades

            $resultForo1 = mysqli_query($con, $queryForo1);

            if (mysqli_num_rows($resultForo1) > 0) {
                while ($rowForo1 = mysqli_fetch_assoc($resultForo1)) {
                    $nombreCategoria = $rowForo1['nombreCategoria'];
                    $tituloTema = $rowForo1['tituloTema'];
                    // Mostrar los datos en tu HTML
                    echo '<div class="panelForo">';
                    echo '<p class="tituloPanel">' . $nombreCategoria . '</p>';
                    echo '<br>';
                    echo '<p class="ultimoMensajeForo"><a href="">' . $tituloTema . '</a></p>';
                    echo '</div>';
                }
            } else {
                // No se encontraron temas en el foro 1, maneja el caso apropiadamente
            }

			// Consulta SQL para obtener datos del segundo foro 
            $queryForo2 = "SELECT nombreCategoriaf2, tituloTema FROM categoriasf2 c2
                            INNER JOIN temasf2 t2 ON c2.idCategoriaf2 = t2.idCategoriaf2
                            LIMIT 5"; // Puedes ajustar esta consulta según tus necesidades

            $resultForo2 = mysqli_query($con, $queryForo2);

            if (mysqli_num_rows($resultForo2) > 0) {
                while ($rowForo2 = mysqli_fetch_assoc($resultForo2)) {
                    $nombreCategoria2 = $rowForo2['nombreCategoriaf2'];
                    $tituloTema2 = $rowForo2['tituloTema'];
                    // Mostrar los datos en tu HTML
                    echo '<div class="panelForo">';
                    echo '<p class="tituloPanel">' . $nombreCategoria2 . '</p>';
                    echo '<br>';
                    echo '<p class="ultimoMensajeForo"><a href="">' . $tituloTema2 . '</a></p>';
                    echo '</div>';
                }
            } else {
                // No se encontraron temas en el foro 2, maneja el caso apropiadamente
            }

			// Consulta SQL para obtener datos del tercer foro 
            $queryForo3 = "SELECT nombreCategoriaf3, tituloTema FROM categoriasf3 c3
                            INNER JOIN temasf3 t3 ON c3.idCategoriaf3 = t3.idCategoriaf3
                            LIMIT 5"; // Puedes ajustar esta consulta según tus necesidades

            $resultForo3 = mysqli_query($con, $queryForo3);

            if (mysqli_num_rows($resultForo3) > 0) {
                while ($rowForo3 = mysqli_fetch_assoc($resultForo3)) {
                    $nombreCategoria3 = $rowForo3['nombreCategoriaf3'];
                    $tituloTema3 = $rowForo3['tituloTema'];
                    // Mostrar los datos en tu HTML
                    echo '<div class="panelForo">';
                    echo '<p class="tituloPanel">' . $nombreCategoria3 . '</p>';
                    echo '<br>';
                    echo '<p class="ultimoMensajeForo"><a href="">' . $tituloTema3 . '</a></p>';
                    echo '</div>';
                }
            } else {
                // No se encontraron temas en el foro 3, maneja el caso apropiadamente
            }

			

            // Cierra la conexión a la base de datos
            mysqli_close($con);
            ?>

        </div>
    </div>

    <script>
        
    </script>
</body>
</html>
