<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/domicilio.php');
$id_localidad = $_GET['id_localidad'];

borrarLocalidad($id_localidad);
header("location: listado.php?vali=3");