<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/contacto.php');
$nombre = $_POST['nombre'];

agregarContacto($nombre);
header("location: listado.php");