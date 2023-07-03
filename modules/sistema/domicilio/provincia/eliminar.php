<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/domicilio.php');
$id_provincia = $_GET['id_provincia'];

borrarProvincia($id_provincia);
header("location: listado.php");
