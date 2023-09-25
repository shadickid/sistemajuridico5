<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/modulo.php');
$nombre = $_POST['nombre'];
$id_modulo = $_POST['id_modulo'];

modificarModulo($nombre, $id_modulo);
header("location: listado.php");