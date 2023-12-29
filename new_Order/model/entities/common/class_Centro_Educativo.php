<?php

class Centro_Educativo
{
    public int $Id_centro;
    public string $nombre;
    public string $direccion;
    public string $Telefono;
    public string $correo_electronico;
    public int $Usuario_idUsuario;
    public int $Asignatura_idAsignatura;
    public int $Asignatura_idAsignatura1;

    function __construct(string $id_Evento, string $nombre_Evento, 
    string $descripcion, string $fecha_Evento, string $hora_Evento)
    {
        $this->id_Evento = (int)$id_Evento;
        $this->nombre_Evento = $nombre_Evento;
        $this->descripcion = $descripcion;
        $this->fecha_Evento = $fecha_Evento;
        $this->hora_Evento = (int)$hora_Evento;
    }

    public static function fromBody()
    {

        if (isset($_POST['idEvento']) &&) {
            return new Material($_POST['idEvento'], );
        } else {
            return new Material("0", "", "", "", "", "0", "0", "0");
        }
    }
}
