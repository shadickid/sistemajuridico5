<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config\database\functions\empleado.php');
include(ROOT_PATH . 'config\database\functions\usuario.php');

$idEmpleado = $_GET['idEmpleado'];
$records = obtenerEmpleadoUsuarios($idEmpleado);
foreach ($records as $record) {
    $idUsuario = $record['id_usuario'];

}

empleadoBajaparaAlta($idEmpleado);
altaUsuario($idUsuario);
header("location: listadoPersonaBaja.php?vali=1");