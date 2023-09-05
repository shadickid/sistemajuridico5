<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config\database\functions\empleado.php');
$idEmpleado = $_GET['idEmpleado'];
borrarPersonaEmpleado($idEmpleado);
header("location: listado.php");