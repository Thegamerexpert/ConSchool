<?php

session_start();

//Comprueba si esta loggeado
include_once("../../model/services/common/checkLogged.php");

//Classes
include_once("../../model/entities/common/class_Usuario.php");
include_once("../../model/entities/common/class_Mensaje.php");
include_once("../../model/entities/common/class_Evento.php");
include_once("../../model/entities/common/class_Foro.php");

//Services
include_once("../../model/services/common/Service_Mensaje.php");
include_once("../../model/services/common/Service_Evento.php");
include_once("../../model/services/common/Service_Foro.php");

//Get From memory
$usuario = Usuario::frontBody();
$usuarioPerfil = get_object_vars($_SESSION["usuarioPerfil"]);

//Obtener todos los mensajes
$mensaje = Mensaje::frontBody();
$ListaMensajes = Servicio_Mensaje::LeerMensajes();
//Eventos
$evento = Evento::frontBody();
$ListaEventos = Servicio_Evento::LeerEventos();
//Foros
$foro = Foro::frontBodyTutoria();
$ListaForosTutorias = Servicio_Foro::LeerEventosTutorias();
$ListaForosConsultasProfesores = Servicio_Foro::LeerEventosConsultasProf();
$ListaForosExamenes = Servicio_Foro::LeerEventosExamenes();
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
            <div>
                <?php 
                    //print_r($usuarioPerfil);
                    //print_r($ListaMensajes);
                    //print_r($ListaEventos);
                    //print_r($ListaForosTutorias);
                    //print_r($ListaForosConsultasProfesores);
                    //print_r($ListaForosExamenes);
                ?>
            </div>
            <h1 class="tituloPestanya">Bienvenido/a Profesor/a <?php echo $usuarioPerfil["Nombre"]; ?></h1>

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
				<p id="contenidof1">
                    <?php
                        if (count($ListaForosTutorias) <= 0) { ?>
                            <h2 class="warning">Parece que de momento no hay mensajes</h2>
                        <?php } else {
                            foreach ($ListaForosTutorias as $foro) {?>
                                Ultimo mensaje <?php echo htmlspecialchars($foro->fechaCreacion->format("Y-m-d H:i:s")); ?>: <?php echo htmlspecialchars($foro->contenidoRespuesta); ?></p>
                            <?php }
                        }
                     ?>
                </p>
				<br>
				<p class="contenidoPanel"><a href="" id="foro2">Consulta a tus profesores</a></p>
				<p id="contenidof2">
                    <?php
                        if (count($ListaForosConsultasProfesores) <= 0) { ?>
                            <h2 class="warning">Parece que de momento no hay mensajes</h2>
                        <?php } else {
                            foreach ($ListaForosConsultasProfesores as $foro) {?>
                                Ultimo mensaje <?php echo htmlspecialchars($foro->fechaCreacion->format("Y-m-d H:i:s")); ?>: <?php echo htmlspecialchars($foro->contenidoRespuesta); ?></p>
                            <?php }
                        }
                     ?>
                </p>
				<br>
				<p class="contenidoPanel"><a href="" id="foro3">Exámenes</a></p>
				<p id="contenidof3">
                    <?php
                        if (count($ListaForosExamenes) <= 0) { ?>
                            <h2 class="warning">Parece que de momento no hay mensajes</h2>
                        <?php } else {
                            foreach ($ListaForosExamenes as $foro) {?>
                                Ultimo mensaje <?php echo htmlspecialchars($foro->fechaCreacion->format("Y-m-d H:i:s")); ?>: <?php echo htmlspecialchars($foro->contenidoRespuesta); ?></p>
                            <?php }
                        }
                     ?>
                </p>
				<br>

			</div>

            <!-- Panel de Mensajes -->
            <div class="panel">
                <p class="tituloPanel">Lista de mensajes</p>
                <?php
                    if (count($ListaMensajes) <= 0) { ?>
                        <h2 class="warning">Parece que de momento no hay mensajes</h2>
                    <?php } else {
                        foreach ($ListaMensajes as $mensaje) {?>
                            <?php echo htmlspecialchars($mensaje->textoMensaje); ?></p>
                        <?php }
                    }
                ?>
            </div>

            <!-- Panel de Eventos -->
            <div class="panel">
                <p class="tituloPanel">Lista de Eventos</p>
                <?php                
                    if (count($ListaEventos) <= 0) { ?>
                        <h2 class="warning">Parece que de momento no hay mensajes</h2>
                    <?php } else {
                        foreach ($ListaEventos as $evento) {?>
                            <?php echo htmlspecialchars($evento->nombreEvento); ?></p>
                        <?php }
                    }
                ?>
            </div>
            
        </div>

    </div>


    <!--Scripts-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="./js/profesor/"></script>

    <script type="text/javascript">
        //window.addEventListener("load", searchErrors);
    </script>
</body>

</html>