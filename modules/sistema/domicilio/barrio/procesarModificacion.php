<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/domicilio.php');
$nombre = $_POST['nombre'];
$id_localidad = $_POST['id_localidad'];
$id_provincia = $_POST['provincia'];
modificarLocalidad($nombre, $id_provincia, $id_localidad);
header("location: listado.php");
