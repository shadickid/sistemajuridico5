<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/domicilio.php');
$nombre = $_POST['nombre'];
$id_pais = $_POST['id_pais'];

if (empty($nombre)) {
    echo "Tiene que tener algun campo el nombre";
    exit;
}
if ($id_pais != 0) {
    agregarProvincia($nombre, $id_pais);

    header("location: listado.php");
} else {
    echo "Tiene que selecionar algun campo en el select";
}
