<?php
class Mensaje
{
    public int $idMensaje;
    public string $usuario;
    public string $tipoUsuario;
    public string $mensaje;
    public DateTime $fecha;

    function __construct(string $usuario, string $tipoUsuario, string $mensaje, 
    $fecha)
    {
        $this->usuario = $usuario;
        $this->tipoUsuario = $tipoUsuario;
        $this->mensaje = $mensaje;
        $this->fecha = $fecha;
    }


    public static function fromBody()
    {
        $fecha = new DateTime();

        if (isset($_POST['usuario']) && isset($_POST['tipoUsuario']) && isset($_POST['mensaje'])) {
            return new Mensaje($_POST['usuario'], $_POST['tipoUsuario'], $_POST['mensaje'], $fecha);
        } else {
            return new Mensaje("", "normal", "", $fecha);
        }
    }
}
