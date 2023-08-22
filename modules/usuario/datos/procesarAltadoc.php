<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/documento.php');
$tipodocumento = $_POST['tipodocumento'];
$valordocumento = $_POST['valordocumento'];
$id_persona = $_POST['id_persona'];

agregarEmpleadoDocumento($valordocumento, $id_persona, $tipodocumento);
header("location: datos.php");