<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/domicilio.php');
$id_barrio = $_GET['id_barrio'];

borrarBarrio($id_barrio);
header("location: listado.php?vali=3");