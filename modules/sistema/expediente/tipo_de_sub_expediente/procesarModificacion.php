<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/expediente.php');


$nombre = $_POST['nombre'];
$id_expsubtipo = $_POST['id_expsubtipo'];

modificarSubTipoExpediente($nombre, $id_expsubtipo);
header("location: listado.php?vali=2");