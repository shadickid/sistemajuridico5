<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/domicilio.php');
$nombre = $_POST['nombre'];
$id_provincia = $_POST['id_provincia'];
if (empty($nombre)) {
    echo "Tiene que tener algun campo el nombre";
    exit;
}
if ($id_provincia != 0) {
    agregarLocalidad($nombre, $id_provincia);
    header("location: listado.php");
} else {
    echo "Tiene que selecionar algun campo en el select";
}
