<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/modulo.php');
$nombre = $_POST['nombre'];
if (empty($nombre)) {
    echo "Tiene que tener algun campo el nombre";
    exit;
}
agregarModulo($nombre);
header("location: listado.php?vali=1");