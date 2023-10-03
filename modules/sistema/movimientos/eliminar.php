<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/movimiento.php');
$id_tipo_proceso = $_GET['id_tipo_proceso'];

borrarMovimiento($id_tipo_proceso);
header("location: listado.php?vali=3");