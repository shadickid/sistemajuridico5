<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/expediente.php');
$id_expsubtipo = $_GET['id_expsubtipo'];

borrarSubTipoExpediente($id_expsubtipo);
header("location: listado.php");