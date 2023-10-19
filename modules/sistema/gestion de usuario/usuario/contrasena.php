<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config\database\functions\usuario.php');
$id_usuario = $_GET['id_usuario'];
$nuevacontra = 12345;
$datosUsuarios = consultarUsurioModificar($id_usuario);
$hash = password_hash($nuevacontra, PASSWORD_DEFAULT);
ModificarContra($id_usuario, $hash);
header("location:listado.php?vali=5");