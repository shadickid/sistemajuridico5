<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/contacto.php');
$id_tipo_contacto = $_GET['id_tipo_contacto'];

borrarContacto($id_tipo_contacto);
header("location: listado.php");