<?php
?>
<nav class="navBar">
    <a href="./index.php">
        <div class="logoNav"><img src="../../media/logo/logo1_Definitivo.png" alt="Logo de ConSchool"></div>
    </a>
    <ul class="menu">
        <?php
        //Verifica el tipo de usuario, Cambia el servicio en caso de prueba a Profe, alumno, o dirección
        switch (General_Functions::Leer_TipoUsuario($_SESSION['userData'])) {
            case 'alumno': ?>
                <li class="elementoMenu"><a href="../alumno/index.php">Inicio</a></li>
				<li class="elementoMenu"><a href="../alumno/">Asignaturas</a></li>
				<li class="elementoMenu"><a href="../alumno/foros.php">Foros</a></li>
				<li class="elementoMenu"><a href="../alumno/">Mensajes</a></li>
				<li class="elementoMenu"><a href="../alumno/">Agenda</a></li>
            <?php break;
            case 'profesor': ?>
                <li class="elementoMenu"><a href="../profesor/index.php">Inicio</a></li>
				<li class="elementoMenu"><a href="../profesor/">Cursos</a></li>
				<li class="elementoMenu"><a href="../profesor/foros.php">Foros</a></li>
				<li class="elementoMenu"><a href="../profesor/">Mensajes</a></li>
				<li class="elementoMenu"><a href="../profesor/">Agenda</a></li>
            <?php break;
            case 'administracion': ?>
                <li class="elementoMenu"><a href="../directivo/index.php">Inicio</a></li>
				<li class="elementoMenu"><a href="../directivo/">Cursos</a></li>
				<li class="elementoMenu"><a href="../directivo/foros.php">Foros</a></li>
				<li class="elementoMenu"><a href="../directivo/">Mensajes</a></li>
				<li class="elementoMenu"><a href="../directivo/">Agenda</a></li>
        <?php break;
        }
        ?>

    </ul>
</nav>