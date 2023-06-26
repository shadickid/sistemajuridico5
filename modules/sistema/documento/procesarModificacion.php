<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/documento.php');


$nombre = $_POST['nombre'];
$id_tipo_documento = $_POST['id_tipo_documento'];

modificarDocumento($nombre, $id_tipo_documento);
header("location: listado.php");