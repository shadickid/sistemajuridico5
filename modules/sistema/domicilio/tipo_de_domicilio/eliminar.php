<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/domicilio.php');
$id_tipo_dom = $_GET['id_tipo_dom'];

borrarTipoDomicilio($id_tipo_dom);
header("location: listado.php");
