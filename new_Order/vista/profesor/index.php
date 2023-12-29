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
    <link rel="stylesheet" href="../../css/profesor/paneles.css">
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
            <h1 class="tituloPestanya">Bienvenido/a Profesor/a <?php echo $_SESSION['userName'] ?></h1>

            <div class="panel">
				<p class="tituloPanel">Mis Cursos</p>
				<br>
				
				<p class="contenidoPanel"><a href="gestionCursos1.php">Primero</a></p>
				<br>
				<p class="contenidoPanel"><a href="gestion_curso2.php">Segundo</a></p>
				<br>
				<p class="contenidoPanel"><a href="gestion_curso3.php">Tercero</a></p>
				<br>
				
			</div>

			<div class="panel">
				<p class="tituloPanel">Gestión de Notas</p>
				<br>
				
				<p class="contenidoPanel"><a href="gestionNotas1.php">Primero</a></p>
				<br>
				<p class="contenidoPanel"><a href="gestionNotas2.php">Segundo</a></p>
				<br>
				<p class="contenidoPanel"><a href="gestionNotas3.php">Tercero</a></p>
				<br>
				
			</div>


            <div class="panel">

				<p class="tituloPanel">Foros activos</p>
				<br>
				<p class="contenidoPanel"><a href="" id="foro1">Tutoría</a></p>
				<p id="contenidof1"></p>
				<br>
				<p class="contenidoPanel"><a href="" id="foro2">Consulta a tus profesores</a></p>
				<p id="contenidof2"></p>
				<br>
				<p class="contenidoPanel"><a href="" id="foro3">Exámenes</a></p>
				<p id="contenidof3"></p>
				<br>

			</div>

            <!-- Panel de Mensajes -->
            <div class="panel">
                <p class="tituloPanel">Mensajes</p>
                <?php foreach ($ultimosMensajes as $mensaje): ?>
                    <p class="contenidoPanel"><?php echo htmlspecialchars($mensaje['textoMensaje']); ?></p>
                <?php endforeach; ?>
            </div>

            <!-- Panel de Eventos -->
            <div class="panel">
                <p class="tituloPanel">Eventos</p>
                <?php foreach ($proximosEventos as $evento): ?>
                    <p class="contenidoPanel"><?php echo htmlspecialchars($evento); ?></p>
                <?php endforeach; ?>
            </div>
            
        </div>

    </div>


    <!--Scripts-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="./js/profesor/login.js"></script>

    <script type="text/javascript">
        window.addEventListener("load", searchErrors);
    </script>
</body>

</html>