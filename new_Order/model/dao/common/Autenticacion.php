<?php
class Autenticacion
{
    const claveUsuario = 'Usuario';
    const cookieUsuario = 'Usuario';

    public static function autenticar($usuario, $contrasena)
    {
        if ($row = Servicio_Autenticacion::validarUsuarioContrasena($usuario, $contrasena)) {
            $_SESSION[self::claveUsuario] = $usuario;

            setcookie(self::cookieUsuario, $usuario);

            //print_r($row);

            $_SESSION["usuarioClase"] = Usuario::fromBody($row[0]['idUsuario'], $row[0]['Nombre'], $row[0]['Apellidos'], $row[0]['tipo'], $row[0]['id_centro'], $row[0]['cursoActual']);

            echo $row[0]['idUsuario'];
            echo $row[0]['Nombre'];

            //echo $_SESSION["usuarioClase"];
            //print_r($_SESSION["usuarioClase"]);
            return true;
        } else {
            return false;
        }
    }

    public static function ObtenerUsuario()
    {
        if (self::estaAutenticado()) {
            return $_SESSION[self::claveUsuario];
        }
        return "";
    }

    public static function estaAutenticado()
    {
        return isset($_SESSION[self::claveUsuario]);
    }

    public static function getCookie()
    {
        if (isset($_COOKIE[self::cookieUsuario])) {
            return $_COOKIE[self::cookieUsuario];
        }
        return "";
    }

    private static function redirect($tipo)
    {
        $UsuarioClase = $_SESSION["usuarioClase"];
        // Redireccionar según el tipo de usuario
        switch ($tipo) {
            case 'alumno':
                header("Location: ./new_order/vista/alumno/index.php");
                break;
            case 'profesor':
                header("Location: ./new_order/vista/profesor/index.php");
                break;

            case 'administracion':
                header("Location: ./new_order/vista/directivo/index.php");
                break;
        }
    }
}
