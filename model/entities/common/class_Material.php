<?php

class Material
{
    public int $id_Material;
    public string $Nombre;
    public string $descripcion;
    public string $fecha_creacion;
    public int $id_profesor;
    public int $id_Asignatura;

    function __construct(string $id_Material, string $Nombre,string $descripcion,
    string $fecha_creacion,string $id_profesor,string $id_Asignatura) {
        $this->id_Material = (int)$id_Material;
        $this->Nombre = $Nombre;
        $this->descripcion = $descripcion;
        $this->fecha_creacion = $fecha_creacion;
        $this->id_profesor = (int)$id_profesor;
        $this->id_Asignatura = (int)$id_Asignatura;
    }

    public static function fromBody()
    {
        if (isset($_POST['idMaterial']) && isset($_POST['Nombre']) && isset($_POST['descripcion']) && isset($_POST['fechaCreacion']) && isset($_POST['idProfesor']) && isset($_POST['idAsignatura'])) {
            return new Material($_POST['idMaterial'], $_POST['Nombre'], $_POST['descripcion'], $_POST['fechaCreacion'], $_POST['idProfesor'], $_POST['idAsignatura']);
        } else {
            return new Material("0", "", "", "", "0", "0");
        }
    }
}
