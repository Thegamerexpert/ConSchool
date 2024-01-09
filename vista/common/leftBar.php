<div class="colDatosPersonales">
    <img class="fotoPersonal" src="../../resources/profesor/cara_generica.jpg" alt="Foto personal">
    <p id="nombre">Nombre: <?php echo $usuarioPerfil["Nombre"]; ?></p>
    <br>
    <p id="apellidos">Apellidos: <?php echo $usuarioPerfil["Apellidos"]; ?></p>
    <br>
    <p>Curso: <span id="cursoActual"><?php echo $usuarioPerfil["cursoActual"]; ?></span></p>
    <br>
    <p>Número de centro: <span id="centro"><?php echo $usuarioPerfil["id_centro"]; ?></span></p>
</div>