<?php 

    class ServiciosMensajes
    {
        private static function inicializar()
        {
            if(!isset($_SESSION['mensajes']))
            {
                $_SESSION['mensajes'] = array();
            }
        }

        public static function obtenerMensajes()
        {
            self::inicializar();
            return $_SESSION['mensajes'];
        }

        public static function insertarMensaje($mensaje)
        {
            self::inicializar();
            array_push($_SESSION['mensajes'], $mensaje);
        }
    }

?>