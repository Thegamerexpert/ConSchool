<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ConSchool</title>
    <link rel="stylesheet" href="./css/login/style.css">
</head>
<body>
<div class="container">
        <form id="login-form" action="./php/login/login.php" method="post">
            <h2><img src="./media/logo/logo1.png" alt="" srcset=""></h2>
            <div class="form-group">
                <label for="username">Usuario:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>
            
            <button type="submit">Ingresar</button>
        </form>
    </div>

    <?php
    //Se puede eliminar este fragmento, solo comprueba que la sesion se haya eliminado
    include_once("./modelo/entidades/usuario.php");
    include_once("./modelo/servicios/service_alumno.php");
    session_start();
    if (isset($_SESSION['userData'])) {
        echo "Logged <br/>";
        echo Service_Alumno::Leer_NombreAlumno($_SESSION['userData']);
    }

    //Captura los posibles errores
     include("./js/general.php");
     ?>     
</body>
</html>