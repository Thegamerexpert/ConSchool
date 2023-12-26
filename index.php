<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/estilo.css">
    <title>Login Conschool</title>
</head>
<body>
<div class="container">
        <form id="login-form" action="./back/login.php" method="post">
            <h2><img src="./imagenes/logo1.png" alt="" srcset=""></h2>
            <div class="form-group">
                <label for="username">Usuario:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="user-type">Tipo de Usuario:</label>
                <select id="user-type" name="user-type">
                    <option value="alumno">Alumno</option>
                    <option value="profesor">Profesor</option>
                    
                    <option value="administracion">Administración</option>
                </select>
            </div>
            <button type="submit">Ingresar</button>
        </form>
    </div>
    <script src="./js/script.js"></script>
</body>
</html>