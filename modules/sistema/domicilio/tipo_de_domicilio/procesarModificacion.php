<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/domicilio.php');
$nombre = $_POST['nombre'];
$id_tipo_dom = $_POST['id_tipo_dom'];

modificarTipoDomicilio($nombre, $id_tipo_dom);
header("location: listado.php?vali=2");