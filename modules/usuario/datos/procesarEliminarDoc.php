<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/documento.php');
$id_documentoxpersona = $_GET['id_docxperso'];

borrarEmpleadoDocumento($id_documentoxpersona);
header("location: datos.php");