<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/modulo.php');
$id_modulo = $_GET['id_modulo'];

borrarModulo($id_modulo);
header("location: listado.php?vali=3");