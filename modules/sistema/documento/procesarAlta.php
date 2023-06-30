<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/documento.php');
$nombre = $_POST['nombre'];
if (!empty(trim($nombre))) {
    agregarDocumento($nombre);
    header("location: listado.php");
} else {
    header("location: listado.php?error=1");
}