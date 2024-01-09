<?php
include_once("../../model/MySql/connection2.php");

class Servicio_Evento
{
    //*****Leer todos los mensajes */
    public static function LeerEventos()
    {
        //$resultado = MySqlBd::consultaLectura("SELECT contrasena FROM `usuarios` WHERE `nombre` = ?", $usuario);
        $resultado = MySqlBd::consultaLectura("SELECT `idEvento`, `nombreEvento`, `descripcion`, `fechaEvento`, `horaEvento` FROM `eventos`");

        $retorno = array();
        if (count($resultado) > 0) {
            foreach ($resultado as $object) {
                $mensaje = Evento::toUserVista($object);

                array_push($retorno, $mensaje);
            }
            return $retorno;
        }
        return false;

        //return count($resultado) == 1 && $resultado[0]['contrasena']  == ($contrasena = hash("sha256", $contrasena));
    }
    //*****Fin Leer todos los mensajes */

    //*****Inserta un nuevo mensaje */
    public static function CrearEvento($evento)
    {
        //$resultado = MySqlBd::consultaLectura("SELECT contrasena FROM `usuarios` WHERE `nombre` = ?", $usuario);
        MySqlBd::consultaEscritura("INSERT INTO `eventos`(`idEvento`, `nombreEvento`, `descripcion`, `fechaEvento`, `horaEvento`) VALUES ('?','?','?','?','?')", $evento);
    }
    //*****Fin Inserta un nuevo mensaje */

    //*****Elimina un mensaje */
    public static function EliminarEvento($id)
    {
        //$resultado = MySqlBd::consultaLectura("SELECT contrasena FROM `usuarios` WHERE `nombre` = ?", $usuario);
        MySqlBd::consultaEscritura("DELETE FROM `eventos` WHERE `idEvento`='?'", $id);
    }
    //*****Fin Elimina un mensaje */
}
