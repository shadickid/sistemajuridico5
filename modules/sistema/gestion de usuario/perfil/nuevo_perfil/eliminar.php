<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/perfil.php');
$id_perfil = $_GET['id_perfil'];

borrarPerfil($id_perfil);
header("location: listado.php");
