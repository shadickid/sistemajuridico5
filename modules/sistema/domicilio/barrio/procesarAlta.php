<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/domicilio.php');
$nombre = $_POST['nombre'];
$id_provincia = $_POST['id_provincia'];
agregarLocalidad($nombre, $id_provincia);
header("location: listado.php");
