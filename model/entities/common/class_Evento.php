<?php

class Material
{
    public int $id_Evento;
    public string $nombre_Evento;
    public string $descripcion;
    public DateTime $fecha_Evento;
    public DateTime $hora_Evento;

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
        $fecha = new DateTime(); 
        $fecha_Evento = $fecha->format("Y-m-d");
        $hora_Evento = $fecha->format("H:i:s");

        if (isset($_POST['idEvento']) && isset($_POST['nombreEvento']) && isset($_POST['descripcion']) && isset($_POST['fechaEvento']) && isset($_POST['horaEvento'])) {
            return new Material($_POST['idEvento'], $_POST['nombreEvento'], $_POST['descripcion'], $fecha_Evento, $hora_Evento);
        } else {
            return new Material("0", "", "", $fecha_Evento, $hora_Evento);
        }
    }
}
