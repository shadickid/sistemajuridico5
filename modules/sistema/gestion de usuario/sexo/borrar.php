<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config\database\functions\persona.php');

$idSexo = $_GET['idsexo'];

borrarSexo($idSexo);
header("location: listado.php?vali=3");