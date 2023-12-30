<?php
class Autenticacion
{
    const claveUsuario = 'Usuario';
    const cookieUsuario = 'Usuario';

    public static function autenticar($usuario, $contrasena)
    {
        if ($response = Servicio_Autenticacion::validarUsuarioContrasena($usuario, $contrasena)) {
            $_SESSION[self::claveUsuario] = $usuario;

            setcookie(self::cookieUsuario, $usuario);

            $object = json_decode($response);
            //print_r($object);


            /*echo $object[0]->idUsuario;
            echo $object[0]->Nombre;
            echo $object[0]->Apellidos;
            echo $object[0]->cursoActual;
            echo $object[0]->id_centro;
            echo $object[0]->tipo;*/
            $_SESSION["usuarioClase"] = Usuario::fromBody($object);            
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
