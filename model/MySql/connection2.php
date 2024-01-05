<?php

class MySqlBd
{
  public static function crearConexion()
  {
    static $config = null;
    if (!$config) {
      $config = parse_ini_file(__DIR__ . "../../../config.ini");
    }
    $connection = null;
    $url = $config["host"].":".$config["port"];

    if (!$connection) {
      $connection = new mysqli(
        $url,
        $config["user"],
        $config["pass"],
        $config["bd"]
      );
    }

    return $connection;
  }

  public static function consultaLectura($consulta, ...$parametros)
    {
        $conexion = self::crearConexion();

        $retorno = array();

        $preparando = self::preparar($conexion,$consulta, $parametros);
        $preparando->execute();
        $resultado = $preparando->get_result();

        while ($fila = $resultado->fetch_assoc()) {
            array_push($retorno, $fila);
        }
        return $retorno;
    }

    public static function consultaEscritura($consulta, ...$parametros)
    {
        $conexion = self::crearConexion();
        $preparando = self::preparar($conexion,$consulta, $parametros);
        $preparando->execute();
    }

    private static function preparar($conexion, $consulta, $parametros)
    {
        $preparando = $conexion->prepare($consulta); //Duda 6
        if ($parametros) {
            $tipos = "";
            foreach ($parametros as $parametro) {
                $tipos .= is_integer($parametro) ? "i" : "s";
            }
            $preparando->bind_param($tipos, ...$parametros);
        }

        return $preparando;
    }
}
