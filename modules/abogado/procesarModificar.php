<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config\database\functions\empleado.php');
$idPersona = $_POST['idPersona'];
$idPersonaFisica = $_POST['idPersonaFisica'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$fecnac = $_POST['fecnac'];
$tipoContacto = $_POST['tipoContacto'];
$contacto = $_POST['contacto'];
$tipoDocumento = $_POST['tipoDocumento'];
$documento = $_POST['Documento'];
ModificarDatosPersonalesEmpleado($idPersonaFisica, $nombre, $apellido, $fecnac);
agregarContactoEmpleado($idPersona, $contacto, $tipoContacto);
agregarEmpleadoDocumento($documento, $idPerosna, $tipoDocumento);


header("location: listado.php?vali=1");