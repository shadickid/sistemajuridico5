<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/contacto.php');


$nombre = $_POST['nombre'];
$id_tipo_contacto = $_POST['id_tipo_contacto'];

modificarContacto($nombre, $id_tipo_contacto);
header("location: listado.php");