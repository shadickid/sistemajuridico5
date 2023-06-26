<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/expediente.php');
$id_expediente_tipo = $_GET['id_expediente_tipo'];

borrarTipoExpediente($id_expediente_tipo);
header("location: listado.php");