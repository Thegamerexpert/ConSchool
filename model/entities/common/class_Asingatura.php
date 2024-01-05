<?php

class Asignatura
{
    public int $idAsignatura;
    public string $Nombre;
    public string $Descripcion;
    public int $id_centro;
    public int $Material_idMaterial;
    public int $Nota_idNota;
    public string $Curso;

    function __construct(string $idAsignatura, string $Nombre, string $Descripcion, string $id_centro, string $Material_idMaterial, string $Nota_idNota, string $Curso)
    {
        $this->idAsignatura = (int)$idAsignatura;
        $this->Nombre = $Nombre;
        $this->Descripcion = $Descripcion;
        $this->id_centro = (int)$id_centro;
        $this->Material_idMaterial = (int)$Material_idMaterial;
        $this->Nota_idNota = (int)$Nota_idNota;
        $this->Curso = $Curso;
    }

    public static function fromBody()
    {
        if (
            isset($_POST['idAsignatura']) && isset($_POST['nombre']) && isset($_POST['descripcion']) && isset($_POST['idCentro']) && isset($_POST['MaterialIdMaterial']) && isset($_POST['NotaIdNota']) && isset($_POST['curso'])
        ) {
            return new Material($_POST['idCentro'], $_POST['nombre'], $_POST['direccion'], $_POST['Telefono'], $_POST['correoElectronico'], $_POST['UsuarioIdUsuario'], $_POST['asignaturaIdAsignatura'], $_POST['asignaturaIdAsignatura1']);
        } else {
            return new Material("0", "", "", "0", "0", "0", "");
        }
    }
}
