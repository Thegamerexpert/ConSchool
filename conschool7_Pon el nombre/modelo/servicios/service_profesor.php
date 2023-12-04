<?php

class Service_Profesor
{
    public static function Leer_NombreAlumno($sesion)
    {
        return $sesion->getName();
    }
    public static function Leer_Apellidos($sesion)
    {
        return $sesion->getApellidos();
    }
    public static function Leer_Curso($sesion)
    {
        return $sesion->getCursoActual();
    }
    public static function Leer_Centro($sesion)
    {
        return $sesion->getIdCentro();
    }
    public static function actualizarDatos(){
        
    }

    //Esta opcion no se usa, pero en caso de pruebas cambiala en pages/fragments/menu y la referencia
    public static function Leer_TipoUsuario($sesion)
    {
        return $sesion->getTipoUsuario();
    }
}
