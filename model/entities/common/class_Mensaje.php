<?php

class Mensaje
{
    public int $idMensaje;
    public int $idRemitente;
    public int $idDestinatario;
    public string  $textoMensaje;
    public DateTime $fechaHoraEnvio;
    public bool $leido;

    function __construct(string $idMensaje, string $idRemitente, string $idDestinatario, string $textoMensaje, string $fechaHoraEnvio, string $leido)
    {
        $this->idMensaje = (int)$idMensaje;
        $this->idRemitente = (int)$idRemitente;
        $this->idDestinatario = (int)$idDestinatario;
        $this->textoMensaje = $textoMensaje;
        $this->fechaHoraEnvio = new DateTime($fechaHoraEnvio);
        $this->leido = (int)$leido;
    }

    public static function frontBody()
    {
        $fechaMensaje = new DateTime();
        if (isset($_POST['idMensaje'], $_POST['idRemitente'], $_POST['idDestinatario'], $_POST['textoMensaje'], $_POST['fechaHoraEnvio'], $_POST['leido'])) {
            return new Mensaje($_POST['idMensaje'], $_POST['idRemitente'], $_POST['idDestinatario'], $_POST['textoMensaje'], $_POST['fechaHoraEnvio'], $_POST['leido']);
        } else {
            return new Mensaje("0", "0", "0", "", $fechaMensaje->format("c"), "0");
        }
    }

    public static function toUserVista($object)
    {
        //print_r($object);
        return new Mensaje($object["idMensaje"], $object["idRemitente"], $object["idDestinatario"], $object["textoMensaje"], $object["fechaHoraEnvio"], $object["leido"]);
    }
}
