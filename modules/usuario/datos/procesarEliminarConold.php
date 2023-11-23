<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/contacto.php');
$id_contxper = $_GET['id_contxper'];

borrarContactoEmpleado($id_contxper);
header("location: datos.php");