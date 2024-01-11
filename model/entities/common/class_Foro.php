<?php

class Foro
{
    //Tabla categoriasf1
    public int $idCategoria;
    public string $nombreCategoria;
    public string $descripcionCategoria;
    //Tabla respuestasf1
    public int $idRespuesta;
    public int $idUsuarioRespuestas;
    public int $idTemaRespuestas;
    public DateTime $fechaCreacion;
    public string $contenidoRespuesta;
    //Tabla temasf1
    public int $idTema;
    public int $idUsuario;
    public int $idCategoriaTema;
    public string $tituloTema;
    public DateTime $fechaCreacionTemas;
    public string $contenidoPrimeraRespuesta;



    function __construct(
        //Tabla categoriasf1
        string $idCategoria,
        string $nombreCategoria,
        string $descripcionCategoria,
        //Tabla respuestasf1
        string $idRespuesta,
        string $idUsuarioRespuestas,
        string $idTemaRespuestas,
        string $fechaCreacion,
        string $contenidoRespuesta,
        //Tabla temasf1
        string $idTema,
        string $idUsuario,
        string $idCategoriaTema,
        string $tituloTema,
        string $fechaCreacionTemas,
        string $contenidoPrimeraRespuesta
        )
    {
        //Tabla categoriasf1
        $this->idCategoria = (int)$idCategoria;
        $this->nombreCategoria = $nombreCategoria;
        $this->descripcionCategoria = $descripcionCategoria;
        //Tabla respuestasf1
        $this->idRespuesta = (int)$idRespuesta;
        $this->idUsuarioRespuestas = (int)$idUsuarioRespuestas;
        $this->idTemaRespuestas = (int)$idTemaRespuestas;
        $this->fechaCreacion = new DateTime($fechaCreacion);
        $this->contenidoRespuesta = $contenidoRespuesta;
        //Tabla temasf1
        $this->idTema = (int)$idTema;
        $this->idUsuario = (int)$idUsuario;
        $this->idCategoriaTema = (int)$idCategoriaTema;
        $this->tituloTema = $tituloTema;
        $this->fechaCreacionTemas = new DateTime($fechaCreacionTemas);
        $this->contenidoPrimeraRespuesta = $contenidoPrimeraRespuesta;
    }

    public static function frontBodyTutoria()
    {
        $fecha = new DateTime(); 
        $fechaCreacion = $fecha/*->format("Y-m-d")*/;
        $fechaCreacionTemas = $fecha/*->format("H:i:s")*/;

        if (isset($_POST['idCategoria']) && isset($_POST['nombreCategoria']) && 
        isset($_POST['descripcionCategoria']) && isset($_POST['idRespuesta']) && 
        isset($_POST['idUsuarioRespuestas']) && isset($_POST['idTemaRespuestas']) && 
        isset($_POST['fechaCreacion']) && isset($_POST['contenidoRespuesta']) && 
        isset($_POST['idTema']) && isset($_POST['idUsuario']) && 
        isset($_POST['idCategoriaTema']) && isset($_POST['tituloTema']) && 
        isset($_POST['fechaCreacionTemas']) && isset($_POST['contenidoPrimeraRespuesta'])) {
            return new Foro($_POST['idCategoria'], $_POST['nombreCategoria'], $_POST['descripcionCategoria'], 
            $_POST['idRespuesta'], $_POST['idUsuarioRespuestas'], $_POST['idTemaRespuestas'], $_POST['fechaCreacion'], 
            $_POST['contenidoRespuesta'], $_POST['idTema'], $_POST['idUsuario'], $_POST['idCategoriaTema'], 
            $_POST['tituloTema'], $_POST['fechaCreacionTemas'], $_POST['contenidoPrimeraRespuesta']);
        } else {
            return new Foro('0', '', '', 
            '0', '0', '0', $fechaCreacion->format("Y-m-d H:i:s"), 
            '', '0', '0', '0', 
            '', $fechaCreacionTemas->format("Y-m-d H:i:s"), '');
        }
    }

    public static function toUserVistaTutoria($object)
    {
        //print_r($object);
        /*return new Foro($object['idCategoria'], $object['nombreCategoria'], $object['descripcionCategoria'], 
        $object['idRespuesta'], $object['idUsuarioRespuestas'], $object['idTemaRespuestas'], $object['fechaCreacion'], 
        $object['contenidoRespuesta'], $object['idTema'], $object['idUsuario'], $object['idCategoriaTema'], 
        $object['tituloTema'], $object['fechaCreacionTemas'], $object['contenidoPrimeraRespuesta']);*/
        return new Foro($object['idCategoria'], $object['nombreCategoria'], $object['descripcionCategoria'], 
        $object['idRespuesta'], $object['idUsuario'], $object['idTema'], $object['fechaCreacion'], 
        $object['contenidoRespuesta'], $object['idTema'], $object['idUsuario'], $object['idCategoria'], 
        $object['tituloTema'], $object['fechaCreacion'], $object['contenidoPrimeraRespuesta']);
    }

    /*public static function frontBody()
    {
        $fecha = new DateTime(); 
        $fechaCreacion = $fecha;
        $fechaCreacionTemas = $fecha;

        if (isset($_POST['idCategoria']) && isset($_POST['nombreCategoria']) && 
        isset($_POST['descripcionCategoria']) && isset($_POST['idRespuesta']) && 
        isset($_POST['idUsuarioRespuestas']) && isset($_POST['idTemaRespuestas']) && 
        isset($_POST['fechaCreacion']) && isset($_POST['contenidoRespuesta']) && 
        isset($_POST['idTema']) && isset($_POST['idUsuario']) && 
        isset($_POST['idCategoriaTema']) && isset($_POST['tituloTema']) && 
        isset($_POST['fechaCreacionTemas']) && isset($_POST['contenidoPrimeraRespuesta'])) {
            return new Foro($_POST['idCategoria'], $_POST['nombreCategoria'], $_POST['descripcionCategoria'], 
            $_POST['idRespuesta'], $_POST['idUsuarioRespuestas'], $_POST['idTemaRespuestas'], $_POST['fechaCreacion'], 
            $_POST['contenidoRespuesta'], $_POST['idTema'], $_POST['idUsuario'], $_POST['idCategoriaTema'], 
            $_POST['tituloTema'], $_POST['fechaCreacionTemas'], $_POST['contenidoPrimeraRespuesta']);
        } else {
            return new Foro('0', '', '', 
            '0', '0', '0', $fechaCreacion->format("c"), 
            '', '0', '0', '0', 
            '', $fechaCreacionTemas->format("c"), '');
        }
    }

    public static function toUserVista($object)
    {
        print_r($object);
        /*return new Foro($object['idCategoria'], $object['nombreCategoria'], $object['descripcionCategoria'], 
        $object['idRespuesta'], $object['idUsuarioRespuestas'], $object['idTemaRespuestas'], $object['fechaCreacion'], 
        $object['contenidoRespuesta'], $object['idTema'], $object['idUsuario'], $object['idCategoriaTema'], 
        $object['tituloTema'], $object['fechaCreacionTemas'], $object['contenidoPrimeraRespuesta']);
        return new Foro($object['idCategoria'], $object['nombreCategoria'], $object['descripcionCategoria'], 
        $object['idRespuesta'], $object['idUsuario'], $object['idTema'], $object['fechaCreacion'], 
        $object['contenidoRespuesta'], $object['idTema'], $object['idUsuario'], $object['idCategoria'], 
        $object['tituloTema'], $object['fechaCreacion'], $object['contenidoPrimeraRespuesta']);
    }*/
    
}
