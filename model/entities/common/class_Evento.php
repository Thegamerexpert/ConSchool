<?php

class Evento
{
    public int $idEvento;
    public string $nombreEvento;
    public string $descripcion;
    public DateTime $fechaEvento;
    public DateTime $horaEvento;

    function __construct(string $idEvento, string $nombreEvento, 
    string $descripcion, string $fechaEvento, string $horaEvento)
    {
        $this->idEvento = (int)$idEvento;
        $this->nombreEvento = $nombreEvento;
        $this->descripcion = $descripcion;
        $this->fechaEvento = new DateTime($fechaEvento);
        $this->horaEvento = new DateTime($horaEvento);
    }

    public static function frontBody()
    {
        $fecha = new DateTime(); 
        $fechaEvento = $fecha->format("Y-m-d");
        $horaEvento = $fecha->format("H:i:s");

        if (isset($_POST['idEvento']) && isset($_POST['nombreEvento']) && isset($_POST['descripcion']) && isset($_POST['fechaEvento']) && isset($_POST['horaEvento'])) {
            return new Evento($_POST['idEvento'], $_POST['nombreEvento'], $_POST['descripcion'], $fechaEvento, $horaEvento);
        } else {
            return new Evento("0", "", "", $fechaEvento, $horaEvento);
        }
    }

    public static function toUserVista($object)
    {
        //print_r($object);
        return new Evento($object["idEvento"], $object["nombreEvento"], $object["descripcion"], $object["fechaEvento"], $object["horaEvento"]);
    }
}
