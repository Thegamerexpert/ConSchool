<?php
include_once("../../model/dao/common/Autenticacion.php");
/*if (!isset($_SESSION['usuarioClase'])) {
    header("Location: ../../../index.php");
    exit;
}*/

if (!Autenticacion::estaAutenticado()) {
    header("Location: ../../index.php");
    exit;
}
?>