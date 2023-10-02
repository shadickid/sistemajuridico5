<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config\database\functions\usuario.php');
include(ROOT_PATH . 'config\database\functions\empleado.php');


$idUsuario = $_GET['id_usuario'];

$empleado = consultarUsurioModificar($idUsuario);
$idEmpleado = null;
foreach ($empleado as $regempl) {
    if (!empty($regempl)) {
        $idEmpleado = $regempl['id_empleado'];
        break;
    }
}
$valor = borrarUsuario($idUsuario);

borrarPersonaEmpleado($idEmpleado);
if ($valor === 1) {
    $valor = 3;
    header("location: listado.php?vali=" . $valor);
}