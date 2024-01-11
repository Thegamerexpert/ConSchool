<?php session_start();?>
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

			<p class="tituloPestanya">Asignaturas - Alumno</p>

			<div class="panel">

				<p class="tituloPanel">En curso</p>
				<br>
				

				<table class="tabla paddingEntreColumnas">
				  <thead>
				    <tr>
				      <th>Asignatura</th>
				      <th>Nota</th>
				    </tr>
				  </thead>
				  <tbody>
				    <tr>
				      <td id="asignatura1">Lengua castellana y literatura</td>
				      <td id="nota1"></td>
				    </tr>
				    <tr>
				      <td id="asignatura2">Ciencias Sociales</td>
				      <td id="nota2"></td>
				    </tr>
				    <tr>
				      <td id="asignatura3">Matemáticas</td>
				      <td id="nota3"></td>
				    </tr>
				    <tr>
				      <td id="asignatura4">Educación física</td>
				      <td id="nota4"></td>
				    </tr>
				    <tr>
				      <td id="asignatura5">Dibujo técnico</td>
				      <td id="nota5"></td>
				    </tr>
				  </tbody>
				</table>
				


			</div>

			<div class="panel">

				<p class="tituloPanel">Finalizadas</p>
				<br>
				
				<table class="tabla paddingEntreColumnas">
				  <thead>
				    <tr>
				      <th>Asignatura</th>
				      <th>Nota</th>
				    </tr>
				  </thead>
				  <tbody>
				    <tr>
				      <td><!-- Colocar las asignaturas una vez tengan nota--></td>
				      <td id="notaf1"></td>
				    </tr>
				    <tr>
				      <td><!-- Colocar las asignaturas una vez tengan nota--></td>
				      <td id="notaf2"></td>
				    </tr>
				    <tr>
				      <td><!-- Colocar las asignaturas una vez tengan nota--></td>
				      <td id="notaf3"></td>
				    </tr>
				    <tr>
				      <td><!-- Colocar las asignaturas una vez tengan nota--></td>
				      <td id="notaf4"></td>
				    </tr>
				    <tr>
				      <td><!-- Colocar las asignaturas una vez tengan nota--></td>
				      <td id="notaf5"></td>
				    </tr>
				  </tbody>
				</table>

			</div>


		</div>



	</div>

	<!--RETOCAR LA FRANJA AZUL EN PRÓXIMOS ENTREGABLES -->
<script>

	

</script>
<?php
// Conecta a la base de datos (esto podría estar en un archivo de configuración separado)
$servername = "localhost:3307";
$username = "conschool";
$password = "conschool";
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
} }else {
    // No se encontraron resultados, maneja el caso apropiadamente
} 

$queryAsignaturas = "SELECT a.Nombre AS Asignatura, n.calificacion FROM Asignatura AS a
                    LEFT JOIN Nota AS n ON a.idAsignatura = n.idAsignatura
                    WHERE n.idUsuario = '$userID'";
$resultAsignaturas = mysqli_query($con, $queryAsignaturas);

// Verifica si se encontraron resultados
if (mysqli_num_rows($resultAsignaturas) > 0) {
    // Muestra las asignaturas en la tabla
    $filaIndex = 1;
    while ($rowAsignatura = mysqli_fetch_assoc($resultAsignaturas)) {
        $nombreAsignatura = $rowAsignatura['Asignatura'];
        $nota = $rowAsignatura['calificacion'];

        echo '<script>';
        echo 'document.getElementById("asignatura' . $filaIndex . '").textContent = "' . $nombreAsignatura . '";';
        echo 'document.getElementById("nota' . $filaIndex . '").textContent = "' . $nota . '";';
        echo '</script>';

        $filaIndex++;
    }
} else {
    // Si no hay asignaturas en curso, puedes mostrar un mensaje o hacer algo más
}

?>
</body>
</html>