<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/domicilio.php');
$nombre = $_POST['nombre'];
$id_provincia = $_POST['id_provincia'];
if (empty(trim($nombre))) {
    echo "Tiene que tener algun campo el nombre";
} elseif ($id_provincia != 0) {
    agregarLocalidad($nombre, $id_provincia);
    header("location: listado.php?vali=1");
} else {
    echo "Tiene que selecionar algun campo en el select";
}