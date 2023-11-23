<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config\database\functions\empleado.php');
$idPersona = $_POST['idPersona'];
$idPersonaFisica = $_POST['idPersonaFisica'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$fecnac = $_POST['fecnac'];
$sex = $_POST['sex'];
ModificarDatosPersonalesEmpleado($idPersonaFisica, $nombre, $apellido, $fecnac, $sex);

header("location: listado.php?vali=2");