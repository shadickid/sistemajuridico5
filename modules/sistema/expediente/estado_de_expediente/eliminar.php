<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/expediente.php');
$id_expediente_estado = $_GET['id_expediente_estado'];

borrarEstadoExpediente($id_expediente_estado);
header("location: listado.php");
