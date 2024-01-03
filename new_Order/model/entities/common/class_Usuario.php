<?php

class Usuario
{
    public int $idUsuario;
    public string $Nombre;
    public string $Apellidos;
    public string $tipo;
    public int $id_centro;
    public string $cursoActual;

    function __construct(
        string $idUsuario,
        string $Nombre,
        string $Apellidos,
        string $tipo,
        string $id_centro,
        string $cursoActual
    ) {
        $this->idUsuario = (int)$idUsuario;
        $this->Nombre = $Nombre;
        $this->Apellidos = $Apellidos;
        $this->tipo = $tipo;
        $this->id_centro = (int)$id_centro;
        $this->cursoActual = $cursoActual;
    }

    public static function toUserVista()
    {
        if (isset($_POST['idUsuario']) && isset($_POST['Nombre']) && isset($_POST['Apellidos']) && isset($_POST['tipo']) && isset($_POST['id_centro']) && isset($_POST['cursoActual'])) {
            return new Usuario($_POST['idUsuario'], $_POST['Nombre'], $_POST['Apellidos'], $_POST['tipo'], $_POST['id_centro'], $_POST['cursoActual']);
        } else {
            return new Usuario("0", "empty", "empty", "empty", "0", "empty");
        }
    }

    public static function fromBody($object)
    {        
        return new Usuario($object[0]->idUsuario, $object[0]->Nombre, $object[0]->Apellidos, $object[0]->tipo, $object[0]->id_centro, $object[0]->cursoActual);
    }

    public function getName() {
        return $this->Nombre;
    }
}
