<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/domicilio.php');
$id_pais = $_GET['id_pais'];

borrarPais($id_pais);
header("location: listado.php?vali=3");