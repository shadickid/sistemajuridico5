<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/contacto.php');
$id_atri_dom = $_GET['id_atri_dom'];

($id_atri_dom);
header("location: listado.php");
