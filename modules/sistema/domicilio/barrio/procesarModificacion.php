<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/domicilio.php');
$nombre = $_POST['nombre'];
$id_barrio = $_POST['id_barrio'];
$id_localidad = $_POST['localidad'];

if (empty($nombre)) {
    echo "Tiene que tener algun campo el nombre";
    exit;
}
if ($id_localidad != 0) {
    modificarBarrio($nombre, $id_localidad, $id_barrio);
    header("location: listado.php");
} else {
    echo "Tiene que selecionar algun campo en el select";
}
