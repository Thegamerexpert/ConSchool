<?php

class Nota
{
    public int $idNota;
    public float $calificacion;
    public DateTime $fecha_calificacion;
    public int $idAsignatura;
    public int $idUsuario;

    public function __construct(String $idNota, string $calificacion, 
    String $fecha_calificacion, String $idAsignatura, String $idUsuario,)
    {
        $this->idNota = (int)$idNota;
        $this->calificacion = (float)$calificacion;
        $this->fecha_calificacion = $fecha_calificacion;
        $this->idAsignatura = (int)$idAsignatura;
        $this->idUsuario = (int)$idUsuario;
    }

    public static function fromBody() {
        $fecha_calificacion = new DateTime();

        if (isset($_POST["nota"]) && isset($_POST["calificacion"]) && isset($_POST["asignatura"]) && isset($_POST["usuario"])) {
            return new Nota($_POST["nota"] , $_POST["calificacion"] ,$fecha_calificacion->format("c"), $_POST["asignatura"] , $_POST["usuario"]);
        } else {
            return new Nota("0" , "0.0" ,$fecha_calificacion->format("c"), "0" , "0");            
        }
        
    }
}
