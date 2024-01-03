<?php
class Autenticacion
{
    const claveUsuario = 'Usuario';
    const cookieUsuario = 'Usuario';
    const cookieUsuarioClassName = 'usuarioClase';
    
    public static function autenticar($usuario, $contrasena)
    {
        if ($response = Servicio_Autenticacion::validarUsuarioContrasena($usuario, $contrasena)) {
            //Cookies
            //$_SESSION[self::claveUsuario] = $usuario;
            setcookie(self::cookieUsuario, $usuario);
            setcookie(self::cookieUsuarioClassName, self::cookieUsuarioClassName);
            
            $object = json_decode($response);
            //print_r($object);
            
            
            /*echo $object[0]->idUsuario;
            echo $object[0]->Nombre;
            echo $object[0]->Apellidos;
            echo $object[0]->cursoActual;
            echo $object[0]->id_centro;
            echo $object[0]->tipo;*/

            //Create arrayStorage
            $arrayMemory = array();
            //Convert
            //array_push($arrayMemory,Usuario::fromBody($object));
            
            //Save on session
            $_SESSION["usuarioClase"] = json_encode(Usuario::fromBody($object));            
            //$_SESSION["usuarioClase"] = $arrayMemory;
            //print_r($_SESSION["usuarioClase"]);
            
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
