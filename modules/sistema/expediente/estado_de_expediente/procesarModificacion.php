<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/expediente.php');


$nombre = $_POST['nombre'];
$id_expediente_estado = $_POST['id_expediente_estado'];

modificarEstadoExpediente($nombre, $id_expediente_estado);
header("location: listado.php?vali=2");