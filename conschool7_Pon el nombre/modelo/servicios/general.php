<?php
class General_Functions
{
    public static function Leer_TipoUsuario($sesion)
    {
        return $sesion->getTipoUsuario();
    }

    //Cierra la session, comprobación en el mismo login
    public static function Log_out()
    {
        if ( session_start() == true ) //Si la session existe
        {
            unset( $_SESSION ); //Quita todas las variables
            session_destroy(); //Destruye la session
        }

        header("Location: ../../."); //Redirije al login del sitio
    }

    //Opcion de update, en caso de modificar algun dato
    public static function UpdateUser($sesion){        
        Usuario::update($sesion->getName(),$sesion->getApellidos(),$sesion->getTipoUsuario(),$sesion->getIdCentro(),$sesion->getCursoActual(),$sesion->getIdUsuario());
    }
}
