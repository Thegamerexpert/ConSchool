<div class="colDatosPersonales">
    <img class="fotoPersonal" src="../../resources/profesor/cara_generica.jpg" alt="Foto personal">
    <p id="nombre">Nombre: <?php echo $userClass->Nombre; ?></p>
    <br>
    <p id="apellidos">Apellidos: <?php echo $userClass->Apellidos; ?></p>
    <br>
    <p>Curso: <span id="cursoActual"><?php echo $userClass->cursoActual; ?></span></p>
    <br>
    <p>Número de centro: <span id="centro"><?php echo $userClass->id_centro; ?></span></p>
</div>