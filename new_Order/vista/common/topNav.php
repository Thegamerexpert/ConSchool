<header id="encabezado">

    <nav id="navBar">

        <?php

        switch ("profesor") {
            case 'alumno': ?>

                <a href="./index.php">
                    <div id="logoNav"><img id="logo-imagen" src="../../resources/common/logo1_Definitivo.png" alt="Logo de ConSchool"></div>
                </a>
                <ul id="menu">
                    <li class="elementoMenu"><a href="index.php">Inicio</a></li>
                    <li class="elementoMenu"><a href="asignaturas.php">Asignaturas</a></li>
                    <li class="elementoMenu"><a href="foros.php">Foros</a></li>
                    <li class="elementoMenu"><a href="mensajes.php">Mensajes</a></li>
                    <li class="elementoMenu"><a href="agenda.php">Agenda</a></li>
                </ul>

            <?php break;
            case 'profesor': ?>

                <a href="./index.php">
                    <div id="logoNav"><img id="logo-imagen" src="../../resources/common/logo1_Definitivo.png" alt="Logo de ConSchool"></div>
                </a>
                <ul id="menu">
                    <li class="elementoMenu"><a href="index.php">Inicio</a></li>
                    <li class="elementoMenu"><a href="cursos.php">Cursos</a></li>
                    <li class="elementoMenu"><a href="notas.php">Notas</a></li>
                    <li class="elementoMenu"><a href="foros.php">Foros</a></li>
                    <li class="elementoMenu"><a href="mensajes.php">Mensajes</a></li>
                    <li class="elementoMenu"><a href="agenda.php">Agenda</a></li>
                </ul>

            <?php break;
            case 'administracion': ?>

                <a href="./index.php">
                    <div id="logoNav"><img id="logo-imagen" src="../../resources/common/logo1_Definitivo.png" alt="Logo de ConSchool"></div>
                </a>
                <ul id="menu">
                    <li class="elementoMenu"><a href="index.php">Inicio</a></li>
                    <li class="elementoMenu"><a href="altaUsuarios.php">Usuario</a></li>
                    <li class="elementoMenu"><a href="altaCurso.php">Cursos</a></li>
                    <li class="elementoMenu"><a href="mensajes.php">Mensajes</a></li>
                    <li class="elementoMenu"><a href="listarEventos.php">Gestión Agenda</a></li>
                </ul>

        <?php break;
        }

        ?>

        <form action="../../model/services/common/logout.php" method="post">
            <button type="submit" class="cerrar-sesion-btn">
                <img id="cerrar-sesion-btn-img" src="../../resources/common/exit-logout-sign-out.svg"> <!--logo log-out  -->
            </button>
        </form>
    </nav>

</header>