<?php

class Centro_Educativo
{
    public int $id_Centro;
    public string $nombre;
    public string $direccion;
    public string $Telefono;
    public string $correo_electronico;
    public int $Usuario_idUsuario;
    public int $asignatura_idAsignatura;
    public int $asignatura_idAsignatura1;

    function __construct(string $id_Centro, string $nombre, 
    string $direccion, string $Telefono, string $correo_electronico, 
    string $Usuario_idUsuario, string $asignatura_idAsignatura, 
    string $asignatura_idAsignatura1)
    {
        $this->id_Centro = (int)$id_Centro;
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->Telefono = $Telefono;
        $this->correo_electronico = $correo_electronico;
        $this->Usuario_idUsuario = (int)$Usuario_idUsuario;
        $this->asignatura_idAsignatura = (int)$asignatura_idAsignatura;
        $this->asignatura_idAsignatura1 = (int)$asignatura_idAsignatura1;
    }

    public static function fromBody()
    {
        if (isset($_POST['idCentro']) && isset($_POST['nombre']) && isset($_POST['direccion']) && isset($_POST['Telefono']) 
        && isset($_POST['correoElectronico']) && isset($_POST['UsuarioIdUsuario']) && isset($_POST['asignaturaIdAsignatura']) 
    && isset($_POST['asignaturaIdAsignatura1'])) {
            return new Material($_POST['idCentro'], $_POST['nombre'], $_POST['direccion'], $_POST['Telefono'], $_POST['correoElectronico'], 
            $_POST['UsuarioIdUsuario'], $_POST['asignaturaIdAsignatura'], $_POST['asignaturaIdAsignatura1']);
        } else {
            return new Material("0", "", "", "", "", "0", "0", "0");
        }
    }
}
