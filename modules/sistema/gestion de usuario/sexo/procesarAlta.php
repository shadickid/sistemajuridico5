<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config\database\functions\persona.php');
$nombre = $_POST['nombre'];

agregarSexo($nombre);
header("location: listado.php");