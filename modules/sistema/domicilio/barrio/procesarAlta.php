<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/domicilio.php');
$nombre = $_POST['nombre'];
$id_localidad = $_POST['id_localidad'];
if (empty($nombre)) {
    echo "Tiene que tener algun campo el nombre";
    exit;
}
if ($id_localidad != 0) {
    agregarBarrio($id_localidad, $nombre);
    header("location: listado.php?vali=1");
} else {
    echo "Tiene que selecionar algun campo en el select";
}