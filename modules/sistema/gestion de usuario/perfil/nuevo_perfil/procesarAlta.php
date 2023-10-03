<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/perfil.php');
$nombre = $_POST['nombre'];

agregarPerfil($nombre);
header("location: listado.php?vali=1");