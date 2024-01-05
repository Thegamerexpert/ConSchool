<?php

class Servicio_Autenticacion
{
    public static function validarUsuarioContrasena($usuario, $contrasena)
    {
        //$resultado = MySqlBd::consultaLectura("SELECT contrasena FROM `usuarios` WHERE `nombre` = ?", $usuario);
        $resultado = MySqlBd::consultaLectura("SELECT idUsuario, Nombre, Apellidos, cursoActual, id_centro, tipo, contrasena FROM Usuario WHERE Nombre = ?", $usuario);

        if (count($resultado) == 1 && $resultado[0]['contrasena']  == ($contrasena = $contrasena)) {
            return json_encode($resultado);
        }
        return false;

        //return count($resultado) == 1 && $resultado[0]['contrasena']  == ($contrasena = hash("sha256", $contrasena));
    }
}
