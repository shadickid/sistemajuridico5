<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/documento.php');
$id_tipo_documento = $_GET['id_tipo_documento'];

borrarDocumento($id_tipo_documento);
header("location: listado.php?vali=3");