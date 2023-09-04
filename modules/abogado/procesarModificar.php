<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config\database\functions\empleado.php');

$idPersonaFisica = $_POST['idPersonaFisica'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$fecnac = $_POST['fecnac'];

ModificarDatosPersonalesEmpleado($idPersonaFisica, $nombre, $apellido, $fecnac);
header("location: listado.php");