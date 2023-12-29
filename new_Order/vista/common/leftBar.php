<div class="colDatosPersonales">
    <img class="fotoPersonal" src="../../resources/profesor/cara_generica.jpg" alt="Foto personal">
    <p id="nombre">Nombre: <?php echo $_SESSION['userName'] ?></p>
    <br>
    <p id="apellidos">Apellidos: <?php echo $_SESSION['Apellidos'] ?></p>
    <br>
    <p>Curso: <span id="cursoActual"><?php echo $_SESSION['cursoActual'] ?></span></p>
    <br>
    <p>Número de centro: <span id="centro"><?php echo $_SESSION['id_centro'] ?></span></p>
</div>