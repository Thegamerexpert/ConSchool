<?php
include_once("../../model/MySql/connection2.php");

class Servicio_Foro
{
    //*****Leer todos los Eventos Foro */
    public static function LeerEventosTutorias()
    {
        //$resultado = MySqlBd::consultaLectura("SELECT contrasena FROM `usuarios` WHERE `nombre` = ?", $usuario);
        //$resultado = MySqlBd::consultaLectura("SELECT * FROM categoriasf1 c1 
        //INNER JOIN temasf1 t1 ON c1.idCategoria = t1.idCategoria LIMIT 5");
        //$resultado = MySqlBd::consultaLectura("SELECT * FROM categoriasf1 c1 INNER JOIN temasf1 t1 ON c1.idCategoria = t1.idCategoria INNER JOIN respuestasf1 r1 ON t1.idUsuario = r1.idUsuario LIMIT 5");
        $resultado = MySqlBd::consultaLectura("SELECT * FROM categoriasf1 c1 INNER JOIN temasf1 t1 ON c1.idCategoria = t1.idCategoria INNER JOIN respuestasf1 r1 ON t1.idUsuario = r1.idUsuario ORDER BY r1.fechaCreacion DESC");

        $retorno = array();
        if (count($resultado) > 0) {
            foreach ($resultado as $object) {
                //print_r($object);
                $foro = Foro::toUserVistaTutoria($object);

                array_push($retorno, $foro);
            }
            return $retorno;
        }
        return false;

        //return count($resultado) == 1 && $resultado[0]['contrasena']  == ($contrasena = hash("sha256", $contrasena));
    }
    public static function LeerEventosConsultasProf()
    {
        //$resultado = MySqlBd::consultaLectura("SELECT contrasena FROM `usuarios` WHERE `nombre` = ?", $usuario);
        //$resultado = MySqlBd::consultaLectura("SELECT * FROM categoriasf1 c1 
        //INNER JOIN temasf1 t1 ON c1.idCategoria = t1.idCategoria LIMIT 5");
        //$resultado = MySqlBd::consultaLectura("SELECT * FROM categoriasf1 c1 INNER JOIN temasf1 t1 ON c1.idCategoria = t1.idCategoria INNER JOIN respuestasf1 r1 ON t1.idUsuario = r1.idUsuario LIMIT 5");
        $resultado = MySqlBd::consultaLectura("SELECT * FROM categoriasf2 c2 INNER JOIN temasf2 t2 ON c2.idCategoria = t2.idCategoria INNER JOIN respuestasf2 r2 ON t2.idUsuario = r2.idUsuario ORDER BY r2.fechaCreacion DESC");

        $retorno = array();
        if (count($resultado) > 0) {
            foreach ($resultado as $object) {
                //print_r($object);
                $foro = Foro::toUserVistaTutoria($object);

                array_push($retorno, $foro);
            }
            return $retorno;
        }
        return false;

        //return count($resultado) == 1 && $resultado[0]['contrasena']  == ($contrasena = hash("sha256", $contrasena));
    }
    public static function LeerEventosExamenes()
    {
        //$resultado = MySqlBd::consultaLectura("SELECT contrasena FROM `usuarios` WHERE `nombre` = ?", $usuario);
        //$resultado = MySqlBd::consultaLectura("SELECT * FROM categoriasf1 c1 
        //INNER JOIN temasf1 t1 ON c1.idCategoria = t1.idCategoria LIMIT 5");
        //$resultado = MySqlBd::consultaLectura("SELECT * FROM categoriasf1 c1 INNER JOIN temasf1 t1 ON c1.idCategoria = t1.idCategoria INNER JOIN respuestasf1 r1 ON t1.idUsuario = r1.idUsuario LIMIT 5");
        $resultado = MySqlBd::consultaLectura("SELECT * FROM categoriasf3 c3 INNER JOIN temasf3 t3 ON c3.idCategoria = t3.idCategoria INNER JOIN respuestasf3 r3 ON t3.idUsuario = r3.idUsuario ORDER BY r3.fechaCreacion DESC");

        $retorno = array();
        if (count($resultado) > 0) {
            foreach ($resultado as $object) {
                //print_r($object);
                $foro = Foro::toUserVistaTutoria($object);

                array_push($retorno, $foro);
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
