<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/expediente.php');
$nombre = $_POST['nombre'];

agregarSubTipoExpediente($nombre);
header("location: listado.php?vali=1");