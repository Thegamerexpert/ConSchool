<?php
class Usuario
{
    private  int $idUsuario;
    private  string $nombre;
    private  string $apellidos;
    private  string $tipoUsuario;
    private  int $idCentro;
    private  string $cursoActual;

    function __construct(
        int $idUsuario,
        string $nombre,
        string $apellidos,
        string $tipoUsuario,
        int $idCentro,
        string $cursoActual
    ) {
        $this->idUsuario = $idUsuario;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->tipoUsuario = $tipoUsuario;
        $this->idCentro = $idCentro;
        $this->cursoActual = $cursoActual;
    }

    public static function create(
        int $idUsuario,
        string $nombre,
        string $apellidos,
        string $tipoUsuario,
        int $idCentro,
        string $cursoActual
    ) {
        return new Usuario($idUsuario, $nombre, $apellidos, $tipoUsuario, $idCentro, $cursoActual);
    }

    //getters
    public function getIdUsuario()
    {
        return $this->nombre;
    }
    public function getName()
    {
        return $this->nombre;
    }
    public function getApellidos()
    {
        return $this->apellidos;
    }
    public function getTipoUsuario()
    {
        return $this->tipoUsuario;
    }
    public function getIdCentro()
    {
        return $this->idCentro;
    }
    public function getCursoActual()
    {
        return $this->cursoActual;
    }

    //setters, En caso de actualizar algun dato
    public function setIdUsuario(int $value)
    {
        $this->idUsuario = $value;
    }
    public function setName(string $value)
    {
        $this->nombre = $value;
    }
    public function setApellidos(string $value)
    {
        $this->apellidos = $value;
    }
    public function setTipoUsuario(string $value)
    {
        $this->tipoUsuario = $value;
    }
    public function setIdCentro(int $value)
    {
        $this->idCentro = $value;
    }
    public function setCursoActual(string $value)
    {
        $this->cursoActual = $value;
    }

    //Opcion de update, en caso de modificar algun dato
    public static function update(string $nombre, string $apellidos, string $tipoUsuario, int $idCentro, string $cursoActual, int $idUsuario)
    {
        include_once("../../php/usuario/update.php");
        new Usuario($idUsuario, $nombre, $apellidos, $tipoUsuario, $idCentro, $cursoActual);
    }
}
