<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/perfil.php');
$nombre = $_POST['nombre'];
$id_perfil = $_POST['id_perfil'];

modificarPerfil($nombre, $id_perfil);
header("location: listado.php?vali=2");