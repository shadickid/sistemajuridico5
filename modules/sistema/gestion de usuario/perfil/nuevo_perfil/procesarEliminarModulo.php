<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
require_once(ROOT_PATH . 'config\database\functions\modulo.php');

$modulos = $_POST['modulo'];
$idPerfil = $_POST['idPerfil'];


eliminarPerfilxModulo($idPerfil, $modulos);