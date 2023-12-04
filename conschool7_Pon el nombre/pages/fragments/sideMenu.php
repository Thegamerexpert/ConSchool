<div class="colDatosPersonales">

    <img class="fotoPersonal" src="../../media/profile/cara_generica.jpg" alt="Foto personal">
    <?php //Manda la session?>
    <p >Nombre: <span class="nombre"><?php echo $dataUser::Leer_NombreAlumno($session); ?></span></p>
    <br>
    <p >Apellidos: <span class="apellidos"><?php echo $dataUser::Leer_Apellidos($session); ?></span></p>
    <br>
    <p>Curso: <span class="cursoActual"><?php echo $dataUser::Leer_Curso($session); ?></span></p>
    <br>
    <p>Número de centro: <span class="centro"><?php echo $dataUser::Leer_Centro($session); ?></span></p>
    <button class="" onclick="logout()">Log out</button>
</div>