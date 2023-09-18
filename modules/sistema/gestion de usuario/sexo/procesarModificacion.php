<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config\database\functions\persona.php');
$idsexo = $_POST['idsexo'];
$nombre = $_POST['nombre'];

modificarSexo($idsexo, $nombre);
header("location: listado.php");