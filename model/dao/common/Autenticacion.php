<?php
class Autenticacion
{
    const claveUsuario = 'Usuario';
    const cookieUsuario = 'Usuario';
    const cookieUsuarioClassName = 'usuarioPerfil';

    public static function autenticar($usuario, $contrasena)
    {
        if ($response = Servicio_Autenticacion::validarUsuarioContrasena($usuario, $contrasena)) {
            //Cookies
            //$_SESSION[self::claveUsuario] = $usuario;
            setcookie(self::cookieUsuario, $usuario);
            setcookie(self::cookieUsuarioClassName, self::cookieUsuarioClassName);

            //print_r($response);
            //Convert in Usuario object
            $usuarioPerfil = Usuario::frontBody();
            foreach ($response as $object) {
                $usuarioPerfil = Usuario::toUserVista($object);
            }

            //Save on session
            //print_r($usuarioPerfil);
            $_SESSION["usuarioPerfil"] = $usuarioPerfil;
            return true;
        } else {
            return false;
        }
    }

    public static function ObtenerUsuario()
    {
        if (self::estaAutenticado()) {
            return true;
        }
        return false;
    }

    public static function estaAutenticado()
    {
        return isset($_SESSION[self::cookieUsuarioClassName]);
    }

    public static function getCookie()
    {
        if (isset($_COOKIE[self::cookieUsuarioClassName])) {
            return $_COOKIE[self::cookieUsuarioClassName];
        }
        return null;
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
