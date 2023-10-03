<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/movimiento.php');
$nombre = $_POST['nombre'];
$id_tipo_proceso = $_POST['id_tipo_proceso'];

modificarMovimiento($nombre, $id_tipo_proceso);
header("location: listado.php?vali=2");