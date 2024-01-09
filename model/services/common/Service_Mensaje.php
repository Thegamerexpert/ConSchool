<?php
include_once("../../model/MySql/connection2.php");

class Servicio_Mensaje
{
    //*****Leer todos los mensajes */
    public static function LeerMensajes()
    {
        //$resultado = MySqlBd::consultaLectura("SELECT contrasena FROM `usuarios` WHERE `nombre` = ?", $usuario);
        $resultado = MySqlBd::consultaLectura("SELECT `idMensaje`, `idRemitente`, `idDestinatario`, `textoMensaje`, `fechaHoraEnvio`, `leido` FROM `mensajes`");

        $retorno = array();
        if (count($resultado) > 0) {
            foreach ($resultado as $object) {
                $mensaje = Mensaje::toUserVista($object);

                array_push($retorno, $mensaje);
            }
            return $retorno;
        }
        return false;
        
        //return count($resultado) == 1 && $resultado[0]['contrasena']  == ($contrasena = hash("sha256", $contrasena));
    }
    //*****Fin Leer todos los mensajes */

    //*****Inserta un nuevo mensaje */
    public static function CrearMensaje($mensaje)
    {
        //$resultado = MySqlBd::consultaLectura("SELECT contrasena FROM `usuarios` WHERE `nombre` = ?", $usuario);
        MySqlBd::consultaEscritura("INSERT INTO `mensajes`(`idMensaje`, `idRemitente`, `idDestinatario`, `textoMensaje`, `fechaHoraEnvio`, `leido`) VALUES ('?','?','?','?','?','?')",$mensaje);
    }
    //*****Fin Inserta un nuevo mensaje */

    //*****Elimina un mensaje */
    public static function EliminarMensaje($id)
    {
        //$resultado = MySqlBd::consultaLectura("SELECT contrasena FROM `usuarios` WHERE `nombre` = ?", $usuario);
        MySqlBd::consultaEscritura("DELETE FROM `mensajes` WHERE `idMensaje`= '?'",$id);
    }
    //*****Fin Elimina un mensaje */
}
